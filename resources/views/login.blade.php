@extends('layouts.layout')
@section('title')
Авторизация
@endsection
@section('content')
<div class="lg:flex mt-4 justify-center lg:space-x-5 space-x-0  space-y-4 lg:space-y-0">
    <div class="flex flex-col space-y-4  items-center w-full ">

        <div class="text-center text-3xl font-semibold ">Авторизация</div>
        <div class="lg:flex justify-between space-y-4 lg:space-y-0">
            <div class="lg:w-1/2 w-[100%] flex border rounded flex-col ">
                <div class="w-full font-semibold text-lg border-b bg-[#F7F7F7] text-center p-3">Зарегистрированный клиент</div>
                <div class="w-full p-3 space-y-4">
                    <p class="text-center text-sm">Войти в личный кабинет</p>
                    <form action="{{route('log_s')}}" class="space-y-4" method="POST">
                        @csrf
                        <div>
                            <input type="email" name="email" placeholder="E-mail" class="p-2 w-full border-2 rounded" value="{{old('email')}}" required>

    
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Пароль" class="p-2 w-full border-2 rounded" value="{{old('password')}}" required>

                        </div>
                        <div class="flex justify-between items-center">
                            <input type="submit" value="Войти" class="text-white cursor-pointer hover:bg-sky-500 rounded w-[45%] p-2 bg-sky-400" >
                            <div class="w-[45%]">
                                <a href="" class=" text-sky-500 hover:border-b  hover:text-sky-700 border-sky-700">Забыли пароль?</a>
    
                            </div>
                        </div>
                        @error('email')
                            <div class="text-red-500 text-center">{{ $message }}</div>
                        @enderror
                    </form>
                    
                </div>
            </div>   
            <div class="lg:w-[48%] w-[100%] flex border rounded flex-col">
                <div class="w-full font-semibold text-lg border-b bg-[#F7F7F7] text-center p-3">Новый клиент</div>
                <div class="flex flex-col  w-full p-3 space-y-4">
                    <p class="text-center font-semibold text-sm">Регистрация</p>
                    <p class="text-center text-sm">Создание учетной записи поможет покупать быстрее.<br> Вы сможете контролировать состояние заказа, а также просматривать заказы сделанные ранее. Вы сможете накапливать призовые баллы и получать скидочные купоны.
                        <br>    А постоянным покупателям мы предлагаем гибкую систему скидок и персональное обслуживание.</p>
                    <a href="{{route('reg_p')}}"  class="text-white text-center cursor-pointer  rounded w-[100%] p-2 bg-sky-400 hover:bg-sky-500" >Продолжить</a>

                </div>
            </div>       
        </div>
    </div>
    <div class="flex justify-center lg:w-[17.7%]  w-full h-max ">
        <div class="flex-col justify-center rounded w-full border bg-white ">
        
            <a href="#" class="text-sm flex p-3 font-semibold cursor-pointer bg-gray-100 items-center justify-center  ">
                
          
                        Личный кабинет
                
               
            </a>
            <a href="#" class="text-sm flex p-3 cursor-pointer hover:bg-gray-100 border-t items-center justify-center">
      
                        Вход
            
            </a>
            <a class="text-sm flex p-3 cursor-pointer hover:bg-gray-100 border-t items-center justify-center">
         
                        Регистрация
       
            </a>
            <a class="flex p-3 cursor-pointer text-sm hover:bg-gray-100 border-t items-center justify-center">
   
                        Забыли пароль
          
            </a>
            <a class="flex p-3 cursor-pointer text-sm hover:bg-gray-100 border-t items-center justify-center">
          
                        Моя информация
    
            </a>
            <a class="flex p-3 cursor-pointer text-sm hover:bg-gray-100 border-t items-center justify-center">
                Адресная книга
            </a>
        </div>
    </div>
</div>
@endsection