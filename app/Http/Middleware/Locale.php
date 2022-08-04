<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->path());
        // $cookielocale = Cookie::get('locale');
        // if( !$cookielocale ){
        //     Cookie::queue('locale',App::currentLocale(), 2147483647);
        // }else{
        //     App::setLocale($cookielocale);
        // }
        return $next($request);
    }
}



        // if (! in_array($request->locale, $locales)) {
        //     $locale = Cookie::get('locale');
        //     if( $locale ){
        //     }else{
        //         $locale =  App::currentLocale();
        //         Cookie::queue('locale',$locale, 2147483647);
        //     }
        //     return $next($request);
        //     // return redirect('/'.$locale.'/'.$request->path());
        // }
