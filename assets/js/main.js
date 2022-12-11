/**
 * Jquery default setup
 * @setup
 */
$(document).ready(function(){

  // toggle button eye 
  toggle_eye()

  // set background
  set_bg('handuk.png')
})

/** 
 * global variable
 */
let url = $('body').data('base-url')

/**
 * view password toggle 
 */  
function toggle_eye(){
  $('.eye').click(function(){
    let type = $(this).parent().find('input').attr('type') 
    console.log(type)
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
 */
function set_bg(name){
  $('body').css('background-image',`url(${url}assets/img/${name})`)
}


