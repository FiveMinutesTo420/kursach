@extends('layouts.layout')
@section('head')
    <meta name="csrf-token" content="{{csrf_token()}}" id="ctoken">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection
@section('title')
    Корзина покупок
@endsection
@section('content') 
    <div class="ifhaserror">
        @if($not_in_stock == true)
        <div class="flex w-full p-4 text-xs bg-[#F8D7DA] mt-4 rounded text-center justify-center drop-shadow" id="error">
            Товары отмеченные *** отсутствуют в нужном количестве или их нет на складе!
        </div>
    @endif
    </div>

    <div class="text-2xl lg:text-3xl text-center mt-4">Корзина покупок</div>
    <div class="lg:flex justify-between mt-4 space-y-4 lg:space-y-0">
        <div class="flex flex-col border drop-shadow rounded w-full space-y-2 lg:w-[65%] p-3">
            <div class="flex text-[9px] lg:text-xs text-center  border-b pb-2 drop-shadow-sm items-center justify-between">
                <p class="w-[65px] lg:w-[80px]">Изображение</p>
                <p class="w-[150px] lg:w-[250px]  ">Название товара</p>
                <p class="w-[100px] ">Кол-во</p>
                <p class="w-[60px]">Цена за штуку</p>
                <p class="w-[60px]">Всего</p>
            </div>
            <?php $all = 0?>
            @forelse($user_cart_items as $cart)
            <div class="flex text-[9px] lg:text-sm text-center space-x-4  border-b pb-2 drop-shadow-sm items-center justify-between">
                <img src="{{url('images/products/'.$cart->item->image)}}" class="rounded w-[65px] lg:w-[80px]" alt="">
                <a href="{{route('item',$cart->item->id)}}" class="w-[150px] lg:w-[250px] " id="cart{{$cart->id}}">
                    {{$cart->item->name}}
                    <div id="error">
                    
                        <div class="text-red-500 stock_error" id="error{{$cart->id}}">
                            @if($cart->count > $cart->item->in_stock)
                                ***
                            @endif

                        </div>
                    </div>

                </a>
                <div class="w-[100px] flex justify-between items-center">
                    <input type="number" max="{{$cart->item->in_stock}}" min="0" onchange="changeAmount(this,'{{$cart->id}}','{{route('change_amount')}}')" value="{{$cart->count}}" class="w-1/2 text-center py-2 outline-red-600"> 
                    <form action="{{route('delete_item_from_cart',$cart->id)}}" method="POST" class=" flex items-center">
                        @csrf
                        <input type="image" src="{{url('images/site/delete-red.svg')}}" class="cursor-pointer p-1 w-6 lg:w-8">
                    </form>
                    
                </div>
                <p class="w-[60px]">{{ number_format($cart->item->price)}} руб.</p>

                <p class="w-[60px]" id="cart-item{{$cart->id}}">{{number_format($cart->count * $cart->item->price)}} руб.</p>
                <?php $all += $cart->count * $cart->item->price?>
            </div>
            @empty
                <div class="p-4 text-2xl">
                    Корзина пуста, Милорд
                </div>
            @endforelse

        </div>
        <div class="flex flex-col  max-h-60   w-full lg:w-1/3">
            <div class="w-full border rounded-t p-2 text-center bg-gray-100 ">
                Что бы вы хотели сделать дальше?
            </div>
            <div class="border border-t-0 rounded-b flex space-y-2 flex-col w-full p-4 py-2">
                <div class="flex flex-col border-b space-y-1 text-sm text-center p-2">
                    <a href="#" class="text-blue-600">Использовать купон</a>
                    <a href="#" class="text-blue-600">Расчет стоимости доставки</a>
                </div>
                <div class="flex flex-col text-sm">
                    <div class="flex just border border-b-0">
                        <div class="w-[35%] text-right p-2 border-r">Сумма:</div>
                        <div class="w-[65%] p-2 text-right" id="sum">{{number_format($all)}} руб</div>
                    </div>
                    <div class="flex border">
                        <div class="w-[35%] text-right p-2 border-r">Итого:</div>
                        <div class="w-[65%] p-2 text-right" id="total">{{number_format($all)}} руб</div>
                    </div>
                </div>
                <div class="flex w-full">
                    <form action="{{route('order.create')}}"  method="POST" class="w-full">
                        @csrf
                        <input type="submit" id="checkForm" @if($not_in_stock == true or $user_cart_items->count() == 0) disabled @endif  class="bg-[#007BFF] text-white p-2 w-full cursor-pointer" value="Оформить заказ">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/cart.js')}}"></script>
@endsection