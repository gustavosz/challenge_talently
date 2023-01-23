<?php

namespace Apps\Ecommerce\backend\middlewares;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            return response()->json(['token_invalid'], Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
