@extends('master')
@section('body')
<div style="min-height: 200px;font-size:3em;line-height: 1.2;overflow-wrap: anywhere">
    <b>{{__('Find')}}</b> {{__('and')}} <b>{{__('Rent')}}</b>
    <br>
    {{__('your E-Book')}}
    <br>
    <mark style="padding: 0px 0.4em;font-weight:600;font-size:0.8em;">{{__('Here!')}}</mark>
    <br>
    <img style="width:64px;height:64px;display:inline;margin:16px -8px;" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/microsoft/310/backhand-index-pointing-down_1f447.png" alt="">
    <img style="width:64px;height:64px;display:inline;margin:16px -8px;" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/microsoft/310/ok-hand_1f44c.png" alt="">
    <img style="width:64px;height:64px;display:inline;margin:16px -8px;" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/microsoft/310/fire_1f525.png" alt="">
    <br>
    <div style="padding: 0px;font-size: 0.6em;font-weight:800;">
        <a href="{{url('/signup')}}"><div class="bigbutton">
            {{__('Register')}}
        </div></a>
        <a href="{{url('/login')}}"><div class="bigbutton">
            {{__('I already have an account, sign me in!')}}
        </div></a>
    </div>
</div>
@endsection
