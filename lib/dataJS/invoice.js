import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'
import { Yappy } from './lib/yappy.js'


const formPayment = document.querySelector('#form-payment')
let payment_method = formPayment.querySelector('#payment_method')
let total = formPayment.querySelector('#total')

payment_method.addEventListener('change', function(){
    let btn = formPayment.querySelector('button[type="submit"]')
    if(this.value == '3'){
        btn.classList.add('btn-payment-yappy')
    }else{
        btn.classList.remove('btn-payment-yappy')
    }
})
document.querySelectorAll('.payment').forEach(el => {
    el.addEventListener('click', function(){
        total.value = this.getAttribute('data-total')
    })
})

formPayment.addEventListener('submit', e => {
    e.preventDefault()
    if(payment_method.value = '3'){
        Yappy.sendPayment(formPayment)
    }
})