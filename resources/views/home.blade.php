@extends('content')
@section('title',__('Home'))
@section('body')
<div style="text-align: center;">{{__('Select a book for rent')}}</div>
<div class="bookgrid">
    @foreach ($books as $book)
    <a href="{{url('/book/'.$book->id)}}">
    <div class="book">
        <div class="booktitle">{{$book->title}}</div>
        <div class="bookauthor">{{__('by')}} {{$book->author}}</div>
        <span class="hover"></span>
    </div></a>
    @endforeach
</div>



@endsection
