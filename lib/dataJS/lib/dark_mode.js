document.querySelector('.dark-switch').addEventListener('click', function() {
    if(!this.classList.contains('active')){
        setCookie('true')
    }else{
        setCookie('false')
    }
})
function setCookie(valor) {
    document.cookie = 'YLCBoxesDarkMode=' + valor
}