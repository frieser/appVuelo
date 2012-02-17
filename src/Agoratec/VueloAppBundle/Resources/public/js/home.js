var map;
var marker;
var infowindow;
var caceres = new google.maps.LatLng(39.481785, -6.369324);

$(document).ready(function(){
    var latlng = caceres;
	var myOptions = {
	    zoom: 8,
	    center: caceres,
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
	    zoomControl: true,
	    zoomControlOptions: {
		style: google.maps.ZoomControlStyle.LARGE,
		position: google.maps.ControlPosition.LEFT_CENTER
	    },
	    streetViewControl: true,
	    streetViewControlOptions: {
		position: google.maps.ControlPosition.LEFT_TOP
	    }
	  };
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);

var ctaLayer = new google.maps.KmlLayer('http://dl.dropbox.com/u/150677/test.kml');
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

