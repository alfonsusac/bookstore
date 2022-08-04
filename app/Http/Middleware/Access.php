<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        // https://stackoverflow.com/questions/43901719/laravel-middleware-with-multiple-roles
        $user = Auth::user();
        // dd(Auth::user()->role->desc);
        // if its meant for people who are not authorized
        if( (empty($roles) && $user==null) ){
            return $next($request);

        // if its meant for authorized page
        }elseif($user != null){

            // if a page is meant for someone
            foreach($roles as $role){
                if($role == $user->role->desc){
                    return $next($request);
                }
            }

            // if a page is not meant for someone
            return redirect('home');
        }

        // if not authorized
        return redirect('/');

    }
}
