<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminWhiteList
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $whiteListIps = explode(',', config('core.admin_white_list_ips'));
        if (in_array($request->ip(), $whiteListIps)) {
            return $next($request);
        }
        return abort(404);
    }
}
