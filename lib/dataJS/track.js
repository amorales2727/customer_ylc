import { Request } from "./class/Request.js";

import './lib/utils.js'

let num = document.querySelector('#num_tracking').value
document.querySelector('#showtrack').addEventListener('submit', e => {
    e.preventDefault();
    const xhr = new XMLHttpRequest()
    xhr.responseType = 'json';
    param.method = (param.method) ? param.method.toUpperCase() : 'POST';
    param.url    = 'fetch/' + param.url
    param.data   = (param.data) ?  param.data : '';
    xhr.open(param.method, param.url, true)
    xhr.onload = () =>  {
        console.log()
    };
    xhr.send(param.data)
    
})