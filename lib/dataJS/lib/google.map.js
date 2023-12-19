export class GoogleMaps{
    static init(){
        document.addEventListener('DOMContentLoaded', function() {
    
            document.querySelectorAll('.google-maps').forEach(cont_map => {
                
                let initial = {
                    lat: (Boolean(cont_map.getAttribute('lat'))) ? parseFloat(cont_map.getAttribute('lat')) : 9.0817,
                    lng: (Boolean(cont_map.getAttribute('lng'))) ? parseFloat(cont_map.getAttribute('lng')) : -79.6179,
                    draggable: (Boolean(cont_map.getAttribute('draggable'))) ? true : false,
                    new_lat: cont_map.getAttribute('new-lat'),
                    new_lng: cont_map.getAttribute('new-lng'),
                }
                let map = new google.maps.Map(cont_map, {
                    center: initial, 
                    zoom: 20,
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                });
            
                var marker = new google.maps.Marker({
                    position: initial,
                    map: map,
                    draggable: initial.draggable
                });
            
                // Evento al soltar el marcador
                marker.addListener('dragend', function() {
                    var newPosition = marker.getPosition();
                    if(Boolean(initial.new_lat) && Boolean(initial.new_lng)) {
                        console.log(document.querySelector(initial.new_lng))
                        document.querySelector(initial.new_lat).value = newPosition.lat()
                        document.querySelector(initial.new_lng).value = newPosition.lng()
                    }
                });
            });
        });
    }
}