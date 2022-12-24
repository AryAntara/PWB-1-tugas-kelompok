/*
 *
 * function  to go to product page with product id 
 *
 */ 
function product_detail(){
    $('.product').click(function(){
        let product_id = $(this).data('id')
        location.href = `${get_base_url()}/product/detail?product_id=${product_id}`
    })
}

/** 
 *
 * getting base url based  
 *
 */
function get_base_url(){
    redirect = location.href.split(location.pathname)[0]
    redirect += location.pathname  
    return redirect
}

/**
 * 
 * set favorite
 * 
 */
async function set_favorite(id){
    let resp = await fetch(`${url}product/favorite`,{
        method: 'POST', 
        headers : {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body : url_encoded({id_product: id}) 
    })
    return await resp.text()
}

/**
 * 
 * event if favorite clicked
 * 
 */
function fav_button_handler(){
    $('.button-fav').click(function(){
        console.log($(this).())
         $(this).removeClass('btn-outline-danger')
         $(this).addClass('btn-danger')
    })
}
