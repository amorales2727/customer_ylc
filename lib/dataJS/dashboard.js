import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'

document.querySelectorAll('.address-services .icon').forEach(icon => {
    icon.addEventListener('click', function(){
        let text = this.parentNode.innerText
        navigator.clipboard.writeText(text).then(() => {
            Swl.toast({
                icon: 'success', 
                title: 'copiado a porta papeles'
            })
        })
    })
})