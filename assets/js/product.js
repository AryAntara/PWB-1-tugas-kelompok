/*
 *
 * function  to go to product page with product id 
 *
 */ 
function product_detail(){
    $('.product').click(function(){
        let product_id = $(this).data('id')
        location.href = `${url}product/detail?product_id=${product_id}`
    })
}


/**
 * 
 * add and remove product 
 * @param id: string 
 * @param remove: boolean, and defaut true
 */
async function edit_favorite(id,remove = true){
    let urlEditFavorit = remove ? `${url}product/favorite/discard` : `${url}product/favorite` 
    let resp = await fetch(urlEditFavorit,{  
        method: 'POST',
        headers : {
            'Content-Type': FORM_ENCODED 
        }, 
        body: url_encoded({id_product: id})
    })

    // is an error ? 

    let status = await resp.json()
    if(status.code == '106' ){
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
 * bind an event if favorite clicked
 * 
 */
function fav_button_handler(){
    $('.button-fav').click(async function(){

        // id Produk
        let idProduct = $(this).data('id')

        if(!$(`.btn-product-id-${idProduct}`).hasClass('btn-danger')){

            // add favorite item
            let is_success = await edit_favorite(idProduct,false)
            if(is_success === false){
                return
            }

            $(`.btn-product-id-${idProduct}`).removeClass('btn-outline-danger')
            $(`.btn-product-id-${idProduct}`).addClass('btn-danger')
            notify('Produk di tambahkan ke favorit >_<')
        } else {

            //remove favorite item
            let is_success = await edit_favorite(idProduct)
            if(is_success === false){
                return
            }

            $(`.btn-product-id-${idProduct}`).removeClass('btn-danger')
            $(`.btn-product-id-${idProduct}`).addClass('btn-outline-danger')
            notify('Produk dihapus dari favorit T_T')
        }
    })
}


/**
 * 
 * Increment or Decrement custom quatity in detail 
 * @param operation: string 
 * @param currentElement: Document Element
 */

function quantityOperation(operation,currentElement){
    let inputElement = $(currentElement).parent().find('input')
    let currentValue = parseInt(inputElement.val())

    if(operation === 'increment'){
        // do a ++ operation
        inputElement.val(++currentValue)
    } else if(operation === 'decrement'){
        // do a -- operation
        if(currentValue === 0 ) return
        inputElement.val(--currentValue)
    }
}

/**
 * 
 * Bind quantity operation in button + and -
 * 
 */
function quantityOperationBind(){
    // increment
    $('.qty-plus').click(function(){
        quantityOperation('increment',this)
    })
    
    // decrement
    $('.qty-minus').click(function(){
        quantityOperation('decrement',this)
    })
}


function form_send(){
    $('.form-send').on('submit', function(e){
        e.preventDefault();

        // remove error message
        $('small.text-danger').remove()
        let formEl = $(this);
        let form = new FormData(formEl[0]);                         
        form.append('file_gambar', $(this).find('[type="file"]')[0].files[0])        
        if($(this).find('[type="file"]')[0].files[0]){
            form.append('gambar', 'product_image');
        }
        $.ajax({ 
            url: $(this).attr('action'),
            processData: false,
            type : "post",
            contentType : false,            
            data : form,
            success : function(data){
                data = JSON.parse(data);
                if(data.error){
                    Object.keys(data).forEach(e => {
                        $(`[name="${e}"]`).parent().append(`<small class="text-danger">${data[e]}</small>`);
                    });
                    // login success
                    Swal.fire({
                        icon: 'warning',
                        title: 'Waduh :(',
                        text: `Ada ketinggalan!`,
                    })
                }  else if (data.success){
                    window.location.reload();
                }
                
            },
            error: function(...arg){
                console.error(arg);
            }
        })

    })
}
ready.push(form_send);

function buttonDelete(){
    $('.btn-hapus').on('click', function(){
        Swal.fire({
            icon : 'warning',
            title : 'Hapus',
            text : 'Yakin mau hapus data ini ?',
            showCancelButton: true,
        }).then(async e => {
            if(e.isConfirmed){
                await $.ajax($(this).data('route'));
                await Swal.fire({
                    icon : 'success',
                    title : 'Berhasil',
                    text : 'Hore! berhasil',                    
                });  
                window.location.reload();
            }
        })
    })
}
ready.push(buttonDelete);

ready.push(function(){
    $('.btn-edit-produk').on('click', function(){
        
        let formData = $(this).data('row');
        // row => name 
        let pairs = {
            merek : 'merk',
            type : 'tipe'
        }        


        Object.keys(formData).forEach(item => {
            let field = item;
            if(field == 'gambar_produk'){
                let img = $(this).parents('tr').find('img');
                let divContainner = document.createElement('div')
                $(divContainner).append(img.clone()).addClass('my-2').addClass("image");                
                let isImage = $('#edit-product').find('div.image');
                if(isImage.length > 0){
                    isImage.remove()
                }
                $('#edit-product').find(`[name="gambar"]`).before(divContainner);
            }
            if(pairs[item]){
                field = pairs[item];
            }
            $('#edit-product').find(`[name="${field}"]`).val(formData[item]);
        })

        $('#edit-product').modal('show');
    })
})
