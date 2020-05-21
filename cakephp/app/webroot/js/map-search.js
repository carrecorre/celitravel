$(document).ready(function(){

    
    const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    let myMap = L.map('myMap');
    //myMap.doubleClickZoom.disable();
    
    L.tileLayer(tilesProvider, {
        maxZoom: 50,
    }).addTo(myMap);

    let iconMarker = L.icon({
      iconUrl: '../img/marker.png',
        iconSize: [40, 50],
        iconAnchor: [30, 60]
    })


    $.ajax({
        url: basePath + 'restaurants/restaurantJson',
        method: 'GET'
      }).then(function(data) {
          var restaurants = JSON.parse(data);
            var maxLat = 0;
            var maxLong = 0;
            var minLat = 0;
            var minLong = 0;
          for(let i in restaurants){
              var lat = restaurants[i]['Restaurant']['latitude'];
              var long = restaurants[i]['Restaurant']['longitude'];

              if(Math.abs(parseFloat(lat)) > Math.abs(maxLat)){ 
                maxLat = parseFloat(lat);
            }

              if(Math.abs(parseFloat(long)) > Math.abs(maxLong)){
                maxLong = parseFloat(long);
            }
              let marker = L.marker([lat, long], {icon: iconMarker}).addTo(myMap);         
          }
          
          myMap.setView([(maxLat), (maxLong)], 10 );
      });

        
  
    myMap.on('dblclick', e => {
        let position = myMap.mouseEventToLatLng(e.originalEvent);
    });
    
    
    });
    
    
    