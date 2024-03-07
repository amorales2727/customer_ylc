import './lib/dark_mode.js'
import './lib/utils.js'
import Tracking from  './class/tracking.js'

document.querySelectorAll('.btn-show-tracking').forEach(btn => {
    btn.addEventListener('click', function(){
        Tracking.showTracking(this)
    })
})