@extends('content')
@section('title',__('Logged out!'))
@section('body')
<div style="text-align:center">{{__('You have been successfully logged out!')}}</div>
<a href="{{url('/')}}">
    <div class="bigbutton">{{__('Click Here to go to index')}}</div>
</a>

@endsection
