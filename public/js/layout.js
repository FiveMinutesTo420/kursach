let cat_btn = document.getElementById('category_button');
let cat_menu = document.getElementById('category_menu');

let log_btn = document.getElementById('log-btn');
let log_menu = document.getElementById('log-menu');

let help_btn = document.getElementById('help-btn');
let help_menu = document.getElementById('help-menu');

let sel_country = document.getElementById('select_country');
let sel_region = document.getElementById('select_region');

let ru_regions = ['Владимировка', 'Жатай','Кангалассы','Маган','Марха','Покровск','Табага','Хатассы','Якутск']

let search_items_results = document.getElementById('search-items-results')
function select_c(){
    if(sel_country.value == "Russia"){
        ru_regions.forEach(element => {
            var el = document.createElement('option');
            el.value = element;
            el.text = element;
            sel_region.appendChild(el);
        });

    }else{
        sel_region.innerHTML = "";
        var el = document.createElement('option');
        el.value = "Не выбрано";
        el.text = "-- Выберите регион --";
        sel_region.appendChild(el);
    }
}

cat_btn.addEventListener('click',function(){
    if(cat_menu.classList.contains("hidden")){
        cat_menu.classList.remove("hidden")
        cat_menu.classList.add("block")
    }else{
        cat_menu.classList.remove("block")
        cat_menu.classList.add("hidden")
    }

})

log_btn.addEventListener('click',function(){
    help_menu.classList.remove("block")
    help_menu.classList.add("hidden")
    if(log_menu.classList.contains("hidden")){
        log_menu.classList.remove("hidden")
        log_menu.classList.add("block")
    }else{
        log_menu.classList.remove("block")
        log_menu.classList.add("hidden")
    }

})

help_btn.addEventListener('click',function(){
    log_menu.classList.remove("block")
    log_menu.classList.add("hidden")
    if(help_menu.classList.contains("hidden")){
        help_menu.classList.remove("hidden")
        help_menu.classList.add("block")
    }else{
        help_menu.classList.remove("block")
        help_menu.classList.add("hidden")
    }

})

function show(el){
    let d = el.lastElementChild;
    d.classList.remove('hidden');

}

function hide(el){
    let d = el.lastElementChild;
    d.classList.add('hidden');

}

currentSlideId = 1;
sliderElement = document.getElementById('slider');
if(sliderElement){
    totalSlides = sliderElement.childElementCount;



function next(){
    if(currentSlideId < totalSlides){
        currentSlideId++;
        showSlide()
    }else{
        currentSlideId = 1;
        showSlide()
    }
}
function prev(){
    if(currentSlideId>1){
        currentSlideId--;
        showSlide()
    }else{
        currentSlideId = totalSlides;
        showSlide()
    }
}
function showSlide(){
    slides = document.getElementById('slider').getElementsByTagName('li');
    for(let index = 0; index < totalSlides; index++){
        const element = slides[index];
        if(currentSlideId === index +1){
            element.classList.remove('hidden')
        }else{
            element.classList.add('hidden')
        }
    }

}
setInterval(function() {
    next()
}, 5000);
}
function showfooter(el){
    let d = el.parentNode;
    let c = d.lastElementChild;
    if(c.classList.contains("hidden")){
      c.classList.remove('hidden');
    }else{
      c.classList.add('hidden');
  
    }
  
}
function showCartModal(){
    document.getElementById('cart_modal').classList.remove('hidden');
}

document.getElementById('back_cart_modal_btn').addEventListener('click',function(){
    document.getElementById('cart_modal').classList.add('hidden');
})
function search_enter(el,url){
    if(event.key === "Enter"){
        window.location.replace(url+"?q="+el.value);
    }
}


async function search(el,url,img_url,item_url){

    let data = {
        'text':el.value
    }
    let response = await fetch(url,{
        method:"POST",
        headers:{
            'X-CSRF-TOKEN':document.getElementById('ctoken').getAttribute('content'),
            'Content-Type':'application/json;charset=utf-8'
        },
        body:JSON.stringify(data)
    })
    let result = await response.json();
    
    if(result.message == 'not_found'){
        if(document.getElementById('search-results').classList.contains('hidden')){
            document.getElementById('search-results').classList.remove('hidden')
        }
        
        search_items_results.innerHTML = "<div class='p-4'>Товаров не найдено</div>";
        document.getElementById('amount-find').innerHTML = result.amount;
        document.getElementById('search-link').setAttribute('href',result.url);


    }
    if(result.message == 'good'){
        if(document.getElementById('search-results').classList.contains('hidden')){
            document.getElementById('search-results').classList.remove('hidden')
        }
        let products = result.products
        
        search_items_results.innerHTML = "";

        
        products.map(x => search_items_results.innerHTML += "<a href='"+item_url + '/' + x.id +"' class='border-b hover:bg-gray-100 py-3 flex space-x-4 px-4'><div class='w-[60px] h-[60px]'><img src='"+img_url+'/'+x.image+"' class=' rounded-lg border p-1 ' alt='' ></div><div class='flex-col space-y-2 w-full min-w-0'><div class='text-sm'>"+x.name+"</div><div class='text-xs w-full truncate block'>"+x.description.substring(0,70)+'...'+"</div><div class='text-sm'>"+x.price+" рублей</div></div></a>")
        
        document.getElementById('amount-find').innerHTML = "";
        document.getElementById('amount-find').innerHTML = result.amount;

        document.getElementById('search-link').setAttribute('href',result.url);


    }
}

window.onclick = function(){
    document.getElementById('search-results').classList.add('hidden')

}