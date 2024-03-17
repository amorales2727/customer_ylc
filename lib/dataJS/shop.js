import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'

function showURL(url){
    
}

document.querySelectorAll('.show-url-shop').forEach(a =>{
    a.addEventListener('click', e => {
        let url =  a.getAttribute('data-url').split(',')
        let html = ''
        url = url.filter(item => item != '' )
        url.forEach((u, i) => {
            html += `<a href="${u}" class="d-block btn btn-dim btn-info my-2" target="_blank">LINK${i + 1}</a>`   
        });
        Swl.fire({
            html: html,
            timer: 0
        })
    })
})