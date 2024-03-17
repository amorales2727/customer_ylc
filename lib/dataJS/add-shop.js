import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'
import { Xhr } from './lib/xhr.js'

const form = document.querySelector('form')

form.addEventListener('submit', (e) => {
    e.preventDefault()
    Xhr.send({
        url: 'add-shop',
        data: new FormData(form),
        beforeSend: () => {
            $('#loader').fadeIn()
        },
        error: (_r) => {
            $('#loader').fadeOut(1000, () => {
                if(_r.form){
                    _r.form.forEach(d => {
                        document.querySelector(d.id).error()
                    });
                    Swl.fire({
                        icon: _r.icon,
                        title: _r.msg
                    })
                }
            })
        },
        success: (_r) =>{
            $('#loader').fadeOut(1000, () => {
                Swl.fire({
                    icon: 'success',
                    title: 'Solicitud de compra agregada',
                    success: () => {
                        location.href = 'shop'
                    }
                })
            })
        }
    })
})