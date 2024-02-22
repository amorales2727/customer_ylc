export class Request{
    static xhr(param = {}){
        if(param.url){
            const xhr = new XMLHttpRequest()
            xhr.responseType = 'json';
            param.method = (param.method) ? param.method.toUpperCase() : 'POST';
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
        }else{
            console.warn('url empty')
        }
    }
    static setForm(params = {}){
        let formData = new FormData();
        Object.keys(params).forEach(key => {
            formData.append(key, params[key]);
        })
        return formData
    }
    
}