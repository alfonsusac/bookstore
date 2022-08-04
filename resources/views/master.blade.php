@extends('supermaster')
@section('content')

    <div class="header">
        <a href="{{url('/')}}"><div class="title">
            My<mark> Amazing</mark> <br>Bookstore
        </div></a>
        <div class="menu">
            @guest
            <a href="{{url('/login')}}"><div class="menuitem">{{__('Log-in')}}</div></a>
            <a href="{{url('/signup')}}"><div class="menuitem">{{__('Register')}}</div></a>
            @endguest
        </div>
    </div>
    <div class="content">
        @yield('body')


</div>
@endsection

