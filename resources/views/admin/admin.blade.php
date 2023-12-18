@extends('layouts.layout')
@section('title')
    Админ панель
@endsection
@section('content') 
    <div class="pt-4 flex flex-col space-y-4">
        <div class="lg:flex space-x-4">
            <div class="flex flex-col w-full  lg:w-1/2 p-4 ">
                <p class="border-b pb-2">Категории</p>

                <div class="flex flex-col overflow-y-auto h-[300px]">
                    @foreach($categories as $category)
                    <div class="py-2 flex items-center justify-between ">
                        {{$category->name}} 
                        <form action="{{route('admin.category.delete',$category->id)}}" method="POST">
                            @csrf
                            <input type="submit" class="p-3 bg-red-500" value="Удалить">
                        </form>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="flex flex-col w-full lg:w-1/2 p-4">
                <p class="border-b pb-2">Заказы</p>
                <div class="flex flex-col space-y-2">
                    <a href="{{route('admin',['sort'=>'canceled'])}}" class="p-2  border">Отмененые</a>
                    <a href="{{route('admin',['sort'=>'new'])}}" class="p-2 border">Новые</a>
                    <a href="{{route('admin',['sort'=>'submitted'])}}" class="p-2 border">Подтвержденные</a>
                    <a href="{{route('admin')}}" class="p-2 border">Отменить сортировку</a>
                </div>
                <div class="flex flex-col overflow-y-auto h-[300px]">
                    @forelse($orders as $order)
                    <div class="py-2 border-t pt-4 border-black ">
                        <span class="text-xl font-medium tracking-widest">Заказ №{{$order->id}} | {{$order->created_at}}</span>
                        <div class="">
                            <div class="border p-2 space-y-2">
                            @php $all = 0 @endphp

                            @foreach($order->cart as $cart)

                            <div class="flex space-x-2 items-center">
                                @php $all += $cart->item->price * $cart->count @endphp
                                <img src="{{url('images/products/'.$cart->item->image)}}" class="w-[40px]" alt="">
                                
                                <p class="w-[500px] truncate"> <span class="font-semibold">x {{$cart->count}}</span>  {{$cart->item->name}} </p>
                            </div>
                            Цена за штуку: {{$cart->item->price}} рублей
                            <p class="border-b"></p>
                            @endforeach
                            <p>Статус: {{$order->status}}</p>
                            <p>Итого: {{number_format($all)}} руб.</p>

                            @if($order->status == 'Новый')
                            <form action="{{route('admin.change.status',$order->id)}}" method="POST" class="space-y-3">
                                @csrf
                                <input type="text" name="comment" placeholder="Добавить комментарий" class="p-2 w-full">
                                <input type="submit" class="bg-red-500 p-4 py-2 text-white" name="action" value="Отменить">
                                <input type="submit" class="bg-green-500 p-4 py-2 text-white" name="action" value="Подтвердить">

                            </form>
                            
                            @endif

                        </div>
                        </div>
                    </div>
                    @empty
                        <p class="py-4">Нет активных заказов</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="flex p-4 w-full">
            <p class="border-b pb-2 w-full">Товары</p>
        </div>
    </div>
@endsection
