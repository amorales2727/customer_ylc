import './lib/utils.js'
import Customers from './class/Customers.js'

const form = document.querySelector('form')

form.addEventListener('submit', e => {
    e.preventDefault()
    Customers.login(form)
})