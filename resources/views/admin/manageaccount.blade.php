@extends('content')
@section('title',__('Manage Account'))
@section('body')
<style>

</style>

<table>
    @foreach ($users as $user)
        <tr style="padding-top:0;padding-bottom:0;">
            <td style="padding-top:0;padding-bottom:0;">
                <span>#{{$user->id}}</span>
                @if ($user->role->desc == 'admin')
                <span class="rolelabel admin">{{__(ucfirst($user->role->desc))}}</span>
                @else
                <span class="rolelabel">{{__(ucfirst($user->role->desc))}} </span>
                @endif
                <br>
                <span class="bookdetailtitle" style="font-size:1.4em;">
                     {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}
                </span>
            </td>
            <td class="tablebutton">
                <a href="{{url('/user/'.$user->id.'/updaterole')}}"><button type="submit">{{__('Update Role')}}</button></a>
            </td>
            <td class="tablebutton">
                @if ($user->id != Auth::user()->id)

                <form action="{{url('/user/'.$user->id.'/delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{__('Delete')}}</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
</table>
<div class="cover"></div>
@endsection
