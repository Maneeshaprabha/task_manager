<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|\Illuminate\Http\JsonResponse|null
     */
protected function redirectTo(Request $request)
{
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
    return null;
}

}
