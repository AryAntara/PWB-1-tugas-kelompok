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

    // qty cart or new element 
    if(response.qty){
        // update qty
        $(`#value-cart-${response.id_product}`).val(response.qty)
        $('.product-total').text(response.last_price)

    } else if(response.reload){
        onRouteSet('cart',() => {
            location.reload();
            return false
        })
        
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
            notify('Product berhasil di tambahkan ke keranjang')
    })
}

/**
 * 
 * bind an event for multiple add to cart operation
 * 
 */
function multipleAddToCartBind(){
    $('.multiple-add-cart').click(async function() {
        // get qty multiple value 
        let qty = $('#value-multiple-add-cart').val()

        // product data and qty
        let product = {
            qty,
            id: $(this).data('id')
        }

        // add product data to cart 
        if(await addToCart(product))
            notify('Produk berhasil ditambahkan ke keranjang')
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
        title: 'Peringatan',
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
    } else {
        $('.product-total').text(response.last_price)
        $('.check-all').prop('checked',response.select_all)
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
 * edit check status from a product in cart
 * @param operation: string 
 * @param id: integer
 * 
 */
async function editChecked(operation,id){

    // setup url 
    let urlEditCheck = operation == 'check' ? `${url}cart/check` : `${url}cart/check/discard`

    // do request 
    let response = await fetch(urlEditCheck,{
        method: 'POST',
        headers:{
            'Content-Type': FORM_ENCODED,
        },
        body: url_encoded({id})
    })

    return await response.json()
}

/**
 * 
 * Uncheck or Check a product from cart 
 * 
 */
function editCheckAnProductBind(){
    $('.checked-product').change(async function(){

        // product list 
        let productEls = $('.checked-product');
        let selected = 0;

        // check product is checked or not
        productEls.each(function (){
            if($(this).prop('checked')){
                selected++
            } 
        })

        // if all product are checked, checked the all-select 
        if(selected === productEls.length){
            $('.check-all').prop('checked',true)
        } else {
            $('.check-all').prop('checked',false)
        }
        
        // get id 
        let id = $(this).data('id')
        // get value of the check box
        let switchCheck = $(this).prop('checked')

        if(switchCheck === true){
            // check 
            // await response from server 
            let response = await editChecked('check',id)
            $('.product-total').text(response.last_price)
            
        } else {
            // uncheck
            // await response from server 
            let response = await editChecked('uncheck',id)
            $('.product-total').text(response.last_price)
        }
    })
}
/**
 * 
 * checked all product
 * 
 */
function checkAllBind(){
    $('.check-all').change(function (){
        if($(this).prop('checked')){
            $('.checked-product').prop('checked',true).trigger('change')
        } else {
            $('.checked-product').prop('checked',false).trigger('change')
        }
    })
}

/**
 * 
 * edit product on cart 
 * @param id: integer
 * @param qty: integer
 * 
 */
async function editCart(id,qty){
    // setup url 
    let urlEditQty = `${url}cart/update`

    // do a request 
    let response = await fetch(urlEditQty,{
        method: 'POST',
        headers: {
            'Content-Type' : FORM_ENCODED
        },
        body: url_encoded({id,qty})
    })

    // convert response string to json
    return await response.json()
}

/**
 * 
 * event for edit or update quantity from a product in cart
 * 
 */
function editCartBind(){
    $('.update-qty').click(async function(){
        let id = $(this).data('id')
        let inputElement = $(this).parent().find('input')
        let currentValue = parseInt(inputElement.val())
        let qty = currentValue

        // request to server and wait response
        let response =  await editCart(id,qty)
        $('.product-total').text(response.last_price)

    })
}
/**
 * 
 * toasify setup
 * @param message: string
 * 
 */
function notify(message){
    Toastify({
        text: message,
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