import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'
import { Xhr } from './lib/xhr.js'
import { Yappy } from './lib/yappy.js'

let inputFile = document.querySelector('input#file')
let contentBtnUoloadFile = document.querySelector('.upload-file')
let previewFile = document.querySelector('.preview-file')
let form = document.querySelector('#form-prealert-add')

function iconFileUploadType(type){
    let icon = ''
    switch(type){
        case 'image/jpeg':
            icon = 'assets/img/file-type-media.svg'
            break
    }
    return icon
}
function validateFild(arr = [], h){
    arr.forEach(el => {
        let field = document.querySelector(el)
        if(!Boolean(field.value)){
            if(typeof h == 'function'){
                h(field)
            }
            throw '';
        }else{
            console.log()
        }
    })
    
    
}
contentBtnUoloadFile.addEventListener('click', () => {
    inputFile.click()
})
inputFile.addEventListener('change', function(){

    if(this.files.length == '1'){
        let file = this.files[0]
        $(contentBtnUoloadFile.parentNode).fadeOut('', '', function(){
            previewFile.children[0].src = iconFileUploadType(file.type)
            previewFile.children[1].innerText = file.name
            $(previewFile).fadeIn()
        })
    }
})
form.addEventListener('submit', e => {
    e.preventDefault();
    try{
        validateFild(['#tracking', '#cost', '#file', '#id_category'], (el) =>{
            el.error()
            Swl.fire({
                icon: 'error',
                title: el.getAttribute('data-alert-message')
            })
        })
        Xhr.send({
            url: 'pre-alert-add',
            data: new FormData(form),
            beforeSend: () => {
                $('#loader').fadeIn()
            },
            error: (r) => {
                $('#loader').fadeOut()
                if(r.error_tracking){
                    document.querySelector('#tracking').error()
                }
                Swl.fire({
                    icon: 'error',
                    title: r.msg
                })
            },
            success: () => {
                $('#loader').fadeOut()
            }
        })
    }catch(e){

    }
})