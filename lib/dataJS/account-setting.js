import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'
import { Xhr } from './lib/xhr.js'
import { ImgFunction } from './lib/img.js'
import {GoogleMaps} from './lib/google.map.js'
import './lib/select-address.js'

GoogleMaps.init()

let formUpdateCustomer = document.querySelector('#form-update-customer')
let new_avatar = document.querySelector('#new_avatar')
function seption(){
    document.querySelectorAll('.link-list-menu li a').forEach(a => {
        a.classList.remove('active')
        if(a.href.match(location.hash)){
            a.classList.add('active')
        }
        document.querySelectorAll('.config-content').forEach(content => {
            $(content).fadeOut()
        })
        setTimeout(() => {
            $('.config-content' + location.hash).fadeIn()
        }, 500)
        
    })
}
document.addEventListener('DOMContentLoaded', function() {
    if(location.hash){
        seption()
    }
});
window.addEventListener('hashchange', function() {
    seption()
});

formUpdateCustomer.addEventListener('submit', e => {
    e.preventDefault();
    let inputEmpty = []
    formUpdateCustomer.querySelectorAll('input, select').forEach(el => {
        if(!Boolean(el.value))
            inputEmpty.push(el)
    })
    if(inputEmpty.length > 0){
        inputEmpty.forEach(el => {
            el.error()
        })
        Swl.fire({
            icon: 'errror',
            title: 'Complete todo los campos'
        })
    }else{
        Xhr.send({
            url: 'update-customer',
            data: new FormData(formUpdateCustomer),
            success: () => {
                Swl.fire({
                    icon: 'success',
                    title: 'Cuenta actualizada',
                    success: () => {
                        location.reload()
                    }
                })
            }
        })
    }
})

document.querySelector('.change-avatar').addEventListener('click', () => {
    new_avatar.click()
})
new_avatar.addEventListener('change', function(){
    console.dir(this.files)
    if(this.files.length == 1){
        let data = new  FormData()

        data.append('avatar', this.files[0])
        Xhr.send({
            url: 'change-avatar',
            data: data,
            success: () => {
                Swl.fire({
                    icon: 'success',
                    title: 'Cuenta actualizada',
                    success: () => {
                        location.reload()
                    }
                })
            }
        })
    }
})
document.querySelector('#form-update-address-customer').addEventListener('submit', e => {
    e.preventDefault()
    Xhr.send({
        url: 'addres-update',
        data: new FormData(e.target),
        success: () => {
            Swl.fire({
                icon: 'success',
                title: 'Cuenta actualizada',
                success: () => {
                    location.reload()
                }
            })
        }
    })
})