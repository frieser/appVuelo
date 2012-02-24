var map;
var marker;
var infowindow;
var caceres = new google.maps.LatLng(39.481785, -6.369324);
var browserSupportFlag =  new Boolean();
var initialLocation;

$(document).ready(function(){
	$('.dropdown-toggle').dropdown()


    var latlng = caceres;
	var myOptions = {
	    zoom: 8,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
	    panControl: true,
	    panControlOptions: {
		position: google.maps.ControlPosition.TOP_RIGHT
	    },
	     zoomControl: true,
	  zoomControlOptions: {
	    style: google.maps.ZoomControlStyle.SMALL,
		position: google.maps.ControlPosition.TOP_RIGHT
	  },
	    streetViewControl: false,
	  };
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);

 if(navigator.geolocation) {
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      map.setCenter(initialLocation);
	
	var url="http://192.168.1.14/app_dev.php/home/kml/";
	url+=position.coords.latitude;
	url+="&";
	url+=position.coords.longitude;
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	
    }, function() {
      handleNoGeolocation(browserSupportFlag);
    });
  // Try Google Gears Geolocation
  } else if (google.gears) {
    browserSupportFlag = true;
    var geo = google.gears.factory.create('beta.geolocation');
    geo.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
      map.setCenter(initialLocation);
    }, function() {
      handleNoGeoLocation(browserSupportFlag);
    });
  // Browser doesn't support Geolocation
  } else {
    browserSupportFlag = false;
    handleNoGeolocation(browserSupportFlag);
  }
  
  function handleNoGeolocation(errorFlag) {
    if (errorFlag == true) {
      alert("Geolocation service failed.");
      initialLocation = newyork;
    } else {
      alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
      initialLocation = siberia;
    }
    map.setCenter(initialLocation);
  }


var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
	

  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	kml=xmlhttp.responseText.toString();
	alert(xmlhttp.responseText);
    }
  }


$(".navbar .nav li.localizate a").click(function() {

		 var marker = new google.maps.Marker({
	      position: initialLocation,
	      title:"Tu posicion"
	  });
  

  map.setCenter(initialLocation);
	marker.setMap(map);
	infowindow.open(map,marker);
});

var ctaLayer = new google.maps.KmlLayer("http://dl.dropbox.com/u/150677/test2.kml");
	ctaLayer.setMap(map);


	var homeControlDiv = document.createElement('DIV');
  var homeControl = new HomeControl(homeControlDiv, map);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(homeControlDiv);
 });



