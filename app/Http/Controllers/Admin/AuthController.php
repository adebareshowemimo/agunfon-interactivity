<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /** Failed attempts allowed against one account from one IP before lockout. */
    private const MAX_ATTEMPTS_PER_ACCOUNT = 5;

    /** Failed attempts allowed from a single IP across all accounts, to blunt email spraying. */
    private const MAX_ATTEMPTS_PER_IP = 20;

    /** How long a lockout lasts, in seconds. */
    private const DECAY_SECONDS = 900;

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->ensureIsNotRateLimited($request);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::clear($this->accountKey($request));
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        // Only failures count towards the lockout, so a working admin is never throttled.
        RateLimiter::hit($this->accountKey($request), self::DECAY_SECONDS);
        RateLimiter::hit($this->ipKey($request), self::DECAY_SECONDS);

        Log::warning('Failed admin login', [
            'email' => $request->input('email'),
            'ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 200),
        ]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Block further attempts once either lockout threshold is reached.
     *
     * Two keys are tracked: one per account-and-IP pair, and a looser per-IP key so
     * an attacker cannot sidestep the first by spraying many different addresses.
     *
     * @throws ValidationException
     */
    protected function ensureIsNotRateLimited(Request $request): void
    {
        $limits = [
            [$this->accountKey($request), self::MAX_ATTEMPTS_PER_ACCOUNT],
            [$this->ipKey($request), self::MAX_ATTEMPTS_PER_IP],
        ];

        foreach ($limits as [$key, $maxAttempts]) {
            if (! RateLimiter::tooManyAttempts($key, $maxAttempts)) {
                continue;
            }

            $seconds = RateLimiter::availableIn($key);

            Log::warning('Admin login lockout triggered', [
                'email' => $request->input('email'),
                'ip' => $request->ip(),
                'retry_after' => $seconds,
            ]);

            throw ValidationException::withMessages([
                'email' => 'Too many login attempts. Please try again in '
                    .ceil($seconds / 60).' minute(s).',
            ]);
        }
    }

    /** Lockout key for one account from one IP. */
    protected function accountKey(Request $request): string
    {
        return 'admin-login:account:'.sha1(
            strtolower(trim((string) $request->input('email'))).'|'.$request->ip()
        );
    }

    /** Lockout key for one IP across every account it tries. */
    protected function ipKey(Request $request): string
    {
        return 'admin-login:ip:'.sha1((string) $request->ip());
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
