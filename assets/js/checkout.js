/**
 * 
 * do checkout 
 * @param field: Object 
 * @param oneProduct: Boolean
 * @param id: int
 * 
 */
async function checkout(field,oneProduct = false,id){
    // setup url 
    let urlCheckout = oneProduct ? `${url}checkout/buy/${id}` : `${url}checkout/buy`

    // do fetch 
    let response = await fetch(urlCheckout,{
        method: 'POST',
        headers: {
            'Content-Type': FORM_ENCODED
        },
        body: url_encoded(field) 
    })
    response = await response.json()
    if(response.status == 'error'){
        if(response.code == '108'){
            await Swal.fire({
                icon: 'error',
                title: 'Stok prouduk tidak cukup',
                text: `Wah stok dari *${response.product}* kurang nih`,
                confirmButtonText: 'baik'
            })
            location.reload()
            return 
        } else if(response.code == '107'){
            await Swal.fire({
                icon: 'error',
                title: 'Waduh',
                text: 'Keranjang kamu kosong nih',
                confirmButtonText: 'baik'
            })
            location.reload()
            return 
        } else { 
            await Swal.fire({
                icon: 'error',
                title: 'Error tak terduga',
                text: 'Tejadi error nih, tapi aku nga tau penyebabnya',
                confirmButtonText: 'baik'
            })
            location.reload()
            return 
        }
    }
    await Swal.fire({
        icon: 'success',
        title: 'Info Udah terkirim',
        text: 'Silahkan cek whatsapp kamu ya, Pastiin dulu sebelum membayar',
        confirmButtonText: 'Ayo Belanja Lagi!'
    })

    location.href = `${url}product/all`
}

/**
 * 
 * Checkout event bind 
 *   
 */
function checkoutBind(){
    $('form.last-dialog').submit(async function(event){
        event.preventDefault();
        let field = {};
        if($(this).data('single-product')){

            // get value from global
            let product = getValue('single_product') 
            field['single-product'] = true;
            if(product){
                field['id'] = product['id']
                field['qty'] = product['qty']
            }
        }

        // empty field validation
        let emptyValue = false
        $(this).find('input,textarea').each(async function(e){

        // check if input empty

        if($(this).val() == '') { 
            emptyValue = true
            await Swal.fire({
                icon: 'warning',
                title: 'Gagal',
                text: 'Yah, sepertinya ada yang kosong nih.',
                confirmButtonText: 'Yuk isi dulu'
            })
        } else {
            field[$(this).attr('name')] = $(this).val()
        }
        })

        // stop if some content empty
        if(emptyValue){
            return 
        }

        // lakukan checkout 
        await checkout(field);
    })
}

/**
 * 
 * do checkout for one product
 * @param Element: Document Element
 */
function getDataSingleProduct(Element){
    let qty = $('#value-multiple-add-cart').val()
    let id = $(Element).data('id')

    // set value global
    setGlobal({ single_product: { qty,id } })
}

/**
 * 
 * bind event for buy single product 
 * 
 */
function checkoutSingleProductBind(){
    $('.buy-one-product').click(function(){ 
        getDataSingleProduct(this) 
    })
}