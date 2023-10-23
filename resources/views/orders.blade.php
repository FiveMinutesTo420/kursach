@extends('layouts.layout')
@section('title','Мои заказы')
@section('content')
<div class="flex flex-col space-y-3 py-4">
    <p class="text-2xl">Заказы</p>
    <div class="flex space-x-4">
        <a href="{{route('orders',['sort'=>'canceled'])}}" class="p-4 border">Отмененые</a>
        <a href="{{route('orders',['sort'=>'new'])}}" class="p-4 border">Новые</a>
        <a href="{{route('orders',['sort'=>'submitted'])}}" class="p-4 border">Подтвержденные</a>
        <a href="{{route('orders')}}" class="p-4 border">Отменить сортировку</a>

    </div>

    @forelse($orders as $order)
    <div class="border p-4 flex flex-col text-xs space-y-6 lg:text-base">
        <div class="flex w-full items-center  justify-between">
            <div class="flex items-center space-x-4"><div>Заказ #{{$order->id}}</div>
             <div class="@if($order->status == "Новый") text-blue-500 @endif @if($order->status == "Отменен") text-red-500 @endif @if($order->status == "Подтвержден") text-green-500 @endif ">
                {{$order->status}}
            </div> 
            @if($order->status == "Новый")
                <form action="{{route('order.cancel',$order->id)}}" method="POST">
                    @csrf
                    <input type="submit" value="Удалить" class="bg-red-500 text-white px-4 rounded p-1">
                </form>
            @endif
        </div>
            <p>{{$order->created_at}}</p>
        </div>
        @if($order->comment != null)
        <div class="border flex flex-wrap p-3">
            Комментарий: {{$order->comment}}
        </div>
        @endif

            <div class="flex flex-col space-y-4">
                @php $all = 0 @endphp
                @foreach($order->cart as $cart)
                    <div class="flex space-x-4 text-[9px] lg:text-base">
                        <img src="{{url('images/products/'.$cart->item->image)}}" class="w-[50px] lg:w-[100px]" alt="">
                        <div class="flex flex-col">
                        <p>{{$cart->item->name}}  <span class="font-semibold"> x{{$cart->count}}</span></p>
                        <p>Цена за штуку: {{number_format($cart->item->price)}} рублей</p>
                        <p>Всего: {{number_format($cart->item->price * $cart->count)}} рублей</p>

                        </div>
                    </div>  
                    @php $all += $cart->item->price * $cart->count @endphp
                @endforeach
                <p>Итого: {{number_format($all)}} рублей</p>
            </div>
    </div>
    @empty
        Нет заказов
    @endforelse
</div>

@endsection