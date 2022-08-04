@extends('content')
@section('title',__('Cart'))
@section('body')

@if( !count(Auth::user()->orders) )


<div style="text-align: center;">{{__('Your cart is empty')}}</div>
<a href="{{url('/')}}"><button type="submit">{{__('Back to Shopping')}}</button></a>

@else
<div style="text-align: center;">{{__('Submit order or delete item from cart')}}</div>

<table>
    @foreach (Auth::user()->orders as $order)
        <tr style="padding-top:0;padding-bottom:0;">
            <td style="padding-top:0;padding-bottom:0;">
                <span class="bookdetailtitle" style="font-size:1.4em;">{{$order->book->title}}</span><br> {{__('by')}} <span style="font-weight: 600;">{{$order->book->author}}</span>
            </td>
            <td style="padding-top:0;padding-bottom:16px;">
                <form action="{{url('/cart/'.$order->id.'/')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button style="margin:0;" type="submit">{{__('Delete')}}</button>
                </form>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2">
            <form action="{{url('/cart/submit')}}" method="post">
                @csrf
                <button type="submit">{{__('Submit')}} and Checkout</button>
            </form>
        </td>
    </tr>
</table>

@endif

@endsection
