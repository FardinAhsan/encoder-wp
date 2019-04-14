/* for goolge map */
function myMap() {
    var locationElement = document.getElementById("googleMap")
    var options = {
        center: new google.maps.LatLng(22.359295, 91.821864),
        zoom: 17,
        dragable: false,
        disableDefaultUI: true,
    };

    var map = new google.maps.Map(locationElement, options);

    function addMarker(props) {
        var marker = new google.maps.Marker({
            position: props.choords,
            map: map,
        });
        if(props.icon){
            marker.setIcon(props.icon);
        }
        if(props.content){
            var info = new google.maps.InfoWindow({
                content: props.content,
            })

            marker.addListener('mouseover', function () {
                info.open(map, marker)
            });
        }
    };

    var markers = [{
        choords: { lat: 22.359295, lng: 91.821864},
        icon: "",
        content: '<div><img src="../img/logo.png"></div>'
    }];

    var markersLength = markers.length;
    for (var i = 0; i < markersLength; i++) {
        addMarker(markers[i]);
    }
}
/*goolge map end*/