import './lib/utils.js'
import {Swl} from './lib/sweetalert2.js'
import {Xhr} from './lib/xhr.js'

let inputFile = document.querySelector('#file')
let btnUploadFile = document.querySelector('#btn-upload-file')
let extAcept = ['.jpg', '.png', '.jpeg'];
let form = document.querySelector('#form-add-payment')

btnUploadFile.addEventListener('click', () => {
    inputFile.click()
})
inputFile.addEventListener('change', () => {
    if(inputFile.files.length == 1){
        inputFile.classList.remove('error')
        let ext = inputFile.files[0].name.split('.').pop().toLowerCase()
        if(extAcept.includes('.'  + ext)){
            
        }else{
            Swl.fire({
                icon: 'error',
                title: 'Formato de archivo incorrecto',
                text: 'Selecionar .jpg, .png, .jpeg'
            })
        }
    }else{

    }
    
})
form.addEventListener('submit', (e) => {
    e.preventDefault()
    Xhr.send({
        url: 'set-payment',
        data: new FormData(form),
        error: (_r) =>{
            _r.forEach(element => {
                document.querySelector(element.id).classList.add('error')
            });
            Swl.fire({
                icon: 'error',
                title: 'Complete todo los campos'
            })
        },
        success: (_r) =>{
            Swl.fire({
                icon: 'success',
                title: ' reporte de pago agregado correctamente',
                success: () => {
                    location.href = 'invoice'
                }
            })
        } 
    })
})