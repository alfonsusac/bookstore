@extends('supermaster')
@section('content')
    <div class="header">
        <a href="{{url('/')}}"><div class="title" style="font-size:1.6em;">
            My<mark> Amazing</mark><br> Bookstore
        </div></a>
        <div class="menu">
            @auth
            <a href="{{url('/logout')}}"><div class="menuitem">{{__('Log-out')}}</div></a>
            @endauth
            @guest
            <a href="{{url('/login')}}"><div class="menuitem">{{__('Log-in')}}</div></a>
                <a href="{{url('/signup')}}"><div class="menuitem">{{__('Register')}}</div></a>
            @endguest
        </div>
    </div>
    @auth
    <div class="navbar">
        <a href="{{url('/home')}}"><div class="navitem">{{__('Home')}}</div></a>
        <a href="{{url('/cart')}}"><div class="navitem">{{__('Cart')}}</div></a>
        <a href="{{url('/profile')}}"><div class="navitem">{{__('Profile')}}</div></a>
        @if (Auth::user()->role->desc == 'admin')
        <a href="{{url('/maccount')}}"><div class="navitem">{{__('Account Maintenance')}}</div></a>
        @endif
    </div>
    @endauth
    <div class="content">
        <div class="page-title">@yield('title')</div>
        @yield('body')
    </div>

@endsection

