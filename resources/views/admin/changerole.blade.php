@extends('content')
@section('title','')
@section('body')
<div>
    <div style="padding:24px;font-size:3em;font-weight:800;">
        <span style="font-size:0.5em;font-weight:400;">{{__('Change the role for')}}</span><br>
        <span>{{$user->first_name}}</span><br>
        <span>{{$user->middle_name}}</span><br>
        <span>{{$user->last_name}}</span><br>
    </div>
    <div style="padding: 0px 24px;">
        <form action="{{url('/user/'.$user->id.'/updaterole')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <select name="role" id="role">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" @if ($user->role_id == $role->id)
                        selected="selected"
                    @endif>{{__(ucfirst($role->desc))}}</option>
                @endforeach
            </select>
            <button type="submit">{{__('Submit')}}</button><br>
        </form>
    </div>
</div>
<div class="cover"></div>
@endsection
