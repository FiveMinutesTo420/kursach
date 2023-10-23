
let firstB = document.getElementById('firstB');
let secondB = document.getElementById('secondB');
let thirdB = document.getElementById('thirdB');

let in_stock = document.getElementById('in_stock').innerHTML;

let firstEl = document.getElementById('firstEl');
let addToCartBtn = document.getElementById('addToCartBtn');

let secondEl = document.getElementById('secondEl');
let thirdEl = document.getElementById('thirdEl');
let buy = document.getElementById('buy');
let item_modal = document.getElementById('item_modal');
let back_item_modal_btn = document.getElementById('back_item_modal_btn');
let back_3item_modal_btn = document.getElementById('back_3item_modal_btn');

let count_item_modal = document.getElementById('count_item_modal');

let canvas3d = document.getElementById('canvas3d')

let dopen = document.getElementById('3dopen');
let modal3d = document.getElementById('3item_modal')
dopen.addEventListener('click',function(){
    modal3d.classList.remove('hidden')
    const scene = new THREE.Scene()
    const camera = new THREE.PerspectiveCamera(
        75,
        window.innerWidth / window.innerHeight,
        0.1,
        1000
    )
    camera.position.z = 2
    
    const renderer = new THREE.WebGLRenderer({alpha:true,antialias:true})
    renderer.setClearColor(0x000000,0)
    renderer.setSize(800,600)
    canvas3d.appendChild(renderer.domElement)
    //const controls = new THREE.OrbitControls(camera, renderer.domElement)
    //controls.enableDamping = true
    const loader = new GLTFLoader()
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
            obj.scene.scale.set(1.3,1.3,1.3)
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
            obj.scene.rotation.y += 0.03
        }
        renderer.render(scene, camera)

    
    }

    animate()

})
document.getElementById('count_input').setAttribute('max',in_stock);

firstEl.classList.remove('hidden')
firstB.addEventListener('click',function(){
    secondEl.classList.add('hidden');
    thirdEl.classList.add('hidden');
    firstEl.classList.remove('hidden');
})
secondB.addEventListener('click',function(){
    thirdEl.classList.add('hidden');
    firstEl.classList.add('hidden');
    secondEl.classList.remove('hidden');
})
thirdB.addEventListener('click',function(){
    secondEl.classList.add('hidden');
    firstEl.classList.add('hidden');
    thirdEl.classList.remove('hidden');
})
buy.addEventListener('click',function(){
    item_modal.classList.remove('hidden');
    count_item_modal.innerText = "x" + document.getElementById('count_input').value;
    document.getElementById('count_cart').value = document.getElementById('count_input').value;
    
})
back_item_modal_btn.addEventListener('click',function(){
    item_modal.classList.add('hidden');
})
back_3item_modal_btn.addEventListener('click',function(){
    modal3d.classList.add('hidden');
})