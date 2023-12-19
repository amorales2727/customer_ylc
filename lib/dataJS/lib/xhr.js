export class Xhr{
    static send(param = {}){
        const xhr = new XMLHttpRequest()
        xhr.responseType = 'json';
        param.method =  'POST';
        param.url    = 'fetch/' + param.url
        param.data   = (param.data) ?  param.data : '';
        xhr.open(param.method, param.url, true)
        xhr.onload = () =>  {
            if(xhr.status == 200){
                if (typeof param.success === 'function')
                    param.success(xhr.response)
            }else{
                if (typeof param.error === 'function')
                    param.error(xhr.response)
            }
        };
        xhr.send(param.data)
        if(typeof param.beforeSend === 'function'){
            param.beforeSend(xhr.readyState)
        }
    }
}
