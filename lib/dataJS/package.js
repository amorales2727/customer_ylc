import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'

document.querySelectorAll('a.btn-show-photo').forEach(element => {
    element.addEventListener('click', function(){
        console.log(this.getAttribute('data-url-img'))
        Swl.fire({
            imageUrl: this.getAttribute('data-url-img'),
            timer: 0,
            showCloseButton: true,
        })
    })
});