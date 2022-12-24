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
 * remove product 
 * 
 */
async function remove_favorite(id){
    await fetch(`${url}product/favorite/discard`,{  
        method: 'POST',
        headers : {
            'Content-Type': 'application/x-www-form-urlencoded' 
        }, 
        body: url_encoded({id_product: id})
    })
} 
/**
 * 
 * event if favorite clicked
 * 
 */
function fav_button_handler(){
    $('.button-fav').click(async function(){
        if(!$(this).hasClass('btn-danger')){
            await set_favorite($(this).data('id'))
            $(this).removeClass('btn-outline-danger')
            $(this).addClass('btn-danger')
        } else {
            await remove_favorite($(this).data('id'))
            $(this).removeClass('btn-danger')
            $(this).addClass('btn-outline-danger')
        }
    })
}
