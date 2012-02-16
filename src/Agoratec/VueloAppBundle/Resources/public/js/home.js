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

 marker = new google.maps.Marker({
      position: caceres,
      title:"Su posicion!"
  });

	var flightPlanCoordinates = [
    new google.maps.LatLng(38.899583, -6.984558),
    new google.maps.LatLng(39.476486, -6.391296),
    new google.maps.LatLng(39.991851, -4.817505),
    new google.maps.LatLng(40.027614, -6.083679)
  ];
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
	map: map,
    strokeColor: "#FF0000",
    strokeOpacity: 0.5,
    strokeWeight: 10
  }); 

	var triangleCoords = [
    new google.maps.LatLng(39.713525, -6.534119),
    new google.maps.LatLng(39.726201, -6.880188),
    new google.maps.LatLng(39.234381, -7.003784),
    new google.maps.LatLng(39.438314, -6.583557)
  ];

bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: "#000000",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#0000FF",
    fillOpacity: 0.35
  });

infowindow = new google.maps.InfoWindow({
    content: "Usted esta aqui!"
});

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});

 bermudaTriangle.setMap(map);
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

