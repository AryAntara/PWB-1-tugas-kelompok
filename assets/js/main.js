/**
 * Jquery default setup
 * @setup
 */
window.addEventListener('load',async () => { 
  await sleep(500)
  loadStop()
})

$(document).ready(async function(){

  // check screen width 
  if($(window).width() < 1300){
    $('.notice').addClass('d-flex').addClass('position-fixed').css('z-index','9999')
    $('.notice').removeClass('d-none')
  }
  url = $('body').data('base-url')
  // toggle button eye 
  toggleEye()

  // set background
  setBg('handuk.png','body')

  // register user
  createUser()

  // login user 
  loginUser()

  // favorite button 
  fav_button_handler()

  // goto product detail if image clicked 
  product_detail()

  // set bg white if route in home
  // and make navbar reactive
  onRouteSet('/',function(){
    setBg('','body')

    // route home
    $('.home').addClass('active')  
    $('.produk').removeClass('active')

    $('body').addClass('bg-abu-abu')
    $(document).scroll(reactive_nav)
  })

  onRouteSet('user/login',function(){
    setBg('handuk.png','body')
    $('body').remove('bg-light')
    $(document).unbind("scroll")
  })

  onRouteSet('admin/auth',function(){
    setBg('handuk.png','body')
    $('body').remove('bg-light')
    $(document).unbind("scroll")
  })



  onRouteSet('user/signup',function(){
    setBg('handuk.png','body')
    $('body').remove('bg-light')
    $(document).unbind("scroll")
  })

  onRouteSet('product', function(){

    // route home
    $('.home').removeClass('active')
    $('.produk').addClass('active')

    // make navbar in top and fixed
    let navJq = $('.nav-desktop')

    $('.nav-desktop .navbar-search').addClass('d-flex').removeClass('d-none')
    $('.search-home').removeClass('d-flex').addClass('d-none')
    $('.nav-desktop .navbar-brand').addClass('d-flex').removeClass('d-none')

    navJq.removeClass('p-5')
    navJq.addClass('position-fixed')
      .addClass('bg-light')
      .css('width','100%')
      .css('z-index','999')
      .addClass('p-2')
      .addClass('shadow-sm')
    $(document).unbind("scroll")

  })

  onRouteSet('TentangKami', function(){

    // route home
    $('.home').removeClass('active')
    $('.tentang-kami').addClass('active')
    $('body').addClass('bg-abu-abu')

    // make navbar in top and fixed
    let navJq = $('.nav-desktop')

    $('.nav-desktop .navbar-search').addClass('d-flex').removeClass('d-none')
    $('.search-home').removeClass('d-flex').addClass('d-none')
    $('.nav-desktop .navbar-brand').addClass('d-flex').removeClass('d-none')

    navJq.removeClass('p-5')
    navJq.addClass('position-fixed')
      .addClass('bg-light')
      .css('width','100%')
      .css('z-index','999')
      .addClass('p-2')
      .addClass('shadow-sm')
    $(document).unbind("scroll")

  })

  onRouteSet('cart', function(){
    // make navbar in top and fixed
    let navJq = $('.nav-desktop')
  
    $('.nav-desktop .navbar-search').addClass('d-flex').removeClass('d-none')
    $('.search-home').removeClass('d-flex').addClass('d-none')
    $('.nav-desktop .navbar-brand').addClass('d-flex').removeClass('d-none')
  
    navJq.removeClass('p-5')
    navJq.addClass('position-fixed')
      .addClass('bg-light')
      .css('width','100%')
      .css('z-index','999')
      .addClass('p-2')
      .addClass('shadow-sm')
    $(document).unbind("scroll")
  
  })

  // quantity operation on product detail 
  quantityOperationBind()

  // add cart operation 
  addToCartBind()

  //delete cart operation 
  deleteFromCartBind()

  // multiple add cart operation
  multipleAddToCartBind()

  // edit checked of an product 
  editCheckAnProductBind()

  // edit all checkbox
  checkAllBind()

  // edit product qty
  editCartBind()

  // checkout 
  checkoutBind()

  // single product checkout
  checkoutSingleProductBind()
  
  // search egine 
  searchBind()

  // message handling 
  chat()

  // run functions list at ready 
  for(let func of ready){
    func()
  }
})

/**
 * view password toggle 
 */  
function toggleEye(){
  $('.eye').click(function(){
    let type = $(this).parent().find('input').attr('type') 
    if(type != 'text'){
      $(this).parent().find('input').attr('type','text')
      $(this).html('visibility')
    } else if (type != 'password'){
      $(this).parent().find('input').attr('type','password')
      $(this).html('visibility_off')
    }
  })
  return 
}

/**
 * set a background
 *
 * @param name string, path to image 
 * @param el string, element to fill
 */
function setBg(name,el){
  $(el).css('background-image',`url(${url}assets/img/${name})`)
}


/** 
 * 
 * Flexible navbar
 * 
 */ 
function reactive_nav(){
  // make nav bar fit and transparent
  let navEl = $('.nav-desktop')[0] ?  $('.nav-desktop')[0] : ''
    , navJq = $('.nav-desktop')
    , sticky = navEl.offsetTop
  if(window.pageYOffset <= sticky){
    $('.nav-desktop .navbar-search').removeClass('d-flex').addClass('d-none')
    $('.search-home').addClass('d-flex').removeClass('d-none')
    $('.nav-desktop .navbar-brand').removeClass('d-flex').addClass('d-none')    
    navJq.addClass('p-5')
    navJq.removeClass('position-fixed')
      .removeClass('bg-light')
      .removeClass('p-2')
      .removeClass('shadow-sm')
  } else {
    // make navbar fixed in top
    $('.nav-desktop').addClass('d-flex').removeClass('d-none')
    if(!global['search']){
      $('.navbar-search').addClass('d-flex').removeClass('d-none')
    }
    $('.search-home').removeClass('d-flex').addClass('d-none')
    $('.nav-desktop .navbar-brand').addClass('d-flex').removeClass('d-none')

    navJq.removeClass('p-5')
    navJq.addClass('position-fixed')
      .addClass('top-0')
      .addClass('bg-light')
      .css('width','100%')
      .css('z-index','999')
      .addClass('p-2')
      .addClass('shadow-sm')
  }

}
/**
 * make program sleep
 */
function sleep(i){
  return new Promise((resolve,reject) => {
    setTimeout(() => {
      resolve('')
    }, i);
  })
}

/**
 *
 * if this route mathe with routeName do something 
 *
 * @param routeName string, indinticate router name to be match 
 * @param callback function, something to do if route match
 */
function onRouteSet(routeName, callback){
  let router = window.location.href.split(url)[1] ? window.location.href.split(url)[1] : ''
  
  if(router == ''){ 
    router = '/'
  }
  if(router.includes(routeName)){
    callback()
  }
}
/**
 * make body to url encoded
 *
 * @param objec Object, object will be url encoded
 */
function url_encoded(object) {

  // masukan object ke dalam variable __temp
  let __temp = object

  // buat satu array kosong 
  , __arr = []

  // lakukan looping pada key yang terdapat pada object 
  Object.keys(__temp).forEach(e => {

    // lakukan encode uri pada key dan value dari object tersebut 
    __arr.push(`${encodeURIComponent(e)}=${encodeURIComponent(__temp[e])}`)
  })

  // lakukan join pada array tadi 
  // kembalikan nilai nya 
  return __arr.join('&')
}

/**
 * 
 * Loading stop 
 * 
 */
function loadStop(){
  $('div.loading').addClass('d-none').removeClass('d-flex')
}

/**
 * 
 * Loading Start
 * 
 */
function loadStart(){
  $('div.loading').addClass('d-flex').removeClass('d-none')
}

/**
 * 
 * Seacrh a product by name 
 * @param name: string 
 * 
 */
function searchEgine(name){
  // setup url 
  location.href = `${url}product/search?name=${name}`
}

/**
 * 
 * Seacrh event binding 
 * 
 */
function searchBind(){
  $('.search-home, .form-search').submit(function(event){ 
    event.preventDefault(); 
    // get product name 
    $(this).find('input').each(function(){
      let name = $(this).val()
      searchEgine(name)
    });
    
  }) 
}

/**
 * 
 * Back 
 * 
 */
function back(){
  history.back()
}

/**
 * 
 * If the magnifaying icon is clicked or hovered
 * Show the form seacrh
 * 
 */
function formSearch(){
  $('.navbar-search').on('click', displayFormSearch)    
  $('.form-search').hover(() => {}, hideFormSearch) 
}

function displayFormSearch(){  
  $(this).addClass('d-none');  
  // $('.form-search').toggle('drop', {direction: "right"});
}

function hideFormSearch(){  
  if($(this).find('input').val() == ""){    
    global['search'] = false;
    // $('.form-search').toggle('drop', {direction: "right"});
    // $('.navbar-search').removeClass('d-none');  
    return;
  }  
  global['search'] = true;
}
ready.push(formSearch)

function renderGraph(){
  const graphElement = $('.graph');
  const config = {
    type: 'bar',
    data: {      
      datasets: [{
        label: "data penjualan",
        data: [20, 10, 12, 4, 12, 79, 80, 12, 46, 76, 88, 99],
      }],
      labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    },    
    plugins: [],
  }

new Chart(graphElement,config); 
}

ready.push(renderGraph);