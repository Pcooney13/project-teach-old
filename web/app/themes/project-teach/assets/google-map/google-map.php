<script>
  function initMap() {

    var mapLink = document.getElementById('map-link');
    console.log(mapLink.href);

    latRegex = /\@(......\d+)/i;
    // var lat = latRegex.exec(mapLink.href);

    var lat = mapLink.href.match(latRegex);
    // var lat = latRegex.exec(mapLink.href);

    longRegex = /\,(......\d+)/i;
    var long = mapLink.href.match(longRegex);
    // var lat = latRegex.exec(mapLink.href);

    var passLong = long[0].substring(1);
    var passLat = lat[0].substring(1);


    longNumber = parseFloat(passLong);
    latNumber = parseFloat(passLat);

    console.log('lat: '+passLat);
    console.log('long: '+passLong);

    var uluru = {lat: latNumber, lng: longNumber};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: uluru,
      mapTypeId: 'roadmap'
    });
    var markerNew = new google.maps.Marker({
    	position: uluru,
    	map: map,
    	  icon: {
          url: '<?php bloginfo('template_directory'); ?>/assets/images/ed_images/marker.png',
          size: new google.maps.Size(50, 50),
          scaledSize: new google.maps.Size(50, 50),
        } 
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2L-vq0dV2Za6m_FxxIxL8Npiy185INes&callback=initMap"></script>