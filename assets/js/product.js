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
 * @param id: string
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
 * @param id: string 
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

        // id Produk
        let idProduct = $(this).data('id')

        if(!$(`.btn-product-id-${idProduct}`).hasClass('btn-danger')){
            await set_favorite(idProduct)
            $(`.btn-product-id-${idProduct}`).removeClass('btn-outline-danger')
            $(`.btn-product-id-${idProduct}`).addClass('btn-danger')
        } else {
            await remove_favorite(idProduct)
            $(`.btn-product-id-${idProduct}`).removeClass('btn-danger')
            $(`.btn-product-id-${idProduct}`).addClass('btn-outline-danger')
        }
    })
}
