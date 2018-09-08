// https://developers.google.com/places/supported_types
var map;
var map2;
var service;
var infowindow;
var gmarkers = [];
var display_main_icon = true; // Helper flag so we can display the RNP location.
var markersArray = [];



var icon_bannockburn = new google.maps.MarkerImage(
	'http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/bannockburn-mappin-home.png', 
	null);
var icon_blue = new google.maps.MarkerImage(
	'http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/bannockburn-mappin-blue.png', 
	null);
var icon_green = new google.maps.MarkerImage(
	'http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/bannockburn-mappin-green.png', 
	null);
var icon_brightgreen = new google.maps.MarkerImage(
	'http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/bannockburn-mappin-brightgreen.png', 
	null);
var icon_yellow = new google.maps.MarkerImage(
	'http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/bannockburn-mappin-yellow.png', 
	null);

var center_point = new google.maps.LatLng(42.193390, -87.855345);

google.maps.event.addDomListener(window, 'load', initialize);

var request_restaurants = {
    location: center_point,
    radius: 2400,
		keyword: 'food'
};

var request_health = {
    location: center_point,
    radius: 2400,
		keyword: 'gym'
};

var request_hotels = {
    location: center_point,
    radius: 10000,
		keyword: 'lodging'
};

var request_entertainment = {
    location: center_point,
    radius: 10000,
		keyword: '(theater) OR (museum)'
};

function setMain(){
	var marker = new google.maps.Marker({
      map: map,
      icon: icon_bannockburn,
      zIndex: google.maps.Marker.MAX_ZINDEX + 1,
      position: center_point
  });
  
	infowindow = new google.maps.InfoWindow();
	
	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.setContent("2201 Waukegan Rd Bannockburn, IL 60015");
	  infowindow.open(map, this);
	});
}



// Toggle one of the groups
function toggleGroup(type) {
	
	
var button1 = document.getElementById('maps-all');
var button2 = document.getElementById('maps-restaurants');
var button3 = document.getElementById('maps-health');
var button4 = document.getElementById('maps-hotels');
var button5 = document.getElementById('maps-entertainment');


    if (type !== "all") {


       if (type === "restaurants") {

            clearOverlays();

            button2.classList.add('restaurantsButtonOn');
            
            
            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request_restaurants, callback_restaurants);
            
            setMain();
            
            
        } else if (type == "health") {

            clearOverlays();

            button3.classList.add('healthButtonOn');
            
            
            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request_health, callback_health);
           
            setMain();
            
        } else if (type == "hotels") {

            clearOverlays();

            button4.classList.add('hotelsButtonOn');

						
            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request_hotels, callback_hotels);
						
						setMain();
            
        } else if (type == "entertainment") {

            clearOverlays();

            button5.classList.add('entertainmentButtonOn');

						
            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request_entertainment, callback_entertainment);
						
						setMain();
            
        } 

    } else {
        clearOverlays();

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request_restaurants, callback_restaurants);

        service2 = new google.maps.places.PlacesService(map);
        service2.nearbySearch(request_hotels, callback_hotels);

        service3 = new google.maps.places.PlacesService(map);
        service3.nearbySearch(request_health, callback_health);
        
        service4 = new google.maps.places.PlacesService(map);
        service4.nearbySearch(request_entertainment, callback_entertainment);

        setMain();

            button1.classList.add('allButtonOn');
            button2.classList.remove('restaurantsButtonOn');
            button3.classList.remove('healthButtonOn');
            button4.classList.remove('hotelsButtonOn');
            button4.classList.remove('entertainmentButtonOn');

    }
}


function initialize() {
	
    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: center_point,
        zoom: 13,
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
        scaleControl: true
    });

    
    var transitLayer = new google.maps.TransitLayer();
    transitLayer.setMap(map);

    infowindow = new google.maps.InfoWindow();

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request_restaurants, callback_restaurants);

    var service_health = new google.maps.places.PlacesService(map);
    service_health.nearbySearch(request_health, callback_health);

    var service_hotels = new google.maps.places.PlacesService(map);
    service_hotels.nearbySearch(request_hotels, callback_hotels);
    
    var service_entertainment = new google.maps.places.PlacesService(map);
    service_entertainment.nearbySearch(request_entertainment, callback_entertainment);




    var marker = new google.maps.Marker({
        map: map,
        icon: icon_bannockburn,
        animation: google.maps.Animation.DROP,
        zIndex: google.maps.Marker.MAX_ZINDEX + 1,
        position: new google.maps.LatLng(42.193390, -87.855345)
    });


    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent("Bannockburn, IL 60015");
        infowindow.open(map, this);
    });
    
    
    map.set('styles', [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f5f5"
            }
          ]
        },
        {
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#f5f5f5"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#bdbdbd"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#eeeeee"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e5e5e5"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dadada"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e5e5e5"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#eeeeee"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#c9c9c9"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        }
      ])


		

}



// Callback responses from google maps.
// Once the status of a pin is OK, we create markers of each type.
function callback_restaurants(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createRestaurantsMarker(results[i]);

        }
    }
}


function callback_health(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createHealthMarker(results[i]);

        }
    }
}



function callback_hotels(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createHotelsMarker(results[i]);

        }
    }
}

function callback_entertainment(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createEntertainmentMarker(results[i]);

        }
    }
}


// CREATE MARKERS FROM GOOGLE CALLBACKS
function createRestaurantsMarker(place) {

    if (place !== null || place.types[0] !== undefined || place !== undefined) {
			
        if (
        	place.types[0] == "food" || 
        	place.types[1] == "food" || 
        	place.types[2] == "food" || 
        	place.types[0] == "restaurant" || 
        	place.types[1] == "restaurant" ||
					place.types[2] == "restaurant" ||
        	place.types[0] == "cafe" || 
        	place.types[1] == "cafe" ||
        	place.types[2] == "cafe" || 
        	place.types[0] == "bar" || 
        	place.types[1] == "bar" || 
        	place.types[2] == "bar") {


            var marker = new google.maps.Marker({
                map: map,
                icon: icon_blue,
                position: place.geometry.location
            });

            var request = {
                reference: place.reference
            };
            markersArray.push(marker);
            google.maps.event.addListener(marker, 'click', function() {
                service.getDetails(request, function(place, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        var contentStr = '<h5>' + place.name + '</h5><p>' + place.formatted_address;
                        if (!!place.formatted_phone_number) contentStr += '<br>' + place.formatted_phone_number;
                        if (!!place.website) contentStr += '<br><a target="_blank" href="' + place.website + '">' + place.website + '</a>';
                        infowindow.setContent(contentStr);
                        infowindow.open(map, marker);
                    } else {
                        var contentStr = "<h5>No Result, status=" + status + "</h5>";
                        infowindow.setContent(contentStr);
                        infowindow.open(map, marker);
                    }
                });
            });


        }
    }
}


function createHealthMarker(place) {

  if (place !== null || place.types[0] !== undefined || place !== undefined) {
    
    if (
    	place.types[0] == "health" || 
			place.types[1] == "health" || 
			place.types[2] == "health" || 
			place.types[3] == "health" || 
			place.types[0] == "gym" || 
			place.types[1] == "gym" || 
			place.types[2] == "gym" || 
			place.types[3] == "gym" || 
			place.types[0] == "bicycle_store" || 
			place.types[1] == "bicycle_store" || 
			place.types[2] == "bicycle_store" || 
			place.types[3] == "bicycle_store"|| 
			place.types[0] == "spa" || 
			place.types[1] == "spa" || 
			place.types[2] == "spa" || 
			place.types[3] == "spa"
    ) {

	    var marker = new google.maps.Marker({
	        map: map,
	        icon: icon_green,
	        position: place.geometry.location
	    });
	
	    var request = {
	        reference: place.reference
	    };
    
			markersArray.push(marker);
    
			google.maps.event.addListener(marker, 'click', function() {
	    
	      service.getDetails(request, function(place, status) {
	        
	        if (status == google.maps.places.PlacesServiceStatus.OK) {
		        
	          var contentStr = '<h5>' + place.name + '</h5><p>' + place.formatted_address;
	          if (!!place.formatted_phone_number) contentStr += '<br>' + place.formatted_phone_number;
	          if (!!place.website) contentStr += '<br><a target="_blank" href="' + place.website + '">' + place.website + '</a>';
	          infowindow.setContent(contentStr);
	          infowindow.open(map, marker);
	          
	        } else {
		        
	            var contentStr = "<h5>No Result, status=" + status + "</h5>";
	            infowindow.setContent(contentStr);
	            infowindow.open(map, marker);
	            
	        }
	      });
    	});
		}
	}
}

function createHotelsMarker(place) {
	if (place !== null || place.types[0] !== undefined || place !== undefined) {
		if (
			place.types[0] == "lodging" || 
			place.types[1] == "lodging" ||
			place.types[2] == "lodging" 
		) {
			
      var marker = new google.maps.Marker({
          map: map,
          icon: icon_brightgreen,
          position: place.geometry.location
      });

      var request = {
          reference: place.reference
      };
      
      markersArray.push(marker);
      
      google.maps.event.addListener(marker, 'click', function() {
	      
        service.getDetails(request, function(place, status) {
          
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            
            var contentStr = '<h5>' + place.name + '</h5><p>' + place.formatted_address;
            if (!!place.formatted_phone_number) contentStr += '<br>' + place.formatted_phone_number;
            if (!!place.website) contentStr += '<br><a target="_blank" href="' + place.website + '">' + place.website + '</a>';
            infowindow.setContent(contentStr);
            infowindow.open(map, marker);
              
          } else {
            
            var contentStr = "<h5>No Result, status=" + status + "</h5>";
            infowindow.setContent(contentStr);
            infowindow.open(map, marker);
            
          }
      	});
  		});
		}
	}
}

function createEntertainmentMarker(place) {

  if (place !== null || place.types[0] !== undefined || place !== undefined) {
    
    if (
	  	place.types["0"] == "aquarium" || 
      place.types["1"] == "aquarium" ||
      place.types["2"] == "aquarium" ||
			place.types["3"] == "aquarium" || 
      place.types["4"] == "aquarium" ||
      place.types["5"] == "aquarium" ||
      place.types["6"] == "aquarium" ||
      place.types["7"] == "aquarium" ||
			place.types["8"] == "aquarium" || 
      place.types["9"] == "aquarium" ||
      place.types["0"] == "amusement_park" || 
      place.types["1"] == "amusement_park" ||
      place.types["3"] == "amusement_park" || 
      place.types["4"] == "amusement_park" ||
      place.types["5"] == "amusement_park" || 
      place.types["6"] == "amusement_park" ||
      place.types["7"] == "amusement_park" || 
      place.types["8"] == "amusement_park" ||
      place.types["9"] == "amusement_park" ||
      place.types["0"] == "art_gallery" || 
      place.types["1"] == "art_gallery" ||
      place.types["2"] == "art_gallery" || 
      place.types["3"] == "art_gallery" ||
      place.types["4"] == "art_gallery" || 
      place.types["5"] == "art_gallery" ||
      place.types["6"] == "art_gallery" || 
      place.types["7"] == "art_gallery" ||
      place.types["8"] == "art_gallery" || 
      place.types["9"] == "art_gallery" ||
      place.types["0"] == "bowling_alley" || 
      place.types["1"] == "bowling_alley" ||
      place.types["2"] == "bowling_alley" || 
      place.types["3"] == "bowling_alley" ||
      place.types["4"] == "bowling_alley" || 
      place.types["5"] == "bowling_alley" ||
      place.types["6"] == "bowling_alley" || 
      place.types["7"] == "bowling_alley" ||
      place.types["8"] == "bowling_alley" || 
      place.types["9"] == "bowling_alley" ||
      place.types["0"] == "casino" || 
      place.types["1"] == "casino" ||
      place.types["2"] == "casino" || 
      place.types["3"] == "casino" ||
      place.types["4"] == "casino" || 
      place.types["5"] == "casino" ||
      place.types["6"] == "casino" || 
      place.types["7"] == "casino" ||
      place.types["8"] == "casino" || 
      place.types["9"] == "casino" ||
      place.types["0"] == "zoo" || 
      place.types["1"] == "zoo" ||
      place.types["2"] == "zoo" || 
      place.types["3"] == "zoo" ||
      place.types["4"] == "zoo" || 
      place.types["5"] == "zoo" ||
      place.types["6"] == "zoo" || 
      place.types["7"] == "zoo" ||
      place.types["8"] == "zoo" || 
      place.types["9"] == "zoo" ||
      place.types["0"] == "movie_theater" || 
      place.types["1"] == "movie_theater" ||
      place.types["2"] == "movie_theater" || 
      place.types["3"] == "movie_theater" ||
      place.types["4"] == "movie_theater" || 
      place.types["5"] == "movie_theater" ||
      place.types["6"] == "movie_theater" || 
      place.types["7"] == "movie_theater" ||
      place.types["8"] == "movie_theater" || 
      place.types["9"] == "movie_theater" ||
      place.types["0"] == "museum" || 
      place.types["1"] == "museum" ||
      place.types["2"] == "museum" || 
      place.types["3"] == "museum" ||
      place.types["4"] == "museum" || 
      place.types["5"] == "museum" ||
      place.types["6"] == "museum" || 
      place.types["7"] == "museum" ||
      place.types["8"] == "museum" || 
      place.types["9"] == "museum" ||
      place.types["0"] == "night_club" || 
      place.types["1"] == "night_club" ||
      place.types["2"] == "night_club" || 
      place.types["3"] == "night_club" ||
      place.types["4"] == "night_club" || 
      place.types["5"] == "night_club" ||
      place.types["6"] == "night_club" || 
      place.types["7"] == "night_club" ||
      place.types["8"] == "night_club" || 
      place.types["9"] == "night_club" ||
      place.types["0"] == "park" || 
      place.types["1"] == "park" || 
      place.types["2"] == "park" || 
      place.types["3"] == "park" || 
      place.types["4"] == "park" || 
      place.types["5"] == "park" || 
      place.types["6"] == "park" || 
      place.types["7"] == "park" || 
      place.types["8"] == "park" || 
      place.types["9"] == "park"
    ) {

	     var marker = new google.maps.Marker({
          map: map,
          icon: icon_yellow,
          position: place.geometry.location
      });

      var request = {
          reference: place.reference
      };
      
      markersArray.push(marker);
      
      google.maps.event.addListener(marker, 'click', function() {
	      
        service.getDetails(request, function(place, status) {
          
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            
            var contentStr = '<h5>' + place.name + '</h5><p>' + place.formatted_address;
            if (!!place.formatted_phone_number) contentStr += '<br>' + place.formatted_phone_number;
            if (!!place.website) contentStr += '<br><a target="_blank" href="' + place.website + '">' + place.website + '</a>';
            infowindow.setContent(contentStr);
            infowindow.open(map, marker);
              
          } else {
            
            var contentStr = "<h5>No Result, status=" + status + "</h5>";
            infowindow.setContent(contentStr);
            infowindow.open(map, marker);
            
          }
      	});
  		});
		}
	}
}


function clearOverlays() {
	
  for (var i = 0; i < markersArray.length; i++) {
      markersArray[i].setMap(null);
  }
  
  markersArray.length = 0;
}
