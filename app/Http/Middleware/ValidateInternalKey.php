<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateInternalKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $expected = (string) config('services.grpc.internal_key');
        $provided = (string) $request->header('X-Internal-Key', '');

        abort_if(
            $expected === '' || ! hash_equals($expected, $provided),
            Response::HTTP_FORBIDDEN,
            'Acceso interno denegado.'
        );

        return $next($request);
    }
}
