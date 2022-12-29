/**
 * 
 * Add to cart
 * @param product: Object
 * 
 */
async function addToCart(product){
    // setup url 
    let cartUrl = `${url}cart/add`

    // make request to cartUrl
    let response = await fetch(cartUrl,{
        method: 'POST', 
        headers: {
            'Content-Type':FORM_ENCODED
        },
        body: url_encoded(product)
    })

    // convert response to object
    response = await response.json()

    // are there error ? 
    if(response.code == '106' ){
        // 106 is status code for 'user not login'
    
        // display swal alert and wait for user response
        let user_response = await Swal.fire({
            icon: 'warning',
            title: 'Gagal',
            text: 'Yah, sepertinya kamu belum login nih.',
            showCancelButton: true,
            cancelButtonText: 'Nanti aja',
            confirmButtonText: 'Ayo Login'
        })
    
        // user click 'Ayo login'
        // redirect him to login page
        if(user_response.isConfirmed){
            location.href = `${url}/user/login`
        }

        return false 
    }
    return true 
}

/**
 * 
 * bind an event for add to cart operation
 * 
 */
function addToCartBind(){
    $('.add-cart').click(async function(){
        // product data and qty
        let product = {
            qty: 1,
            id: $(this).data('id')
        }

        // add product data to cart 
        if(await addToCart(product))
            notify()
    })
}

/**
 * 
 * delete an item from cart 
 * @param idProduct: integer
 * @param element: Document Element
 * 
 */
async function deleteFromCart(idProduct,element){

    // setup url 
    let cartUrl = `${url}cart/delete`
    // display swal alert and wait for warning
    let user_response = await Swal.fire({
        icon: 'warning',
        title: 'Peringata',
        text: 'Yakin nih dihapus ?',
        showCancelButton: true,
        cancelButtonText: 'Nggak jadi',
        confirmButtonText: 'Iya hapus'
    })

    // user click 'Ayo login'
    // redirect him to login page
    if(!user_response.isConfirmed){
        return    
    }

    // remove tr element of this product
    let trElement = $(element).parents()[1]
    $(trElement).remove()

    let response = await fetch(cartUrl,{
        method:'POST',
        headers:{
            'Content-Type': FORM_ENCODED,
        }, 
        body : url_encoded({id: idProduct})
    })

    // conver to object
    response = await response.json()
    
    // if cart empty reload
    if(response.redirect){
        location.href = response.redirect
    }

}
/**
 * 
 * bind a event for delete from cart
 */
function deleteFromCartBind(){
    $('.delete-cart').click(function(){
        // id product
        let idProduct = $(this).data('id')
        deleteFromCart(idProduct,this) 
    })
}
/**
 * 
 * toas if user add item to cart
 * 
 */
function notify(){
    Toastify({
        text: "Berhasil! Produk telah di tambakan ke cart",
        duration: 2500,
        newWindow: true,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        position: "left", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #0275d8, #d9534f)",
        },
    }).showToast();
}