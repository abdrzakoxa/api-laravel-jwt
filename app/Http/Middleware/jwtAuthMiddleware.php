<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class jwtAuthMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    	try{
    		JWTAuth::parseToken()->authenticate();
		}
		catch (Exception $exception){
			if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
				return response()->json(['status' => 'Invalid Token']);
			}
			else if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
				return response()->json(['status' => 'Token is Expired']);
			}
			else {
				return response()->json(['status' => 'Token is not found']);
			}
		}

		return $next($request);
    }
}
