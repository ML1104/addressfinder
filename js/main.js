var map;
var markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8
    })

    var geocoder = new google.maps.Geocoder();

    document.getElementById('country').addEventListener('input', function() {
        geocodeAddress(geocoder, map);
    })

    document.getElementById('city').addEventListener('input', function() {
        geocodeAddress(geocoder, map);
    })

    document.getElementById('street').addEventListener('input', function() {
        geocodeAddress(geocoder, map);
    })
}

function geocodeAddress(geocoder, resultsMap) {
    var country = document.getElementById('country').value;
    var city = document.getElementById('city').value;
    var street = document.getElementById('street').value;
    var submit = document.getElementById('addUserButton');

    var address = street + city + country;

    geocoder.geocode({ 'address': address }, function (results, status) {
        if (status === 'OK') {
            setMapOnAll(null);
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
            markers.push(marker);
            
            submit.disabled = false;
            submit.style.backgroundColor = "#31b7ea";

        } else {
            submit.disabled = true;
            submit.style.backgroundColor = "red";
            
        }
    })
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }