/**
 * Jquery default setup
 * @setup
 */
$(document).ready(async function(){

  // toggle button eye 
  toggleEye()

  // set background
  setBg('topi.png','body')

  // register user
  createUser()

  // login user 
  loginUser()

  // navbar control 
  navbar()
})

/** 
 * global variable
 */
let url = $('body').data('base-url')

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
  * signup handler
  */ 
function createUser(){
  $('.create-user').submit( async function(e){   
    // replace default form control
    e.preventDefault()   

    // for field and value input
    let userData = {}

    // empty field validation
    , emptyValue = false
    $(this).find('input').each(function(e){

      // check if input empty
      if($(this).val() == '') { 
        emptyValue = true
        let parrentInput = $(this).parent()

        // shake the empty field
        parrentInput.removeClass('border').removeClass('border-secondary')
          .addClass('border-danger').addClass('border').addClass('shake-me')    
      } else {
        let elNameAtributte = $(this).attr('name')
        userData[elNameAtributte] = {}
        userData[elNameAtributte]['value'] = $(this).val()
        userData[elNameAtributte]['tag'] = this
      }
    })

    if(emptyValue){
      // reset input in 800 ms
      await sleep(800)
      $(this).find('input').each(function(e){
        let parrentInput = $(this).parent()
        if(parrentInput.hasClass('border-danger')){
          parrentInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
            .addClass('border-secondary').addClass('border')
        }
      })
      return 
    }

    // confirm password validation
    if(userData['password']['value'] != userData['confirm_password']['value']){
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Konfirmasi Kata sandi mu tidak sama dengan Kata Sandi',
      })

      // add input error 
      $(userData['confirm_password']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')

      // reset input in 800ms
      await sleep(800)
      let cpInput = $(userData['confirm_password']['tag']).parent()
      if(cpInput.hasClass('border-danger')){
        cpInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }

      return 
    }

    // username validation
    let username = userData['username']['value']
      , simbolChar = '!@#$%^&*()><?"{}|+-'
      , trailedChar = [...simbolChar.split('')]
      , last_char = ''

    if(trailedChar.some( e => { 
      last_char = e 
      return username.split('').includes(e)
    })){
      
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Nama Pengguna tidak boleh mengandung "${last_char}"`,
      })

      // add input error 
      $(userData['username']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')
        
      // reset input in 800 ms
      await sleep(800)
      let usernameInput = $(userData['username']['tag']).parent()
      if(usernameInput.hasClass('border-danger')){
        usernameInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }

      return 
    }

    // phone number validation 
    let phone = userData['phone']['value']
    
    if(phone.length < 12 || isNaN(Number(phone))){
      // alert 
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Nomor telepon tidak valid`,
      })

      // add input error 
      $(userData['phone']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')
        
      // reset input in 800 ms
      await sleep(800)
      let phoneInput = $(userData['phone']['tag']).parent()
      if(phoneInput.hasClass('border-danger')){
        phoneInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }
      
      return 

    }

    let userDataToSend = {}
    // convert userData 
    Object.keys(userData).forEach(e => {
      userDataToSend[e] = userData[e]['value']
    })

    // fetching data 
    let response = await fetch(`${url}user/signup/new`,{
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: url_encoded(userDataToSend)
    })
    response = await response.json()

    if(response.code == '102' && response.status == 'error'){
      // email sudah di gunakan 
      // alert 
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Email Sudah digunakan`,
      })

      // add input error 
      $(userData['email']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')
        
      // reset input in 800 ms
      await sleep(800)
      let phoneInput = $(userData['email']['tag']).parent()
      if(phoneInput.hasClass('border-danger')){
        phoneInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }
      
      return 

    }

    if(response.code == '103' && response.status == 'error'){
      // username sudah di gunakan 
      // alert 
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Username Sudah digunakan`,
      })

      // add input error 
      $(userData['username']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')
        
      // reset input in 800 ms
      await sleep(800)
      let phoneInput = $(userData['username']['tag']).parent()
      if(phoneInput.hasClass('border-danger')){
        phoneInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }
      return 

    }

    // login success
    await Swal.fire({
      icon: 'success',
      title: 'Hore...',
      text: `Registrasi Berhasil`,
    })

    window.location.href = `${url}user/login`

  })
}
/**
 * login user handler 
 */
function loginUser(){
  $('.login-user').submit( async function(e){   
    // replace default form control
    e.preventDefault()   

    // for field and value input
    let userData = {}

    // empty field validation
    , emptyValue = false
    $(this).find('input').each(function(e){

      // check if input empty
      if($(this).val() == '') { 
        emptyValue = true
        let parrentInput = $(this).parent()

        // shake the empty field
        parrentInput.removeClass('border').removeClass('border-secondary')
          .addClass('border-danger').addClass('border').addClass('shake-me')    
      } else {
        let elNameAtributte = $(this).attr('name')
        userData[elNameAtributte] = {}
        userData[elNameAtributte]['value'] = $(this).val()
        userData[elNameAtributte]['tag'] = this
      }
    })

    if(emptyValue){
      // reset input in 800 ms
      await sleep(800)
      $(this).find('input').each(function(e){
        let parrentInput = $(this).parent()
        if(parrentInput.hasClass('border-danger')){
          parrentInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
            .addClass('border-secondary').addClass('border')
        }
      })
      return 
    }

    let userDataToSend = {}
     // convert userData 
    Object.keys(userData).forEach(e => {
      userDataToSend[e] = userData[e]['value']
    })

    // fetching data 
    let response = await fetch(`${url}user/login/process`,{
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: url_encoded(userDataToSend)
    })

    response = await response.json()

    if(response.code == '104' && response.status == 'error'){
      // username salah
      // alert 
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Username Salah`,
      })

      // add input error 
      $(userData['username']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')
        
      // reset input in 800 ms
      await sleep(800)
      let phoneInput = $(userData['username']['tag']).parent()
      if(phoneInput.hasClass('border-danger')){
        phoneInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }
      return 

    }

    if(response.code == '105' && response.status == 'error'){
      // password salah 
      // alert 
      await Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `Password salah`,
      })

      // add input error 
      $(userData['password']['tag']).parent().removeClass('border').removeClass('border-secondary')
        .addClass('border-danger').addClass('border').addClass('shake-me')
        
      // reset input in 800 ms
      await sleep(800)
      let phoneInput = $(userData['password']['tag']).parent()
      if(phoneInput.hasClass('border-danger')){
        phoneInput.removeClass('border-danger').removeClass('border').removeClass('shake-me')
          .addClass('border-secondary').addClass('border')
      }
      return 

    }

    // login success
    await Swal.fire({
      icon: 'success',
      title: 'Hore...',
      text: `Process Masuk Berhasil`,
    })
    window.location.href = `${url}`
  })
}

/**
 *
 * check navbar is invisible from view port 
 *
 */ 
function navbar(){
  $(document).scroll(function(){
    // make nav bar fit and transparent
    let navEl = $('.navbar')[0]
      , navJq = $('.navbar')
      , sticky = navEl.offsetTop
    if(window.pageYOffset <= sticky){
      $('.navbar-search').removeClass('d-flex').addClass('d-none')
      $('.search-home').addClass('d-flex').removeClass('d-none')
      $('.navbar-brand').removeClass('d-flex').addClass('d-none')

      navJq.addClass('p-5')
      navJq.removeClass('position-fixed')
        .removeClass('bg-light')
        .removeClass('p-2')
        .removeClass('shadow-sm')
    } else {
      $('.navbar-search').addClass('d-flex').removeClass('d-none')
      $('.search-home').removeClass('d-flex').addClass('d-none')
      $('.navbar-brand').addClass('d-flex').removeClass('d-none')

      navJq.removeClass('p-5')
      navJq.addClass('position-fixed')
        .addClass('bg-light')
        .css('width','100%')
        .css('z-index','999')
        .addClass('p-2')
        .addClass('shadow-sm')
    }

  })
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

