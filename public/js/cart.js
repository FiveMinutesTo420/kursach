async function changeAmount(amount,id,url){
    let data = {
        amount:amount.value,
        id:id,
    }
    
    let response = await fetch(url,{
        method:'POST',
        headers:{
            'X-CSRF-TOKEN':document.getElementById('ctoken').getAttribute('content'),
            'Content-Type':'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    })
    let result = await response.json()
    if(result.all == "good"){
        let get = document.querySelectorAll('.stock_error');
        get.forEach(element => {
            element.innerHTML = "";
        });
        if(document.getElementById('error') != null){
            document.getElementById('error').remove();

        }
        document.getElementById('checkForm').removeAttribute('disabled');

    }else{
        document.getElementById('checkForm').setAttribute('disabled','disabled')
        if("remove_id" in result){
            document.getElementById(result.remove_id).innerHTML = "";
        }
     
        const el = document.querySelector('.ifhaserror');
        el.innerHTML = "<div class='flex w-full p-4 text-xs bg-[#F8D7DA] mt-4 rounded text-center justify-center drop-shadow' id='error'>Товары отмеченные *** отсутствуют в нужном количестве или их нет на складе!</div>"
        if("add_error" in result){
            document.getElementById(result.add_error_class).innerHTML = "***"
            /*
            if(document.getElementById(result.add_error).querySelector("#error") == null){
                document.getElementById(result.add_error).innerHTML += "<div id='error'><div class='text-red-500' id='"+result.add_error_class+"'>***</div></div>";
            }
            */
            
        }
        
    }
    document.getElementById('total').innerHTML = result['new_total'] + " руб.";     
    document.getElementById('sum').innerHTML = result['new_total'] + " руб.";
    document.getElementById('cart-item' + id).innerHTML = result['new_price'] + " руб.";

    
}

async function addToCart(id,form_url,img_url,request_url){
    let data = {
        id:id
    }
    document.getElementById('add_form_cart').setAttribute('action',form_url)
    document.getElementById('modal-item-image').setAttribute('src',img_url)
    let response = await fetch(request_url,{
        method:'POST',
        headers:{
            'X-CSRF-TOKEN':document.getElementById('ctoken').getAttribute('content'),
            'Content-Type':'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    })
    let result = await response.json()

    document.getElementById('modal-item-name').innerHTML = result.name
    if(document.getElementById('item_modal').classList.contains('hidden')){
        document.getElementById('item_modal').classList.remove('hidden')
    }else{
        document.getElementById('item_modal').classList.add('hidden')

    }
    
}

function close_item_modal(){
    document.getElementById('item_modal').classList.add('hidden')
}