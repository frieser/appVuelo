 $(document).ready(function(){
    var latlng = new google.maps.LatLng(39.481785, -6.369324);
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
 });

