
import './lib/dark_mode.js'
import { Swl } from './lib/sweetalert2.js'
import './lib/utils.js'
import { Xhr } from './lib/xhr.js'
import {CreateElement} from './lib/create-element.js'

let modal = document.querySelector('#show-tracking')
let modalBody = modal.querySelector('.modal-body')
let modalBodyUl = modalBody.querySelector('ul')
let modalLogoCourier = modal.querySelector('#modal-logo-courier')
let modalStatusText = modal.querySelector('#modal-status-text')

document.querySelectorAll('.btn-tracking').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault()
        let data = new FormData();
        data.append('courier', btn.getAttribute('data-courier'))
        data.append('tracking', btn.getAttribute('data-tracking'))
        Xhr.send({
            url: 'get-tracking',
            data: data,
            beforeSend: () => {
                $('#loader').fadeIn();
            },
            success: (_r) =>{
                $('#loader').fadeOut()
                modalBodyUl.innerHTML = ''
                modalLogoCourier.src = _r.logo_carrier
                modalStatusText.innerText = _r.status            
                _r.events.forEach(ev => {
                    CreateElement.add('.timeline-show-tracking', {
                        tag: 'li',
                        class: ['d-flex', 'p-3', 'border', 'rounded', 'mb-1'],
                        child: [
                            {tag: 'em', class: ['icon', 'ni', 'ni-bullet', 'align-self-center']},
                            {tag: 'div', class: ['datatime', 'col-2', 'mx-3', 'align-self-center'], text: ev.time},
                            {tag: 'div', class: ['content', 'col-8'], text: ev.description}
                        ]
                    })
                })
                $(modal).modal('show')
            },
            error: (_r) => {
                Swl.fire({
                    icon: 'error',
                    title: 'Ocurrio un error favor intentarlo mas tarde'
                })
            }
        })
    });
})