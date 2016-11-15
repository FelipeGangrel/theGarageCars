var locations = [
  ['', 'Rua 18B, 000, Vila Santa Cecília, Volta Redonda-RJ']
];

var base = $("[site-url]").val();
var iconbase = base+'img/icons/';
var geocoder;
var map;
var bounds = new google.maps.LatLngBounds();

function initialize() {
	
    map = new google.maps.Map(
    document.getElementById("mapa"), {
        disableDefaultUI: true,
   		draggable: false,
    	scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var styles =

    [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

    map.setOptions({styles: styles});

    geocoder = new google.maps.Geocoder();

    for (i = 0; i < locations.length; i++) {
        geocodeAddress(locations, i);
    }
}

google.maps.event.addDomListener(window, "load", initialize);

var markers = new Array();

function geocodeAddress(locations, i) {

    geocoder.geocode({
        'address': locations[i][1]
    },

    function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                icon: iconbase + 'pin.png',
                map: map,
                position: results[0].geometry.location,
                animation: google.maps.Animation.DROP
            });

            markers.push(marker);

            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);

            map.setOptions({zoom: 17});

        } else {
            console.log("geocode of " + address + " failed:" + status);
        }
    });


}