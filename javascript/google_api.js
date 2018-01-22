
/******* Google API *******/

function geocodeAddress(geocoder, resultsMap, address, link_info, user) {
  var address = address;
  var user = user;
  var link_info = link_info;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      resultsMap.setCenter(results[0].geometry.location);
      if (user) {
        icon_value = '';
      } else {
        icon_value = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
      }
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        icon: icon_value
      });
      var infowindow = new google.maps.InfoWindow({
        content: link_info
      });

      marker.addListener('click', function() {
        infowindow.open(resultsMap, marker);
      });
    }
  });
}
