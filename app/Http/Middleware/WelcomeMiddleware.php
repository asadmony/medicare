<?php

namespace App\Http\Middleware;

use App\Model\Page;
use Closure;

class WelcomeMiddleware
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
        view()->share('test', 'ok');
        view()->share('headerMenuPages', Page::where('active', true)->where('list_in_menu', true)->orderBy('drag_id')->get());
        view()->share('footerMenuPages', Page::where('active', true)->orderBy('drag_id')->get());
        return $next($request);
    }
}
