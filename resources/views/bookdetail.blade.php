@extends('content')
@section('title','E-Book Detail')
@section('body')


<table>
    <tr>
        <td class="bookdeatillabel">{{__('Title')}}</td>
        <td class="bookdetailtitle">{{$book->title}}</td>
    </tr>
    <tr>
        <td class="bookdeatillabel">{{__('Author')}}</td>
        <td class="bookdetailauthor">{{$book->author}}</td>
    </tr>
    <tr>
        <td class="bookdeatillabeldesc">{{__('Description')}}</td>
        <td class="bookdetaildescription">{{$book->description}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <form action="{{url('/book/'.$book->id.'/rent')}}" method="post">
                @csrf
                <button type="submit">{{__('Rent')}}</button>
            </form>
        </td>
    </tr>
</table>

@endsection
