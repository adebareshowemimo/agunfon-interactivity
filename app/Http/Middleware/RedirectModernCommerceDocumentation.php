<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectModernCommerceDocumentation
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('docs/1.0/modern-commerce') || $request->is('docs/1.0/modern-commerce/*')) {
            $section = $request->segment(4) ?: 'overview';

            return redirect()->away("https://moderncommerce.dev/docs/1.x/{$section}", 301);
        }

        return $next($request);
    }
}
