$(document).ready(function(){


const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let myMap = L.map('myMap');
myMap.doubleClickZoom.disable();

    let lat = $('#latitude').text();
    let long = $('#longitude').text();
    myMap.setView([lat, long], 13);

    L.tileLayer(tilesProvider, {
        maxZoom: 50,
    }).addTo(myMap);

    let iconMarker = L.icon({
        iconUrl: '../../img/marker.png',
        iconSize: [40, 50],
        iconAnchor: [30, 60]
    })

    let marker = L.marker([lat, long], {icon: iconMarker}).addTo(myMap);

    

myMap.on('dblclick', e => {
    let position = myMap.mouseEventToLatLng(e.originalEvent);
});


});


