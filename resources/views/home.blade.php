@extends('layouts.layout')
@section('title')Магазин посуды Катюша @endsection
@section('content')

    <div class="w-full flex flex-col lg:flex-row space-y-4 mt-4 lg:space-y-0 justify-between">
        <div class="flex text-center p-4 border w-full lg:w-[49%] bg-white rounded">
            <div class="flex items-start  mr-4">
                <img src="{{url('images/site/vk50.png')}}" class="w-16" alt="">
            </div>
            <div class="flex flex-col">
                <p class="border-b font-semibold  pb-2">Наш ВКонтакте</p>
                <p class="pt-2 font-light">подписывайтесь на нашу группу Vkontakte чтобы узнавать новости первыми</p>
            </div>
        </div>
        <div class="flex text-center p-4 border w-full lg:w-[49%] bg-white rounded">
            <div class="flex items-start mr-4">
                <img src="{{url('images/site/tg50.png')}}" class="w-20" alt="">
            </div>
            <div class="flex flex-col">
                <p class="border-b font-semibold pb-2">Наш Telegram</p>
                <p class="pt-2 font-light">подписывайтесь на наш Telegram чтобы быть в курсе всего первыми, получить консультацию</p>
            </div>

        </div>
    </div>

    <div class="flex  flex-wrap justify-center lg:justify-between text-center font-semibold text-sm">
        <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
            <img src="{{url("images/site/vetkorm150.png")}}" class="w-36 " alt="">
            <p>Барная посуда</p>
        </div>
        <div class="flex m-2 2xl:m-0 flex-col bg-white border rounded p-4 items-center justify-between w-56" >
            <img src="{{url("images/site/ruletki150.jpg")}}" class="w-36" alt="">

            <p>Посуда для праздников</p>

        </div>
        <div class="flex m-2 2xl:m-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
            <img src="{{url("images/site/perenoski150.jpg")}}" class="w-36" alt="">

            <p>Товары для сервировки</p>

        </div>
        <div class="flex m-2 2xl:m-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
            <img src="{{url("images/site/vlajka150.png")}}" class="w-36" alt="">

            <p>Принадлежности для сервировки</p>
            
        </div>
        <div class="flex m-2 2xl:m-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
            <img src="{{url("images/site/akvadekor150.jpg")}}" class="w-36" alt="">

            <p>Декор стола</p>
            
        </div>
    </div>
    <div class="flex flex-col text-center space-y-4 ">
        <p class="font-semibold text-xl mt-4">Сковороды </p>
        <div class="flex  flex-wrap justify-center lg:justify-between text-center font-semibold text-sm">
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/royalcanin200.png")}}" class="w-36 " alt="">
                <p>Royal Canin для кошек</p>
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56" >
                <img src="{{url("images/site/purina200x200.png")}}" class="w-36" alt="">
    
                <p>PURINA</p>
    
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/farmina200.png")}}" class="w-36" alt="">
    
                <p>Farmina</p>
    
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/boreal200.png")}}" class="w-36" alt="">
    
                <p>Boreal для кошек</p>
                
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/derlaklogo200.png")}}" class="w-36" alt="">
    
                <p>Деревенские лакомства</p>
                
            </div>
        </div>
    </div>
    <div class="flex flex-col text-center space-y-4">
        <p class="font-semibold text-xl  mt-4">Кастрюли: </p>
        <div class="flex  flex-wrap justify-center lg:justify-between text-center font-semibold text-sm">
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/royalcanin200.png")}}" class="w-36 " alt="">
                <p>Royal Canin для собак</p>
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56" >
                <img src="{{url("images/site/purina200x200.png")}}" class="w-36" alt="">
    
                <p>PURINA</p>
    
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/farmina200.png")}}" class="w-36" alt="">
    
                <p>Farmina</p>
    
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/territoriyalogo200.png")}}" class="w-36" alt="">
    
                <p>ТерриториЯ™</p>
                
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/fundoglogo200.png")}}" class="w-36" alt="">
    
                <p>Fun Dog</p>
                
            </div>
        </div>
    </div>
    <div class="flex flex-col text-center space-y-4">
        <p class="font-semibold text-xl  mt-4">Керамические товары:</p>
        <div class="flex  flex-wrap justify-center lg:justify-between text-center font-semibold text-sm">
            <div class="flex mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/birds170.jpg")}}" class="w-36 " alt="">
                <p>Товары для птиц</p>
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56" >
                <img src="{{url("images/site/kak_chasto_kormit_cherepah170.jpg")}}" class="w-36" alt="">
    
                <p>Корма для рептилий и черепах</p>
    
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/hamsterhome170.jpg")}}" class="w-36" alt="">
    
                <p>Товары для грызунов</p>
    
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/section170.jpg")}}" class="w-36" alt="">
    
                <p>Витамины</p>
                
            </div>
            <div class="flex m-2 2xl:m-0 mt-2 2xl:mt-0 flex-col bg-white border rounded p-4 items-center justify-between w-56">
                <img src="{{url("images/site/grumingcare170.jpg")}}" class="w-36" alt="">
    
                <p>Груминг и уход</p>
                
            </div>
        </div>

    </div>
    <div class="flex flex-col justify-between">
        <div class="text-center p-2 rounded-tl rounded-tr bg-[#F7F7F7] border border-b-0">
            <p>Рекомендуемые</p>
        </div>
        <div class="rounded-br  rounded-bl border border-t-0 bg-white ">
            <div class="flex justify-between flex-wrap">
                @foreach($recomm_products as $product)
                <div class="flex flex-col justify-between lg:text-sm lg:w-56 text-xs w-[45%]  items-center align-super text-center space-y-2 p-2">
                    <img src="{{url('images/products/'.$product->image)}}"  class=" h-40 " alt="">
                    <a href="{{route('item',$product->id)}}" class="text-sm hover:text-red-500">{{$product->name}}</a>
                    <p class="font-semibold">{{$product->price}}руб.</p>
                    <div class="flex w-4/5  mb-2 text-xs font-semibold ">
                        <button @if(Auth::check() == false) onclick="showCartModal()"  @else onclick="addToCart({{$product->id}},'{{route('add_to_cart',$product->id)}}','{{url('images/products/'.$product->image)}}','{{route('get_item',$product->id)}}')" @endif class="flex bg-white border drop-shadow-sm w-full text-gray-900 items-center justify-center space-x-1 p-2 rounded">
                            В корзину
                        </button>
            
                    </div>
                </div>
                @endforeach
                
                </div>
            </div>
        </div>
        <div class="relative z-10 hidden" id="item_modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
          
            <div class="fixed inset-0 z-10 overflow-y-auto">
              <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class=" ">
                      <div class="mt-3  text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Добавить в корзину</h3>
                        <div class="mt-2 text-sm text-gray-500 ">
                          <p class="mb-3 " id="modalText">
                            Вы хотите добавить этот товар в корзину?
                          </p>
                          <p class="border-t py-3 border-b flex  justify-between text-center text-xs items-center">
                            <img src="" class="" width="35" alt="" id="modal-item-image"> <span id="modal-item-name"></span> <span class="text-black" id="count_item_modal">x1</span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <form action="" method="POST" id="add_form_cart">
                      @csrf
                      <input type="hidden" name="count" id="count_cart" value="1">
                      <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Добавить</button>
                    </form>
                 
                    <button type="button" id="back_item_modal_btn" onclick="close_item_modal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Назад</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
    

@endsection
@section('scripts')
    <script src="{{url('js/cart.js')}}"></script>
@endsection