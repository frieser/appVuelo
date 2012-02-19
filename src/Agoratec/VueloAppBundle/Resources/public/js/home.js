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
		style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
		position: google.maps.ControlPosition.BOTTOM_CENTER
	    },
	    panControl: true,
	    panControlOptions: {
		position: google.maps.ControlPosition.TOP_RIGHT
	    },
	    zoomControl: false,
	    streetViewControl: false,
	  };
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);

 if(navigator.geolocation) {
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      map.setCenter(initialLocation);
	var url="http://192.168.1.15/kml.php?lat=";
	alert(position.coords.latitude);
	alert(position.coords.longitude);
	url+=position.coords.latitude;
	url+="&lng=";
	url+=position.coords.longitude;
	alert(url);
	
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




var ctaLayer = new google.maps.KmlLayer("http://dl.dropbox.com/u/150677/test.kml");
	ctaLayer.setMap(map);


	var homeControlDiv = document.createElement('DIV');
  var homeControl = new HomeControl(homeControlDiv, map);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(homeControlDiv);
 });

function HomeControl(controlDiv, map) {

  // Set CSS styles for the DIV containing the control
  // Setting padding to 5 px will offset the control
  // from the edge of the map
  controlDiv.style.padding = '5px';

  // Set CSS for the control border
  var controlUI = document.createElement('DIV');
  controlUI.style.backgroundColor = 'white';
  controlUI.style.borderStyle = 'solid';
  controlUI.style.borderWidth = '1px';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to set the map to Cáceres';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior
  var controlText = document.createElement('DIV');
  controlText.style.fontFamily = 'Arial,sans-serif';
  controlText.style.fontSize = '14px';
  controlText.style.paddingLeft = '8px';
  controlText.style.paddingRight = '8px';
  controlText.innerHTML = 'Localizate';
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to Chicago
  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.setCenter(caceres);
	marker.setMap(map);
	infowindow.open(map,marker);
  });
}

