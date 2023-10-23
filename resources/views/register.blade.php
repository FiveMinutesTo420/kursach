@extends('layouts.layout')
@section('title')
Быстрая регистрация
@endsection
@section('content')
<div class="lg:flex mt-4 space-y-4 lg:space-y-0 justify-between">
    <div class="w-full lg:w-4/5 ">

        <div class="text-center text-4xl font-semibold">Быстрая регистрация</div>
        <div class="text-center text-sm mt-4">Если Вы уже зарегестрированы, перейдите на страницу <a href="{{route('log_p')}}" class="text-blue-500">входа в систему</a></div>
        <div class="flex flex-col space-y-4 mt-4 w-full mx-auto" >
            <div class="text-2xl font-semibold">Основная информация</div>
            <form action="{{route('reg_s')}}"  class="flex flex-col space-y-4" method="POST">
                @csrf
                <div class="flex flex-col space-y-4">
                    <div>
                        <p>Email <span class="text-red-500">*</span> </p>
                        <input type="email" name="email"  value="{{old('email')}}" class="p-2 w-full border-2 rounded" required>
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Пароль <span class="text-red-500">*</span> </p>
                        <input type="password" name="password"  value="{{old('password')}}" class="p-2 w-full border-2 rounded" required>
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Подтвердите пароль <span class="text-red-500">*</span> </p>
                        <input type="password"  value="{{old('password_confirmation')}}" class="p-2 w-full border-2 rounded" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Имя <span class="text-red-500">*</span> </p>
                        <input type="text" name="name"  value="{{old('name')}}" class="p-2 w-full border-2 rounded" required>
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Фамилия <span class="text-red-500">*</span> </p>
                        <input type="text"  name="surname"  value="{{old('surname')}}" class="p-2 w-full border-2 rounded" required>
                        @error('surname')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Телефон <span class="text-red-500">*</span> </p>
                        <input type="text" name="number"  value="{{old('number')}}" class="p-2 w-full border-2 rounded" required>
                        @error('number')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
    
                </div>
                <div class="text-xl font-semibold">Адрес</div>
                <div class="flex flex-col space-y-4">
                    <div>
                        <p>Страна <span class="text-red-500">*</span> </p>
                        <select name="country" onchange="select_c()" required id="select_country" class="p-2 w-full border-2 rounded">
                            <option value="Не выбрано">-- Выберите страну --</option>
                            <option value="Russia">Российская Федерация</option>
    
                        </select>
                        @error('country')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Регион <span class="text-red-500">*</span> </p>
                        <select name="region" required id="select_region" class="p-2 w-full border-2 rounded">
                            <option value="Не выбрано">-- Выберите регион --</option>
    
                        </select>
                        @error('region')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Город  <span class="text-red-500">*</span> </p>
                        <input type="text" name="city" class="p-2 w-full border-2 rounded"  value="{{old('city')}}" required>
                        @error('city')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Индекс <span class="text-red-500">*</span> </p>
                        <input type="text" name="postcode" class="p-2 w-full border-2 rounded"  value="{{old('postcode')}}" required>
                        @error('postcode')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <p>Адрес <span class="text-red-500">*</span> </p>
                        <input type="text" name="address" class="p-2 w-full border-2 rounded" value="{{old('address')}}" required>
                        @error('address')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="checkbox" id="che" required>

                        <label for="che">Согласен с правилами регистрации</label>
                    </div>
    
                </div>
                <input type="submit" value="Зарегистрироваться" class="bg-green-500 cursor-pointer hover:bg-green-600 text-white p-2 rounded">
            </form>

        </div>
    </div>
    
    <div class="flex justify-center lg:w-[14.8%]  w-full h-max ">
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