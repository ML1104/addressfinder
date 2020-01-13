var map;

// Contains all markers to be erased later
var markers = [];

var userName = document.getElementById('name');
var userSurname = document.getElementById('lastname');

var submit = document.getElementById('addUserButton');

// Checks for valid inputs onclick form submission button

submit.addEventListener('click', function () {
    if (userName.value == "" || userName.value == null) {
        userName.classList.add('invalid');

    } else {
        userName.classList.remove('invalid');
    }
    
    if (userSurname.value == "" || userSurname.value == null) {
        userSurname.classList.add('invalid');

    } else {
        userSurname.classList.remove('invalid');
    }
})

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8
    })

    var geocoder = new google.maps.Geocoder();

    document.getElementById('country').addEventListener('input', function () {
        geocodeAddress(geocoder, map);
    })

    document.getElementById('city').addEventListener('input', function () {
        geocodeAddress(geocoder, map);
    })

    document.getElementById('street').addEventListener('input', function () {
        geocodeAddress(geocoder, map);
    })
}

function geocodeAddress(geocoder, resultsMap) {
    var country = document.getElementById('country').value;
    var city = document.getElementById('city').value;
    var street = document.getElementById('street').value;
    var button = document.getElementById('addUserButton');

    var address = street + city + country;

    geocoder.geocode({ 'address': address }, function (results, status) {
        if (status === 'OK') {
            
            // Deletes old markers from array when placing new ones to prevent duplicates
            setMapOnAll(null);

            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });

            // Adds marker to marker array
            markers.push(marker);

            button.disabled = false;
            button.style.backgroundColor = "#31b7ea";
            button.innerHTML = "<div>Add User</div>"

        } else {
            button.disabled = true;
            button.style.backgroundColor = "red";
            button.innerHTML = "<div>Invalid Location</div>"

        }
    })
}

// Selects all markers on Map

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}