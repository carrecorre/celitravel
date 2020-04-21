$(document).ready(function(){


const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let myMap = L.map('myMap');
myMap.doubleClickZoom.disable();


    let lat = $('#latitude').text();
    let long = $('#longitude').text();
    myMap.setView([40.4183083, -3.70275], 6);

    L.tileLayer(tilesProvider, {
        maxZoom: 50,
    }).addTo(myMap);



    var PeticionAjax  = (function(){

        var get = function(url, data){
            return $.ajax({
            type : "GET",
            encoding: "UTF-8",
            url: url,
            data: data
        });
    };
    
        var post = function(url, data){
            return $.ajax({
                type : "POST",
                encoding: "UTF-8",
                url: url,
                data: data
            });
        };
        return {
            get: function(url, data){
                return get(url, data);
            },
            post: function(url, data){
                return post(url, data);
            }
        }
    })();

    var updateMap = function(){
        myMap.on('dblclick', e => {
             
            
            PeticionAjax.get('').done(function(data){
                console.log($('img').filter('.leaflet-pane'));
                $('img').filter('.leaflet-zoom-animated').remove();
                let position = myMap.mouseEventToLatLng(e.originalEvent);
            let marker = L.marker([position.lat, position.lng]).addTo(myMap); 
            
                $('#RestaurantLatitude').val(position.lat);
                $('#RestaurantLongitude').val(position.lng);
            });
        });
        

    };

    return updateMap();

// navigator.geolocation.getCurrentPosition(
//     (pos) => {
//         const {coords} = pos
//         L.marker([coords.latitude, coords.longitude]).addTo(myMap)
//     },
//     (err) => {
//         console.log(err)
//     },
//     {
//         enableHighAccuracy:true,
//         timeout: 5000,
//         maximumAge:0
//     }
// )


});


