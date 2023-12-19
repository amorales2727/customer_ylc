const provincia = document.querySelector('#id_provincia');
const distrito  = document.querySelector('#id_distrito');
const corregimiento = document.querySelector('#id_corregimiento');

function actionOption(select, attr, value){
    select.value = ''
    Array.from(select.options).forEach((o, p) => {
        if(p != 0){
            if(o.getAttribute(attr) == value){
                o.removeAttribute('hidden')
            }else{
                o.setAttribute('hidden', 'true')
            }
        }
    })
}
provincia.addEventListener('change', function () {
    let value = provincia.value
    actionOption(distrito, 'data-provincia', value)
    actionOption(corregimiento, 'data-provincia', value)
})
distrito.addEventListener('change', function () {
    let value = distrito.value
    actionOption(corregimiento, 'data-distrito', value)
})