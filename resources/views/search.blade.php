@extends('layouts.layout')
@section('title')
    Поиск - {{$query}}
@endsection
@section('content')
    <div class="flex flex-col space-y-4 mt-4">
        <p class="text-4xl w-full text-center">Поиск по запросу - {{$query}}</p>
        <div class="flex justify-between flex-wrap">
            @foreach($items as $item)
            <div class="flex mt-2 border flex-col justify-between lg:text-sm lg:w-56 text-xs w-[45%]  items-center align-super text-center space-y-2 p-2">
                <img src="{{url('images/products/'.$item->image)}}"  class="w-5/6 h-40 " alt="">
                <a href="{{route('item',$item->id)}}" class="text-sm hover:text-red-500">{{$item->name}}</a>
                <p class="font-semibold">{{$item->price}}руб.</p>
                <div class="flex w-4/5  mb-2 text-xs font-semibold ">
                    <button @if(Auth::check() == false) onclick="showCartModal()" @endif class="flex bg-white border drop-shadow-sm w-full text-gray-900 items-center justify-center space-x-1 p-2 rounded">
         
                        В корзину
                    </button>
        
                </div>
            </div>
            @endforeach
            
            </div>
    </div>
@endsection