<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', [PageController::class, 'viewindex']);

// Route::any('/', function(Request $request){
//     dd($request->path());
//     if(Cookie::get('locale')){
//         return redirect('/'.Cookie::get('locale').'/');
//     }else{
//         return redirect('/en/');
//     }
// });

  Route::controller(PageController::class)->group(function (){

      Route::middleware('access')->group(function () {
          Route::get   ('/',               'viewindex');
          Route::get   ('/signup',         'viewsignup');
          Route::get   ('/login',          'viewlogin');
          Route::post  ('/signup',         'signup');
          Route::post  ('/login',          'login');
      });

      Route::middleware('access:member,admin')->group(function () {
          Route::get   ('/home',           'viewhome');
          Route::get   ('/book/{id}',      'viewbookdetail');
          Route::get   ('/cart',           'viewcart');
          Route::get   ('/success',        'viewsuccess');
          Route::get   ('/profile',        'viewprofile');
          Route::get   ('/saved',          'viewsaved');
          Route::get   ('/logout',         'logout');
          Route::post  ('/book/{id}/rent', 'rent');
          Route::delete('/cart/{id}',      'deletecartitem');
          Route::post  ('/cart/submit',    'submitcart');
          Route::post  ('/profile',        'updateprofile');
      });

      Route::get('{locale}/locale', 'changelocale');

  });

  Route::controller(AdminController::class)->group(function (){

      Route::middleware('access:admin')->group(function () {
          Route::get   ('/maccount',            'viewmanageaccount');
          Route::get   ('/user/{id}/updaterole','viewupdaterole');
          Route::delete('/user/{id}/delete',    'deleteuser');
          Route::put   ('/user/{id}/updaterole','updateroleuser');
      });

  });

  Route::redirect('/', '/en/');


