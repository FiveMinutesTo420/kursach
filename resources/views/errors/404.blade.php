@extends('layouts.layout')
@section('title')
Страница не найдена
@endsection
@section('content')
<div class="flex w-full justify-center items-center py-10 ">
    <div class="flex flex-col items-center justify-center text-center space-y-5 ">
        <div class="text-5xl">Ошибка 404</div>
        <p class="lg:text-lg">К сожалению, запрашиваемая Вами страница не найдена. Вероятно, Вы указали несуществующий адрес, страница была удалена, перемещена или сейчас она временно недоступна!</p>
        <a href="{{route('home')}}" class="p-3 px-6 rounded-lg text-white  bg-green-500">На главную</a>
    </div>

</div>
@endsection