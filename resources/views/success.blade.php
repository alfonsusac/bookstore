@extends('content')
@section('title',__('Success!'))
@section('body')
<div style="text-align:center">{{__('Your cart has been successfully checked out and saved!')}}</div>
<a href="{{url('/home')}}">
    <div class="bigbutton">{{__('Click Here to go back home')}}</div>
</a>

@endsection
