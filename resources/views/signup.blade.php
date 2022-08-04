@extends('content')
@section('title','Register')
@section('body')
<form action="/signup" method="post" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="errorbanner">
            Error: {{$error}}
        </div>
        @endforeach
    @endif
    <div>
        <div>
            <input type="text" name="firstname" id="" placeholder="{{__('First Name')}}" value="{{ old('firstname') }}">

            <input type="text" name="middlename" id="" placeholder="{{__('Middle Name')}}" value="{{ old('middlename') }}">

            <input type="text" name="lastname" id="" placeholder="{{__('Last Name')}}" value="{{ old('lastname') }}">

            <div class="radiogender">
                @foreach ($genders as $gender)
                    <div class="radioselect">
                        <input type="radio" name="gender" id="{{$gender->desc}}" value="{{$gender->id}}" @if ( old('gender') == $gender->id)
                            checked
                        @endif>
                        <label for="{{$gender->desc}}">{{__(ucfirst($gender->desc))}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="{{__('Password')}}">

            <input type="email" name="email" id="" placeholder="{{__('E-mail')}}" value="{{ old('email') }}">

            <label for="role">{{__('Role')}}</label>
            <select name="role" id="role">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" @if ( old('role') == $role->id)
                        selected="selected"
                    @endif>{{__(ucfirst($role->desc))}}</option>
                @endforeach
            </select>

            <label for="displaypicture">{{__('Profile Picture')}}</label>
            <input type="file" name="displaypicture" id="displaypicture" class="file">
        </div>
    </div>

    <div>
        <button type="submit">{{__('Submit')}}</button><br>
    </div>
    <div>
        <u><a href="{{url('/login')}}">{{__('Already have an account? Click here to log in!')}}</a></u>
    </div>

</form>
@endsection
