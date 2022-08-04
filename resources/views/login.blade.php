@extends('content')
@section('title','Login')
@section('body')
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="errorbanner">
    Error: {{$error}}
</div>
@endforeach
@endif
<form action="/login" method="post">
    @csrf

    <input type="email" name="email" id="" placeholder="{{__('Email Address')}}">

    <input type="password" name="password" id="" placeholder="{{__('Password')}}">

<button type="submit">{{__('Log-in')}}</button>

    <u><a href="{{url('/signup')}}">{{__("Don't have an account? Click here to sign up.")}}</a></u>

</form>
@endsection
