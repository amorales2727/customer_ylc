import {Request} from './Request.js'
import {Swl} from './sweetalert2.js'
class Customers{
    static resetPassword(form){
        let btnSumit = form.querySelector('button[type=submit]')
        function disableSubmit(){
            btnSumit.setAttribute('disabled', true);
            btnSumit.innerHTML = `
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            `;
        }
        function enableSubmit(){
            btnSumit.removeAttribute("disabled");
            btnSumit.innerHTML = '';
            btnSumit.innerText = 'Guardar Contraseña'
        }
        Request.xhr({
            url: 'reset-password',
            data: new FormData(form),
            beforeSend: () => {
                disableSubmit()
            },
            success: () => {
                Swl.fire({
                    icon: 'success',
                    title: 'Contraseña actualizado',
                    success: () => {
                        location.href = 'login'
                    }
                })
            },
            error: (_r) => {
                enableSubmit()
                Swl.fire({
                    icon: _r.icon,
                    title: _r.msg,
                    text: _r.text
                })
            }
        })
    }
    static login(form){
        Request.xhr({
            url: 'login',
            data: new FormData(form),
            beforeSend: () => {

            },
            success: (r) => {
                location.href = r.url 
            },
            error: (_r) => {
                if(_r.input){
                    _r.input.forEach(el => {
                        document.querySelector('#'  + el.key).classList.add('error');
                    });
                }
                Swl.fire({
                    icon: _r.icon,
                    title: _r.msg,
                })
            }
        })
    }
}

export default Customers