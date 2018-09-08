// Building SVG Rendering
// Raphael tutorial: https://parall.ax/blog/view/2985/interactive-svg-map
// Converting SVG to Rapgael recognized format: http://readysetraphael.com/
var buildingID;

$( document ).ready(function() {
    buildingID = getURLParameter('id');
    buildFloor(1, buildingID);
    
    var button1 = document.getElementById('page_title');
    var address = document.getElementById('page_address');
    
    if(buildingID == 1){
	    
	    button1.innerHTML = "Building One";
	    address.innerHTML = "2333 Waukegan Rd.";
    }else if (buildingID == 2){
	    
	    button1.innerHTML = "Building Two";
	    address.innerHTML = "2345 Waukegan Rd.";
	    
    }else if (buildingID == 4){
	    
	    button1.innerHTML = "Building Four";
	    address.innerHTML = "2201 Waukegan Rd.";
	    
    }
    
    
});


function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}



// This section is responsible for controlling the building rendering and the svg lines we care about.
var rsr = Raphael('map', '556.86', '287.33');
var regions = [];

// Yellow line row 1
var yellow_row_1 = rsr.path("M 521.48 175.06 520.8 175.37 364.56 194.3 360.51 194.44 243.96 147.27 192.03 145.18 138.04 145.03 85.86 143.51 31.48 143.51 30.17 143.51 31.54 177.3 32.84 178.24 86.82 178.24 138.76 179.97 192.3 180.19 243.81 181.71 269.71 192.71 292.94 206.31 327.59 221.14 359.35 239.3 363.4 239.66 416.87 229.39 468.16 221.21 518.44 214.63 519.16 213.69 521.48 175.06 z");
yellow_row_1.attr({
    class: 'cls-7',
    'stroke-width': '1',
    'stroke-opacity': '0',
    'fill': ''
}).data({'id': 'row_1', 'region': 'region-1'});


// Yellow line row 2
var yellow_row_2 = rsr.path("M 523.85 135.14 365.75 149.15 361.79 149.15 244.17 112.84 191.72 111.49 137.43 111.49 84.87 109.23 30.08 108.78 28.77 108.78 30.17 143.51 31.54 143.51 85.95 143.51 138.04 145.03 191.94 145.18 243.96 147.27 360.51 194.38 364.49 194.25 520.83 175.34 521.48 175.06 523.85 135.14 z");
yellow_row_2.attr({
    class: 'cls-7',
    'stroke-width': '1',
    'stroke-opacity': '0',
    'fill': ''
}).data({'id': 'row_2', 'region': 'region-2'});


// Yellow line row 3
var yellow_row_3 = rsr.path("M 526.21 95.18 366.85 104.54 362.85 104.3 244.14 78.63 191.45 77.44 136.86 76.86 83.87 75.69 28.76 75.12 27.41 74.93 28.77 108.78 30.08 108.78 84.5 109.22 137.17 111.49 191.43 111.49 244.17 112.84 361.79 149.15 366.08 149.15 523.85 135.14 526.21 95.18 z");
yellow_row_3.attr({
    class: 'cls-7',
    'stroke-width': '1',
    'stroke-opacity': '0',
    'fill': ''
}).data({'id': 'row_3', 'region': 'region-3'});


regions.push(yellow_row_2);
regions.push(yellow_row_1);
regions.push(yellow_row_3);


for (var i = 0; i < regions.length; i++) {
    // Showing off
    regions[i].mouseover(function(e){
		    this.node.style.opacity = 0.5;
        this.node.style.fill = '#D8DF2C';
		      //document.getElementById('region-name').innerHTML = this.data('region');
	  });
    regions[i].mouseout(function(e){
  		this.node.style.opacity = 0;
  	});
    regions[i].click(function(e){
      buildFloor(this.id +1, buildingID );

      this.node.style.opacity = 0.5;
      this.node.style.fill = '#D8DF2C';

    });


}




