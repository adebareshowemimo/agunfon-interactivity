<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AdminLoginThrottleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        RateLimiter::clear('admin-login:account:'.sha1('admin@agunfon.test|127.0.0.1'));
        RateLimiter::clear('admin-login:ip:'.sha1('127.0.0.1'));
    }

    private function admin(): User
    {
        return User::factory()->create([
            'email' => 'admin@agunfon.test',
            'password' => Hash::make('correct-horse-battery'),
        ]);
    }

    private function attempt(string $password)
    {
        return $this->post(route('admin.login.submit'), [
            'email' => 'admin@agunfon.test',
            'password' => $password,
        ]);
    }

    public function test_it_locks_the_account_out_after_five_failed_attempts(): void
    {
        $this->admin();

        for ($i = 0; $i < 5; $i++) {
            $this->attempt('wrong-'.$i)->assertSessionHasErrors('email');
        }

        $this->attempt('wrong-again')
            ->assertSessionHasErrorsIn('default', ['email'])
            ->assertSessionHasErrors([
                'email' => 'Too many login attempts. Please try again in 15 minute(s).',
            ]);
    }

    public function test_the_lockout_rejects_even_the_correct_password(): void
    {
        $this->admin();

        for ($i = 0; $i < 5; $i++) {
            $this->attempt('wrong-'.$i);
        }

        // The whole point of a lockout: a guessed-correct password must not land.
        $this->attempt('correct-horse-battery');

        $this->assertGuest();
    }

    public function test_a_successful_login_clears_the_failure_count(): void
    {
        $this->admin();

        $this->attempt('wrong-1');
        $this->attempt('wrong-2');

        $this->attempt('correct-horse-battery')->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();

        $this->post(route('admin.logout'));

        // Having burned 2 of 5 before succeeding, the counter must be reset —
        // otherwise a normal typo streak would lock a working admin out later.
        $this->attempt('wrong-3')->assertSessionHasErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function test_a_valid_login_still_works_when_nothing_is_throttled(): void
    {
        $this->admin();

        $this->attempt('correct-horse-battery')->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }
}
