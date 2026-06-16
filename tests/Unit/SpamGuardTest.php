<?php

namespace Tests\Unit;

use App\Support\SpamGuard;
use Illuminate\Http\Request;
use Illuminate\Session\ArraySessionHandler;
use Illuminate\Session\Store;
use Tests\TestCase;

class SpamGuardTest extends TestCase
{
    public function test_it_accepts_a_valid_session_bound_form_token(): void
    {
        $request = $this->requestWithSession('/contact');
        $token = SpamGuard::payload($request, 'contact');

        $request->request->add([
            SpamGuard::TIMESTAMP_FIELD => $token,
            SpamGuard::INTERACTION_FIELD => substr($token, -16),
            'email' => 'person@example.com',
        ]);

        $this->assertNull(SpamGuard::detect(
            $request,
            minSeconds: 0,
            maxSeconds: 7200,
            contentFields: ['email'],
            expectedForm: 'contact',
        ));
    }

    public function test_it_rejects_missing_browser_interaction_proof(): void
    {
        $request = $this->requestWithSession('/contact');
        $token = SpamGuard::payload($request, 'contact');

        $request->request->add([
            SpamGuard::TIMESTAMP_FIELD => $token,
            'email' => 'person@example.com',
        ]);

        $this->assertSame('missing-interaction', SpamGuard::detect(
            $request,
            minSeconds: 0,
            maxSeconds: 7200,
            contentFields: ['email'],
            expectedForm: 'contact',
        ));
    }

    public function test_it_rejects_tokens_replayed_from_another_session(): void
    {
        $originalRequest = $this->requestWithSession('/contact');
        $token = SpamGuard::payload($originalRequest, 'contact');

        $replayedRequest = $this->requestWithSession('/contact');
        $replayedRequest->request->add([
            SpamGuard::TIMESTAMP_FIELD => $token,
            SpamGuard::INTERACTION_FIELD => substr($token, -16),
            'email' => 'person@example.com',
        ]);

        $this->assertSame('session-mismatch', SpamGuard::detect(
            $replayedRequest,
            minSeconds: 0,
            maxSeconds: 7200,
            contentFields: ['email'],
            expectedForm: 'contact',
        ));
    }

    protected function requestWithSession(string $uri): Request
    {
        $request = Request::create($uri, 'POST');
        $session = new Store('test', new ArraySessionHandler(120));
        $session->start();
        $request->setLaravelSession($session);

        return $request;
    }
}
