export class Swl{
    static fire(val = {}){
        var Param = {'icon': '', 'timer': 2500, allowOutsideClick: false, showConfirmButton: false}
      
        Object.keys(val).forEach((element)=> {
           var key    = element
           var value  = val[element]
           Param[key] = value
        });
        
        Swal.fire(Param).then((result) =>{
            
            if (typeof Param.success === 'function')
                Param.success(result)
        })
    }
    static toast(val = {}){
        var Param = {toast: true, position: "top-end", timerProgressBar: true,  allowOutsideClick: false, showConfirmButton: false}

        Object.keys(val).forEach((element)=> {
            var key    = element
            var value  = val[element]
            Param[key] = value
        });

        this.fire(Param)
    }
    static consul(params = {}){
        let p = {
            icon: 'warning',
            timer: 0,
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'SI',
            cancelButtonText: 'NO',
        }
        Object.keys(params).forEach( e => {
            p[e] = params[e]
        })
        this.fire(p);
    }
    static input(params = {}){
        let p = {
            timer: 0,
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Crear',
            cancelButtonText: 'Cancelar',
            input: "text",

        }
        Object.keys(params).forEach( e => {
            p[e] = params[e]
        })
        this.fire(p);
    }
}