import './intl-tel/intl-tel-input.js'
document.addEventListener('DOMContentLoaded', function() {
    $('#loader').fadeOut();
});
document.querySelectorAll('input').forEach(el => {
    el.error = () =>{
        el.classList.add('error');
    }
    el.addEventListener('keyup', () =>{
        el.classList.remove('error');
    })
    if(el.classList.contains('input-phone')){
        el.addEventListener('keypress', e => {
            let ExpRegSoloNumeros = /^[0-9+-]+$/
            if (!e.key.match(ExpRegSoloNumeros)) {
                e.preventDefault();
            }
        })
        var iti = intlTelInput(el, {
            utilsScript: "lib/dataJS/lib/intl-tel/utils.js",
        });
        el.addEventListener('blur', () => {
            el.value = iti.getNumber()
        })
    }
    if(el.classList.contains('input-currency')){
        el.addEventListener('keypress', e => {
            let ExpReg = /^[0-9.,]+$/;
            if (!e.key.match(ExpReg)) {
                e.preventDefault();
            }
        })
        el.addEventListener('keyup', function() {
            
        })
    }
})
document.querySelectorAll('select').forEach(el => {
    el.error = () =>{
        el.classList.add('error');
    }
    el.addEventListener('change', () =>{
        el.classList.remove('error');
    })
})