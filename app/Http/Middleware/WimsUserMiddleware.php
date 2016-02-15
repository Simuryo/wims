<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class WimsUserMiddleware
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
        if(Auth::check()){

            $user = User::find(Auth::user()->id);
            foreach ($user->app as $app) {
                //dd($app->id);
                if($app->id == 2 )
                {
                    break;
                }
                else
                {
                    Auth::logout();
                    return response()->view('errors.401');      
                }
            }

        }
        return $next($request);
    }
}
