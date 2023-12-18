@extends('layouts.layout')
@section('title') {{$item->name}}@endsection
@section('content')
    <div class="flex flex-col mt-4 space-y-4">
        <div class="text-center font-semibold text-3xl mb-4">{{$item->name}}</div>
        <div class="flex flex-wrap justify-center lg:justify-between ">
            <div class="flex flex-col">
              <img src="{{url('images/products/'.$item->image)}}" class="" width="250" alt="">
              <button class="py-2 px-4 bg-green-400 mt-4 rounded-md" id="3dopen">Click to view in 3D</button>
            </div>
            
            <div class="text-center text-sm w-[600px] overflow-clip h-36">
                @if($item->description == "")
                   <div class="text-lg"> Опачки нет описания :0</div>
                @else
                    {{$item->description}}
                @endif
            </div>
            <div class="border-2 p-4 rounded h-fit w-full xl:w-[250px]">
                <div class="flex flex-col space-y-2">
                    <div class="flex text-lg font-semibold">
                        <p>{{$item->price}} руб.</p>
                    </div>
                    <div class="flex  text-gray-700 ">
                        <p class="text-center ">
                            В наличии:
                        <p id="in_stock">{{$item->in_stock}}</p> 

                        </p>
                    </div>
                    <div class="flex space-x-2">
                        <div class="flex text-black">
                            <input type="number" id="count_input" class="border w-[60px] text-center" min="1" max="{{$item->in_stock}}" value="1">
                        </div>
                        @if(Auth::check())
                        <button @if(Auth::check() == false) disabled @endif id="buy"  class="text-center px-3 bg-[#F79400] text-white font-semibold rounded w-full py-1">
                            
                            Купить
                   
                        </button>
                        @endif

                    </div>
                    @if(Auth::check() == false)
                    <p class="text-red-500"><a href="{{route('log_p')}}" class="text-green-500">Войдите</a>, чтобы добавлять товары в корзину</p>
                    @endif

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
                            <img src="{{url('images/products/'.$item->image)}}" class="" width="35" alt=""> {{$item->name}} <span class="text-black" id="count_item_modal"></span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <form action="{{route('add_to_cart',$item->id)}}" method="POST">
                      @csrf
                      <input type="hidden" name="count" id="count_cart">
                      <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Добавить</button>
                    </form>
                 
                    <button type="button" id="back_item_modal_btn" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Назад</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <!--3D MODAL-->

          <div class="relative z-10 hidden" id="3item_modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
          
            <div class="fixed inset-0 z-10 overflow-y-auto">
              <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ">

                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-[60%] h-[700px]">
                  <div class="bg-white p-4 flex flex-col items-center justify-center w-full">
                    <div class="container flex justify-center m-2 mt-16 items-center" id="canvas3d">

                    </div>
                    <button type="button" id="back_3item_modal_btn" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Закрыть</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--END 3D MODAL-->




        <div class="flex">
            <div class="flex border-b w-full">
                <button class="p-3 border-t border-l border-r hover:bg-gray-100 flex justify-between " id="firstB">
                    <svg fill="#ccc" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                    </svg>
                    Описание</button>
                <button class="p-3 border-t border-l border-r hover:bg-gray-100" id="secondB">
                    <svg fill="#ccc" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                    </svg>
                </button>
                <button class="p-3 border-t border-l border-r hover:bg-gray-100" id="thirdB">Отзывов ()</button>
            </div>

            
        </div>
        <div class="flex">
            <div class="flex hidden " id="firstEl">
                @if($item->description == "")
                 Опачки нет описания :0
             @else
                 {{$item->description}}
             @endif
            </div>
            <div class="flex hidden" id="secondEl">
                @if($item->kindOfAnimal)
                    
                @endif
            </div>
            <div class="flex hidden" id="thirdEl">
                aboba31
            </div>
        </div>
    </div>
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r126/three.min.js" integrity="sha512-n8IpKWzDnBOcBhRlHirMZOUvEq2bLRMuJGjuVqbzUJwtTsgwOgK5aS0c1JA647XWYfqvXve8k3PtZdzpipFjgg==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>-->

    <script  src="{{url('js/item.js')}}"></script>
    <script type="module">
      let back_3item_modal_btn = document.getElementById('back_3item_modal_btn');

      let canvas3d = document.getElementById('canvas3d')

      let dopen = document.getElementById('3dopen');
      let modal3d = document.getElementById('3item_modal')
      back_3item_modal_btn.addEventListener('click',function(){
          canvas3d.innerHTML = "";
          modal3d.classList.add('hidden');
      })
      dopen.addEventListener('click',function(){
          modal3d.classList.remove('hidden')
          const scene = new THREE.Scene()
          const camera = new THREE.PerspectiveCamera(
              75,
              window.innerWidth / window.innerHeight,
              0.1,
              1000
          )
          camera.position.z = 1
          
          const renderer = new THREE.WebGLRenderer({alpha:true,antialias:true})
          renderer.setClearColor(0x000000,0)
          renderer.setSize(1000,500)
          canvas3d.appendChild(renderer.domElement)

          const loader = new THREE.GLTFLoader()
          const aLight = new THREE.AmbientLight(0x404040,1.2)
          scene.add(aLight)
          const pLight = new THREE.PointLight(0xFFFFFF,1.2)
          pLight.position.set(0,-3,7)
          scene.add(pLight)
          let obj = null
          loader.load(
              '../images/3d/dc1/scene.gltf',
              function(gltf){
                  obj = gltf
                  obj.scene.scale.set(0.2,0.2,0.2)
                  scene.add(obj.scene)
              },
                (xhr) => {
                  console.log((xhr.loaded / xhr.total) * 100 + '% loaded')
              },
              (error) => {
                  console.log(error)
              }
          )

          
          function animate() {
              requestAnimationFrame(animate)
              if(obj){
                obj.scene.rotation.y += 0.01
              }
              renderer.render(scene, camera)

          
          }

          animate()

      })
    </script>
    @endsection
@endsection