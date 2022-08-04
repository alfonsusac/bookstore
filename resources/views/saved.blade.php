@extends('content')
@section('title',__('Saved!'))
@section('body')
<div style="text-align:center">{{__('Your profile has been successfully saved!')}}</div>
<a href="{{url('/home')}}">
    <div class="bigbutton">{{__('Click Here to go back home')}}</div>
</a>

@endsection
