<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <link href="{{url('images/site/miniLogo.jpg')}}" rel="icon">
    @yield('head')
    <meta name="csrf-token" id="ctoken" content="{{ csrf_token() }}">
</head>
<body>
    <header class="bg-white p-1 drop-shadow-md">
        <div class="container lg:w-9/12 w-[95%]   mx-auto flex font-normal ">
            <div class="flex flex-1  justify-center">
                <a href="" id="top-links" class="space-x-2 flex bg-gray-50 items-center hover:bg-gray-200 px-3 rounded-sm transition-all duration-200">
                    <span>
                        <svg viewBox="0 0 24 24" class="w-5" xmlns="http://www.w3.org/2000/svg" >
                            <path id="svg" d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/>
                        </svg>
                    </span>
                    <span class="lg:block hidden"> Закладки (0)</span></a>
                <a href="" id="top-links" class="space-x-2 flex bg-gray-50  items-center hover:bg-gray-200 px-3 rounded-sm transition-all duration-200">
                    <span>
                        <svg class="w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
                            <path id="svg" d="M10 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h5v2h2V1h-2v2zm0 15H5l5-6v6zm9-15h-5v2h5v13l-5-6v9h5c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                    </span>
                    <span class="lg:block hidden"> Сравнение (0)</span></a>
            </div>
            <div class="flex  text-md ">
                <button id="help-btn" class="flex space-x-2 bg-gray-50  items-center hover:bg-gray-200 px-3 rounded-sm transition-all duration-200">
                    <span>
                        <svg class="w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
                            <path id="svg" d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/>
                        </svg>
                    </span>
                    <span class="lg:block hidden">Помощь</span>
                </button>

                <button id="log-btn" class="flex space-x-2 bg-gray-50  items-center hover:bg-gray-200 px-3 py-1 rounded-sm transition-all duration-200">
                    <span>
                        <svg class="w-5"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
                            <path id="svg" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </span>
                    <span class="lg:block hidden">
                        @if(auth()->check())
                            {{auth()->user()->name}}
                        @else
                        Личный кабинет
                        @endif
                    </span>
                </button>
       
            </div>
            
        </div>
        <div class="lg:w-4/5 w-full mx-auto">
            <div class="flex w-full justify-end ">
                <div id="help-menu" class="h-20 hidden w-50 lg:mr-32  text-sm bg-white border absolute flex flex-col justify-center items-center">
                    <a href="" class="w-full hover:bg-gray-100 p-1 px-4">Условия доставки</a>
                    <a href="" class="w-full hover:bg-gray-100 p-1 px-4">Контакты</a>
                    
                </div>
                <div id="log-menu" class="h-max rounded hidden w-54 text-sm lg:mr-5   bg-white border absolute flex flex-col justify-center items-center">
                    @if(auth()->check())
                    @if(auth()->user()->status == 2)
                        <a href="{{route('admin')}}" class="w-full hover:bg-gray-100 p-1 px-4">Админ</a>
                    @endif
                    <a href="{{route('reg_p')}}" class="w-full hover:bg-gray-100 p-1 px-4 ">Личный кабинет</a>
                    <a href="{{route('orders')}}" class="w-full hover:bg-gray-100 p-1 px-4">История заказов</a>
                    <a href="{{route('cart')}}" class="w-full hover:bg-gray-100 p-1 px-4 ">Корзина</a>
                    <form action="{{route('logout')}}" method="POST" class="w-full cursor-pointer">
                        @csrf
                        <input type="submit" value="Выход" class="w-full text-left hover:bg-gray-100 p-1 px-4">
                    </form>
        
                    @else
                    <a href="{{route('reg_p')}}" class="w-full hover:bg-gray-100 p-1 px-4 ">Регистрация</a>
                    <a href="{{route('log_p')}}" class="w-full hover:bg-gray-100 p-1 px-4">Авторизация</a>
                    @endif
                    
                </div>
            </div>

        </div>
            
        
        
    </header>

    <div class="container lg:w-9/12 w-[95%] mx-auto space-y-4  ">
        <div class="flex items-center mt-5 lg:flex-row flex-col justify-start ">
            <a href="{{route('home')}}">
                <img src="{{url('images/site/logoKat.jpg')}}" class="w-[70%] "  alt="">
            </a>
            
                <div class="lg:border-t-0 lg:border-b-0 lg:w-auto lg:p-0 border-t-2 border-b-2 w-full text-center flex items-center flex-col p-4">
                    <div class="flex">
                        <svg class="d-block position-absolute" fill="#00ff00" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <span class="font-semibold text-lg">74112 21-28-27</span> 
                    </div>

                    <p class="text-xs text-gray-500 ">+7 (914)278-26-29</p>
                </div>

            </div>
        <div class="mt-4   flex xl:flex-row xl:space-x-5 space-x-0 space-y-4 xl:space-y-0 flex-col">
            <div class="flex flex-col">
                <button class="bg-[#F79400] flex text-white p-3 w-full xl:w-[249px] rounded font-semibold" id="category_button">
                    <span>
                        <svg height="24" fill="#fff" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                        </svg>
                    </span>
                    <span class="flex-1">Категории</span>
                    <span>
                        <svg height="24" width="24" fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
                        </svg>
                    </span>
                </button>
                <div class="absolute z-20 hidden flex-col  rounded-br-lg rounded-bl-lg border bg-white w-2/3 xl:w-[249px] mt-12" id="category_menu">
                    @foreach($categories as $category)
                    <div class="flex p-3 border-t items-center justify-between hover:text-red-500 " @if($category->subcategories->count() > 0) onmouseover="show(this)" onmouseout="hide(this)" onclick="show(this)" @endif  >
                        <div class="flex">
                            <img src="{{url('images/site/categories/'.$category->image)}}" alt="" class="">
                            @if($category->subcategories->count() > 0)
                            <p href="{{route('category',$category->id)}}" class="cursor-pointer text-sm ml-4 font-semibold " >
                                {{$category->name}}
                            </p>
                            @else
                            <a href="{{route('category',$category->id)}}" class="cursor-pointer text-sm ml-4 font-semibold " >
                                {{$category->name}}
                            </a>
                            @endif
                        </div>

                        @if($category->subcategories->count() > 0)
                        <svg fill="#aaa" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"/>
                        </svg>
                        <div class="absolute flex flex-col hidden lg:ml-[237px] p-3 px-4 space-y-4 ml-[210px] items-center bg-white border rounded-lg  w-[150px]" id="sub_cats">
                            @foreach($category->subcategories as $sub_category)
                            <a href="{{route('subcategory',[$category->id,$sub_category->id])}}" class="text-xs lg:text-sm    text-black font-semibold  hover:text-red-500 w-full ">
                                {{$sub_category->name}} 
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                 
                </div>
            </div>
          
            <div class="flex flex-col w-full">
            <input placeholder="Поиск в каталоге" id="search-input" oninput="search(this,'{{route('search')}}','{{url('images/products')}}','{{url('item')}}')" onkeydown="search_enter(this,'{{route('search_p')}}')" value="@if(isset($query)){{$query}} @endif" type="text" class="flex-1 rounded py-3 border px-4">
                <div id="search-results" class="hidden absolute z-20 mt-14 w-[95%] md:w-[80%] lg:w-[40%] bg-white border rounded  drop-shadow  flex flex-col">
                    <div id="search-items-results" class="w-full">
                        
                    </div>
                    
                    <a href='' class='flex justify-center p-2 text-xs' id="search-link">Все результаты ( <span id="amount-find"></span> )</a>
                </div>
    
            </div>
            <button class="flex py-3 text-white justify-between  items-center py-1 xl:py-0 bg-[#007BFF] w-full xl:w-auto text-sm px-4 rounded space-x-4" onclick="showCartModal()">
                <span class="flex">
                    <svg width="24" class=""  fill="#fff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.21 9l-4.38-6.56c-.19-.28-.51-.42-.83-.42-.32 0-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1h-4.79zM9 9l3-4.4L15 9H9zm3 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
                    </svg>
                </span>
                <span class="">
                    @if(Auth::check())
                    Корзина ({{auth()->user()->cart->where('order_id',null)->count()}})
                    @else
                    <p>Войдите</p>
                    @endif
                </span>
                <span class="flex">
                    <svg width="24" fill="#fff" class="" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
					</svg>
                </span>
            </button>
            
        </div>
     

        @if(Session::has('success'))
        <div class="p-3 px-4 flex items-center justify-center rounded bg-green-400 text-white text-lg">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="p-3 px-4 flex items-center justify-center rounded bg-red-400 text-white text-lg">
            {{Session::get('error')}}
        </div>
        @endif
     
    </div>
    
    <div class="container lg:w-9/12 w-[95%] mx-auto space-y-6  ">
        @yield('content')
    </div>
    <div class="container lg:w-9/12 w-[95%] border rounded mx-auto space-y-6 mt-4 mb-4 ">
       <div class="bg-white w-full p-4">
        <div class="flex text-center flex-col  lg:flex-row justify-between items-center lg:items-start space-y-5 lg:space-y-0">
            <div class="flex flex-col w-full border-b b justify-center  lg:border-b-0 py-3 space-y-4">
                <div class="flex w-full justify-between cursor-pointer items-center" onclick="showfooter(this)">
                    <p class="font-semibold lg:text-lg text-base flex w-full justify-center">Информация</p>
                    <svg fill="#000000" width="11" class="lg:hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path> </g></svg>
                </div>
                <div class="text-sm space-y-2 mt-2 lg:flex flex-col hidden  items-center ">
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    О компании</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Политика конфиденциальности </p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Пользовательское соглашение</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Условия доставки</p>

                </div>
               
            </div>
            <div class="flex flex-col w-full border-b lg:border-b-0 py-3 space-y-4">
                <div class="flex w-full justify-between cursor-pointer items-center" onclick="showfooter(this)">
                    <p class="font-semibold lg:text-lg text-base flex w-full justify-center">Служба поддержки</p>
                    <svg fill="#000000" height="11px" width="11px" class="lg:hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path> </g></svg>
                </div>
                <div class="text-sm space-y-2 mt-2 lg:flex flex-col hidden  items-center ">
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Контакты</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>Возврат товара </p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Карта сайта</p>
               

                </div>
               
            </div>
            <div class="flex flex-col w-full border-b lg:border-b-0 py-3 space-y-4">
                <div class="flex w-full justify-between cursor-pointer items-center" onclick="showfooter(this)">
                    <p class="font-semibold lg:text-lg text-base flex w-full justify-center">Дополнительно</p>
                    <svg fill="#000000" height="11px" width="11px" class="lg:hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path> </g></svg>
                </div>
                <div class="text-sm space-y-2 mt-2 lg:flex flex-col hidden  items-center ">
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Производители</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>Подарочные сертификаты </p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Партнерская программа</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Акции</p>

                </div>
               
            </div>
            <div class="flex flex-col w-full border-b lg:border-b-0 py-3 space-y-4">
                <div class="flex w-full justify-between cursor-pointer items-center" onclick="showfooter(this)">
                    <p class="font-semibold lg:text-lg text-base flex w-full justify-center">Личный кабинет</p>
                    <svg fill="#000000" height="11px" width="11px" class="lg:hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path> </g></svg>
                </div>
                <div class="text-sm space-y-2 mt-2 lg:flex flex-col hidden  items-center ">
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Личный кабинет</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>История заказов </p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Закладки</p>
                    <p class="flex text-start lg:text-center">
                        <svg fill="#aaa" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"></path>
                    </svg>
                    Рассылка</p>

                </div>
               
            </div>
        </div>
       </div>
    </div>
    <div class="relative z-10 hidden" id="cart_modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.
      
          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.
      
              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class=" ">
   
                  <div class="mt-3  text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Корзина покупок</h3>
                    <div class="mt-4 text-sm space-y-4 text-gray-500 ">
                    @if(Auth::check())
                        @if(auth()->user()->cart->where('order_id',null)->count() == 0)
                            <p> Вы не добавили ни одного товара </p>
                        @else
                            @foreach(auth()->user()->cart->where('order_id',null) as $cart_item)
                            <div class="flex justify-between items-center text-xs lg:text-sm space-x-2  py-3">
                                <img width="60" src="{{url('images/products/'.$cart_item->item->image)}}" alt="">
                                <a href="{{route('item',$cart_item->item->id)}}" class="text-center  hover:border-b text-blue-500">{{$cart_item->item->name}}</a>
                                <div class="flex flex-col">
                                    <p><b class="text-black">{{$cart_item->item->price * $cart_item->count}}</b> руб.</p>
                                    <p class="text-center text-xs text-black">x{{$cart_item->count}}</p>
                                </div>
                            </div>
                            @endforeach
                            <?php $sum_total = 0?>
                            <div class="w-full flex items-center border-t border-b p-4 justify-center">
                            @foreach(auth()->user()->cart->where('order_id',null) as $cart_item)
                                <?php $sum_total += $cart_item->item->price * $cart_item->count ?>
                                
                            @endforeach
                               <p> {{auth()->user()->cart->where('order_id',null)->count()}} товар(ов), на сумму  <b class="text-black">{{$sum_total}} рублей</b></p>
                            </div>
                        @endif
                      @else
                      <p><a href="{{route("log_p")}}" class="text-blue-500 border-b">Войдите</a>, чтобы добавлять товары в корзину</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 ">
                @if(Auth::check())
                @if(auth()->user()->cart->where('order_id',null)->count() != 0)
                <form action="{{route('order.create')}}"  method="POST" class="">
                    @csrf
                    <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Оформить заказ</button>
                </form>

                @endif
                 
                  <a href="{{route('cart')}}" class="mt-3 lg:mt-0 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold shadow-sm text-gray-900 sm:ml-3 sm:w-auto ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Перейти в корзину</a>
               
                @else
                <a href="{{route('log_p')}}" class="cursor-pointer inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Войти</a>
                @endif
                <button type="button" id="back_cart_modal_btn" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Вернуться</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="relative z-10 hidden" id="login_modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.
      
          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.
      
              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class=" ">
   
                  <div class="mt-3  text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Корзина покупок</h3>
                    <div class="mt-4 text-sm space-y-4 text-gray-500 ">
                      <p><a href="{{route("log_p")}}" class="text-blue-500 border-b">Войдите</a>, чтобы добавлять товары в корзину</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 ">
                <a href="{{route('log_p')}}" class="cursor-pointer inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Войти</a>
                
                <button type="button" id="back_cart_modal_btn" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Вернуться</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="{{url('js/layout.js')}}"></script>
    @yield('scripts')
</body>
</html>