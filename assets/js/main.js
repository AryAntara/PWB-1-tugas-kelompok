/**
 * Jquery default setup
 * @setup
 */
window.addEventListener('load',async () => { 
  await sleep(500)
  loadStop()
})

$(document).ready(async function(){

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
    $('body').addClass('bg-abu-abu')
    $(document).scroll(reactive_nav)
  })

  onRouteSet('user',function(){
    setBg('handuk.png','body')
    $('body').remove('bg-light')
    $(document).unbind("scroll")
  })

  onRouteSet('product', function(){
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
  quantityOperationBind();

  // add cart operation 
  addToCartBind()

  //delete cart operation 
  deleteFromCartBind()

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
  let navEl = $('.nav-desktop')[0]
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
  let router = window.location.href.split(url)[1]

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