@extends('layouts.layout')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <div class="flex flex-col space-y-4">
        <div class="text-2xl mt-4 text-center border-b pb-4">
            {{$category->name}}
        </div>


    @if($category->subcategories->count()>0)
    <div class="text-center font-semibold text-lg">Выберите подкатегорию</div>
    <div class="flex justify-start flex-wrap">
        @foreach($category->subcategories as $subcategory)
        <div class="flex mt-2  2xl:mt-0 flex-col bg-white border text-center rounded p-4 items-center justify-between lg:text-sm lg:w-56 text-xs w-[48%]">
            <img src="{{url("images/site/sub_categories/".$subcategory->image)}}" class="w-36 " alt="">
            <a href="{{route('subcategory',[$category->id,$subcategory->id])}}" class="text-red">{{$subcategory->name}}</a>
        </div>
        @endforeach
        

    </div>
        
    @else
    @if($category->products->count() == 0)
    <div class="text-center">
    Нет товаров

    </div>
    @endif
    <div class="flex flex-wrap justify-between">
        @foreach($category->products as $product)
        @if($product->in_stock>0)
        <div class="flex flex-col mt-1.5 lg:text-sm lg:w-56 text-xs w-[48%] border items-center justify-between text-center space-y-2 p-2">
            <img src="{{url('images/products/'.$product->image)}}" class="w-5/6 h-40" alt="">
            <a href="{{route('item',$product->id)}}" class="hover:text-red-500 text-sm">{{$product->name}}</a>
            <p class="font-semibold">{{$product->price}}руб.</p>
            <div class="flex w-4/5  mb-2 text-xs font-semibold ">
              @if(Auth::check())
                <button @if(Auth::check() == false) onclick="showCartModal()" @else onclick="addToCart({{$product->id}},'{{route('add_to_cart',$product->id)}}','{{url('images/products/'.$product->image)}}','{{route('get_item',$product->id)}}')" @endif  class="flex bg-white border drop-shadow-sm w-full text-gray-900 items-center justify-center space-x-1 p-2 rounded">
     
                    В корзину
                </button>
                @endif
    
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif
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