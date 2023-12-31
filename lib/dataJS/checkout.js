import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'
import { Xhr } from './lib/xhr.js'

const formPayment = document.querySelector('#payment-package')
formPayment.addEventListener('submit', e => {
    e.preventDefault()

    let data = new FormData(formPayment)
    
    if(document.querySelector('input[name="payment_method"]:checked')){
        Xhr.send({
            url: 'payment-package',
            beforeSend: () => {
                $('#loader').fadeIn()
            },
            data: data,
            success: (_r) => {
                window.location.replace(_r.url)
            },
            error: () =>{
                $('#loader').fadeOut(1000, () => {
                    Swl.fire({
                        icon: 'error',
                        title: 'Ocurrio un error favor de intentar nuevamente'
                    })
                })
                
            }
        })
    }else{
        Swl.fire({
            icon: 'error',
            title: 'Favor de selecionar un metodo de pago'
        })
    }
    
})