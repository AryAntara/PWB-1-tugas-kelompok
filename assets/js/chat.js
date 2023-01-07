/**
 * 
 * Chat message handler
 * 
 */
function chat(){
    // control message length
    messageLengthControl()

    // send message
    sendMessage()

    // socket event 
    socketEventBind()

    //restore message 
    restoreMessage()
}

/**
 * 
 * Limit message content 100
 */
function messageLengthControl(){
    // message 
    let messageLength = $('.message-content').text().length 
    if(messageLength > 51){
        $('.message-box').css('width','80%')
    }
}

/**
 * 
 * seding message 
 * 
 */
function sendMessage(){
    $('.send').click(async function(){
        let message = $('.chat').val()
        let template = 
        `<div class="message-box ms-auto mt-3 bg-primary rounded-3 border border-1 text-light p-1" style="max-width: 70%;opacity: 0.5;width: max-content;height: max-content">
            <p class="message-content p-1 m-1 text-right" style="word-break: break-all; width: auto">${message}</p>
        </div>`
        $('.message').append(template)
        let el = document.getElementsByClassName('message')[0]
        el.scrollTop = el.scrollHeight;
        $('.chat').val('')

        // backup message 
        backupMessage({user:'customer',message})

        // data send to backend
        let from = $('body').data('username') ? $('body').data('username') : `GUEST-${Date.now()}` 
        let data  = {
            socket_id : `${socket.id}`,
            message: `id : ${Date.now()}xtx EOLname : ${from}EOLmessage : EOLEOL ${message}`
        }

        // send to server 
        await fetch(`${url}user/message/receive`,{
            method: 'POST',
            headers: {'Content-Type': FORM_ENCODED },
            body: url_encoded(data) 
        })

        // scroll down
        $(document).scrollTop($(document).height())

    })
}

/**
 * 
 * socket.io event 
 * 
 */
function socketEventBind () {
    if(typeof socket == 'object') { 
        socket.on('reply',(msg) => {
        let template = 
        `<div class="message-box bg-abu-abu mt-3 rounded-3 border border-1 text-dark p-1" style="opacity: 0.9;width: max-content;max-width: 70%;height: max-content">
            <p class="message-content p-1 m-1 " style="word-break: break-all; width: auto">${msg}</p>
            </div>`
            $('.message').append(template)

            // backup message 
            backupMessage({user:'admin',message: msg})

            // scroll down
            $(document).scrollTop($(document).height())
        })
    }
}

/**
 * 
 * save message to localstorage
 * @param msg: Object; key = user, message
 */
function backupMessage(msg){

    if(localStorage.getItem('TAGIS-ecommerce-4')){
        let lastBackup = getMessage() 
        lastBackup.push(msg)
        localStorage.setItem('TAGIS-ecommerce-4',JSON.stringify(lastBackup))
    } else { 
        localStorage.setItem('TAGIS-ecommerce-4',JSON.stringify([msg]))
    }
}

/**
 * 
 * get message from localstorage
 * @return Array
 */
function getMessage(){
    let items = localStorage.getItem('TAGIS-ecommerce-4')
    if(items){
        return JSON.parse(items)
    } else {
        return []
    }
}

/**
 * 
 * restore msg from localstorage
 * 
 */
function restoreMessage(){
    let msg = getMessage()
    msg.forEach((e,i)  => {
        let message = e.message
        if(e.user === 'customer'){
            let template = 
            `<div class="message-box ms-auto mt-3 bg-primary rounded-3 border border-1 text-light p-1" style="max-width: 70%;opacity: 0.5;width: max-content;height: max-content">
                <p class="message-content p-1 m-1 text-right" style="word-break: break-all; width: auto">${message}</p>
            </div>`
            $('.message').append(template)
        } else {
            let template = 
            `<div class="message-box bg-abu-abu mt-3 rounded-3 border border-1 text-dark p-1" style="opacity: 0.9;width: max-content;max-width: 70%;height: max-content">
                <p class="message-content p-1 m-1 " style="word-break: break-all; width: auto">${message}</p>
             </div>`
             $('.message').append(template)
        }
    })
}

/**
 * 
 * clear backup 
 * 
 */
async function clearBackup(){
    let user_response = await Swal.fire({
        icon: 'warning',
        title: 'Waduh',
        text: 'Kamu yakin ingin hapus ? ',
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya, hapus'
    })

    if(user_response.isConfirmed){
        localStorage.setItem('TAGIS-ecommerce-4','[]')
        location.reload()
    }
}