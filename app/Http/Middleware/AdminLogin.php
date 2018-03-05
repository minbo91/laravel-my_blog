<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        /**
         * 中间件检查session 有没有值没有就跳回登录
         */
        if( !session( 'user' ) ){
            return redirect( 'admin/login' );
        }
        return $next($request);
    }
}
