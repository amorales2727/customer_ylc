import { Xhr } from './xhr.js'
export class Yappy{
    static sendPayment(form){
        Xhr.send({
            url: 'payments-yappy',
            data: new FormData(form)
        })
    }
}