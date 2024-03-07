import {Request} from './Request.js'
import {Swl} from './sweetalert2.js'

class Tracking{
    
    constructor(){
        this.contenModaltrack = this.contenModaltrack()
    }

    static  listTrackig(PKG){
        const Track = new Tracking()
        let data = Request.setForm({
            id: PKG
        })
        Request.xhr({
            url: 'get-list-tracking',
            data: data,
            beforeSend: () => {
                Track.modalListContentLoader();
                Track.showModal()
            },
            success: (_r) => {
                Track.modalHiden();
                Track.showModalTrackingList(_r)
            }
        })
    }
    modalHiden(){
        $('#modalTrack').modal('hide')
        $('#modalTrack').remove()
    }
    showModal(){
        document.querySelector('body').appendChild(this.contenModaltrack)
        $('#modalTrack').modal('show')
    }
    showModalTrackingList(items){
        this.modalTrackingList(items)
        this.showModal()
    }
    modalTrackingList(items){
        let Item = '';
        items.forEach(i => {
            Item += 
                `<div class="tracking-modal">
                    <div class="icon">
                        <img src="${i.logo}" >
                    </div>
                    <div class="content">
                        <a href="#" class="show-data-tack">${i.tracking}</a>
                    </div>
                </div>`
            ;
        })
        let modal =
        `<div class="modal fade" tabindex="-1" id="modalTrack">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        ${Item}
                    </div>
                </div>
            </div>
        </div>`
        this.contenModaltrack.innerHTML = modal
        this.contenModaltrack.querySelectorAll('.show-data-tack').forEach(a => {
            this.showDataTracking(a)
        })
    }
    showDataTracking(a){
        a.addEventListener('click', e => {
            e.preventDefault();
        })
    }
    modalListContentLoader(){
        
        let loaderItem = '';
        for (let i = 1; i <= 5; i++) {
            loaderItem += 
                `<div class="tracking-modal ld">
                    <div class="icon"></div>
                    <div class="content"></div>
                </div>`
            ;
        }
        let modal =
            `<div class="modal fade" tabindex="-1" id="modalTrack">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            ${loaderItem}
                        </div>
                    </div>
                </div>
            </div>`
        this.contenModaltrack.innerHTML = modal
    }
    contenModaltrack(){
        let content = document.createElement('div')
        content.id = 'modal-track-content'
        return content;
    }
    static showTracking(btn){
        let pkgs = ''
        btn.children.forEach(el => {
            pkgs += `
                <tr>
                    <td>
                        <img style="width: 90px;" src="${el.getAttribute('data-logo-logo-courier')}" >
                    </td>
                    <td>
                        <a href="https://t.17track.net/es#nums=${el.getAttribute('data-tracking')}" target="_blank" class="show-data-tack"><strong> ${el.getAttribute('data-tracking')}</strong></a>
                    </td>
                </tr>`
        })
        Swl.fire({
            html: `<table> ${pkgs}</table>`,
            timer: 0,
            allowOutsideClick: true,
            showCloseButton: true,
        })
    }
    static setMatch(data){
        Request.xhr({
            url: 'match-packages-prealert',
            data: Request.setForm(data),
            beforeSend: () => {
                Utilis.showLoader()
            },
            success: () =>{
                Utilis.hideLoader(() => {
                    Swl.fire({
                        icon: 'success',
                        title: 'Match successfully',
                        success: () => {
                            location.reload();
                        }
                    })
                })
            }
        })
    }
}
export default Tracking