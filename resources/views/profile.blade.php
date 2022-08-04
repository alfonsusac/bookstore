@extends('content')
@section('title',__('Profile'))
@section('body')
<style>
    .defaultdp{
        background-color:khaki;
        min-width:200px;
        max-width: 200px;
        min-height: 200px;
        max-height: 200px;
        flex: 0 0 0;
        border-radius:500px;
        content:'No display picture';
        background-size: cover;
        margin:26px auto;
    }
</style>


<div style="text-align:center">{{__('Edit your profile')}}</div>
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="errorbanner">
    Error: {{$error}}
</div>
@endforeach
@endif
<form action="/profile" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="dpwrapper">
            <div class="defaultdp" style="background-image: url( {{ Storage::url($user->display_picture_link ) }} );">
        </div>
        </div>
        <div>
            <input type="text" name="firstname" id="" placeholder="{{__('First Name')}}" value="{{$user->first_name}}">

            <input type="text" name="middlename" id="" placeholder="{{__('Middle Name')}}" value="{{$user->middle_name}}">

            <input type="text" name="lastname" id="" placeholder="{{__('Last Name')}}" value="{{$user->last_name}}">

            <div class="radiogender">
                @foreach ($genders as $gender)
                    <div class="radioselect">
                        <input type="radio" name="gender" id="{{$gender->desc}}" value="{{$gender->id}}" @if ($user->gender_id == $gender->id)
                            checked
                        @endif>
                        <label for="{{$gender->desc}}">{{__(ucfirst($gender->desc))}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="{{__('Password')}}" autocomplete="new-password" aria-invalid="false" aria-haspopup="false" spellcheck="false">

            <input type="email" name="email" id="" placeholder="{{__('E-mail')}}" value="{{$user->email}}">

            <label for="displaypicture">{{__('Profile Picture')}}</label>
            <input type="file" name="displaypicture" id="displaypicture" class="file">
        </div>
    </div>

    <div>
        <button type="submit">{{__('Submit')}}</button><br>
    </div>
</form>

@endsection
