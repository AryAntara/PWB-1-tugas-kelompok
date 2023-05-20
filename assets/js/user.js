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

    let loginUrl = `${url}user/login/process`;
    // admin user
    if($(this).hasClass('admin')){
      loginUrl =  `${url}login/auth/login_admin`
    }

    // fetching data 
    let response = await fetch(loginUrl,{
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


