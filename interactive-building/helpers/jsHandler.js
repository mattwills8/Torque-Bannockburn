// This hamdler is build to manage clicks on the 
// property image. It will fire up AJAX call
// so we don't reload the website.
// And fire up appropriate php code so we get appropriate data from the Database.

//--------------------------------------------------------------
 // Floor AJAX HANDLER
  //--------------------------------------------------------------

var selectedFloor = 1; // this keeps the number of a selected floor
var theFloor = 1;
var availability = '1';// All/ Available
var tierSelected = false;






// select certain floor sizes through the dropdown. This function will connect with the database
// and return all floors that match the criteria.
function SelectedValue(sel) {


    var value = sel.options[sel.selectedIndex].value;     


	var el = document.getElementById('apartmentList');
	    while ( el.firstChild ) el.removeChild( el.firstChild ); 


    if(value == 'tier1'){
	    
	    updateSelections('tier1');
	    var str = '<div class="result-div"><div class="w-row">' +
	'<div class="w-col w-col-3 unit-number"><div class="apt-detail-sqfeet"><!--<span class ="text1">Download Floorplans</span><br>-->' +
	'<a download href="/cww_interactive_building/assets/uploads/all_pdfs/10-30k.pdf"><img class="pdf-download" /><span class="text3">Download Floor Plan</span></a></div></div>';
	jQuery( "#apartmentList" ).append(str);
	tierSelected = true;
	    
	    
	    
    }else if (value == 'tier2'){
	    
	    updateSelections('tier2');
	    var str = '<div class="result-div"><div class="w-row">' +
	'<div class="w-col w-col-3 unit-number"><div class="apt-detail-sqfeet"><!--<span class ="text1">Download Floorplan</span><br>-->' +
	'<a download href="/cww_interactive_building/assets/uploads/all_pdfs/60-120k.pdf"><img class="pdf-download" /><span class="text3">Download Floor Plan</span></a></div></div>';
	jQuery( "#apartmentList" ).append(str);
	tierSelected = true;
	    
	    
    }else if (value == 'tier3'){
	     
	     updateSelections('tier3');
	     var str = '<div class="result-div"><div class="w-row">' +
	'<div class="w-col w-col-3 unit-number"><div class="apt-detail-sqfeet"><!--<span class ="text1">Download Floorplan</span><br>-->' +
	'<a download href="/cww_interactive_building/assets/uploads/all_pdfs/120k+.pdf"><img class="pdf-download" /><span class="text3">Download Floor Plan</span></a></div></div>';
	jQuery( "#apartmentList" ).append(str);
	tierSelected = true;
	       
    }else if (value == 'retail'){
	     
	     updateSelections('retail');
	     tierSelected = true;
	       
    }else if (value == ''){
	    tierSelected = false;
	    if( jQuery( window ).width() <= 410){
			theFloor = 2;
			useToggle();
			preventDefaultToggle();			
		}
    }
    
    
   
}


// This function will be called after the value returns from the database.
// and its main task is to update appropriate lines on the building.
function updateSelections(val){
	
	jQuery('map area').each(function() {
				
		hData = jQuery(this).data('maphilight') || {}; // get
		hData.alwaysOn = false; // modify
		jQuery(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
        
    });

	
	if(val == 'tier1'){
			
		jQuery("map area[id=" + 5 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		buildFloorTiers(val);
		
		
	}else if(val == 'tier2'){
		
		jQuery("map area[id=" + 2 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 3 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 11 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 12 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		buildFloorTiers(val);
		
	}else if (val == 'tier3'){
		
		jQuery("map area[id=" + 7 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 8 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 9 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 10 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 11 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		jQuery("map area[id=" + 12 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		buildFloorTiers(val);

		
	}else if (val == 'retail'){
		
		jQuery("map area[id=" + 1 + "]").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
		buildFloorRetail(1);
		
	}
	
}


function deselectDropdown()
{    
    var element = document.getElementById('myid');
    element.value = "";
    
    
    
}



jQuery(function() {
		jQuery('#building600').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill: true });
	});


function buildFloor(floorName){
	
	onMouseOverFloor(floorName);
    //var container = jQuery('#load_content');
    var newhtml = '';
    theFloor = floorName;
    
    jQuery.ajax({
      url: '/cww_interactive_building/helpers/database.php',
      type: 'post',
      data: {'floorName': floorName},
      cache: false,
      success: function(str) {

       var el = document.getElementById('apartmentList');
	    while ( el.firstChild ) el.removeChild( el.firstChild ); 
	    
       jQuery( "#apartmentList" ).append( str);

      },
      error: function(xhr, desc, err) {
        console.log(xhr + "\n" + err);
      }
    }); // end ajax call
    
  //  updateFloorPlate();
}

function buildFloorRetail(floorName){
	
	onMouseOverFloor(floorName);
	theFloor = floorName;
	var el = document.getElementById('apartmentList');
	    while ( el.firstChild ) el.removeChild( el.firstChild ); 
	    
	var str = '<a href="http://www.dochalex.com/" target="_blank">Click here for Retail Information<a>';
	jQuery( "#apartmentList" ).append( str);
	
	
}

function preventDefaultToggle(){
	
			jQuery('#toggle-right').click(function(e) {
			// do something fancy
				return false; // prevent default click action from happening!
				e.preventDefault(); // same thing as above
		});

		jQuery('#toggle-left').click(function(e) {
			// do something fancy
			return false; // prevent default click action from happening!
			e.preventDefault(); // same thing as above
		});
}

function buildFloorTiers(tier){
	
	if(tier == "tier1"){
		
		onMouseOverFloor(21);
		theFloor = 21;
		
		var toggle = document.getElementById('toggle');
			toggle.innerHTML ='';
		
	}else if(tier == "tier2"){
		
		onMouseOverFloor(22);
		theFloor = 22;
		
		var toggle = document.getElementById('toggle');
			toggle.innerHTML ='';
		
	}else if(tier == "tier3"){
		
		onMouseOverFloor(23);
		theFloor = 23;
		
		var toggle = document.getElementById('toggle');
			toggle.innerHTML ='';
		
	}
	
}


		
window.onresize = function() {
		
		if( jQuery( window ).width() <= 500){
			
			useToggle();	
			preventDefaultToggle();
					
		}else if( jQuery(window).width() > 410 &&  jQuery(window).width() <= 640){
			
			useRendering_450();
			
		}else if( jQuery(window).width() > 640){
			
			useRendering_600();
			
		}

	}
	
	
	
	// Once the website loads, pick a correct image rendering to display
	jQuery(document).ready(function(e) {
		
		buildFloor(2);
		if( jQuery( window ).width() <= 500){
			
			useToggle();		
				
		}else if( jQuery(window).width() > 410 &&  jQuery(window).width() <= 640){
			
			useRendering_450();
			
		}else if( jQuery(window).width() > 640){
			
			useRendering_600();
			
		}
		
		
		jQuery('#toggle-right').click(function(e) {
			// do something fancy
				return false; // prevent default click action from happening!
				e.preventDefault(); // same thing as above
		});

		jQuery('#toggle-left').click(function(e) {
			// do something fancy
			return false; // prevent default click action from happening!
			e.preventDefault(); // same thing as above
		});
		
	
	});	
	
	// inject big building into a partent div
	function useRendering_250(){
		
			jQuery(".building250").remove();
			jQuery(".building450").remove();
			jQuery(".building600").remove();
			var toggle = document.getElementById('toggle');
			toggle.innerHTML ='';

		
			var building = document.createElement('div');
			building.className = 'building250';
			
			building.innerHTML = '<img name="nbuilding250" src="http://torquelaunchdev.com/cww_interactive_building/assets/renderings/building-250.png" width="250" height="246" border="0" id="nbuilding250" usemap="#m_building250" alt="" /><map name="m_building250" id="m_building250" onmouseout="updateNumber();">\
			<area shape="poly" id="12" coords="35,121,35,125,102,46,112,46,196,108,197,113,200,116,200,123,210,123,237,144,237,140,210,117,200,118,200,115,197,112,197,109,196,108,196,103,112,32,102,33" href="#" alt="" onclick="buildFloor(12);"  onmouseover="onMouseOverFloor(12);" />\
			<area shape="poly" id="11" coords="35,129,101,54,113,53,121,58,196,113,200,116,198,128,210,128,237,147,237,145,210,124,199,124,200,116,196,113,196,109,112,46,102,46,35,125,35,129" href="#" alt="" onclick="buildFloor(11);"  onmouseover="onMouseOverFloor(11);" />\
			<area shape="poly" id="10" coords="34,137,107,71,237,153,237,149,210,130,202,131,198,128,198,119,113,58,103,58,35,134,34,137" href="#" alt="" onclick="buildFloor(10);"  onmouseover="onMouseOverFloor(10);" />\
			<area shape="poly" id="9" coords="35,138,35,142,107,84,237,158,237,154,107,72,35,138" href="#" alt="" onclick="buildFloor(9);"  onmouseover="onMouseOverFloor(9);" />\
			<area shape="poly" id="8" coords="35,142,34,149,107,97,237,165,237,158,107,84,35,142" href="#" alt="" onclick="buildFloor(8);"  onmouseover="onMouseOverFloor(8);" />\
			<area shape="poly" id="7" coords="34,149,34,156,106,109,238,171,238,166,107,97,34,149" href="#" alt="" onclick="buildFloor(7);"  onmouseover="onMouseOverFloor(7);" />\
			<area shape="poly" id="6" coords="34,156,34,164,106,122,238,177,238,171,106,109,34,156" href="#" alt="" onclick="buildFloor(6);"  onmouseover="onMouseOverFloor(6);" />\
			<area shape="poly" id="5" coords="34,164,34,171,106,137,238,182,238,177,106,123,34,164" href="#" alt="" onclick="buildFloor(5);"  onmouseover="onMouseOverFloor(5);" />\
			<area shape="poly" id="4" coords="34,172,34,178,106,150,238,188,238,183,106,138,34,172" href="#" alt="" onclick="buildFloor(4);"  onmouseover="onMouseOverFloor(4);" />\
			<area shape="poly" id="3" coords="34,182,83,162,85,160,88,159,95,159,103,158,114,158,126,160,130,162,132,163,238,191,238,188,106,151,34,179,34,182" href="#" alt="" onclick="buildFloor(3);"  onmouseover="onMouseOverFloor(3);" />\
			<area shape="poly" id="2" coords="30,193,84,179,95,178,106,178,111,178,127,179,131,180,238,197,238,193,128,164,109,162,102,162,96,163,89,165,30,187,30,193" href="#" alt="" onclick="buildFloor(2);"  onmouseover="onMouseOverFloor(2);" />\
			<area shape="poly" id="1" coords="30,210,108,220,238,206,238,196,108,179,91,181,30,195,30,210" href="#" alt="" onclick="buildFloorRetail(1);"  onmouseover="onMouseOverFloor(1);" />\
</map>';

								document.getElementById('building_rendering').appendChild(building);
									jQuery('#nbuilding250').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill: true });
									jQuery('#nbuilding450').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill:true });
									jQuery('#nbuilding600').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill:true });
									
								jQuery('map area').click(function(e) {
									e.preventDefault();
									var clickedArea = jQuery(this); // remember clicked area
									
									// foreach area
									jQuery('map area').each(function() {
										hData = jQuery(this).data('maphilight') || {}; // get
										hData.alwaysOn = jQuery(this).is(clickedArea); // modify
										jQuery(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
        
    								});
    								deselectDropdown();

								});
}
	
	function useRendering_450(){
		
			jQuery(".building250").remove();
			jQuery(".building450").remove();
			jQuery(".building600").remove();
			var toggle = document.getElementById('toggle');
			toggle.innerHTML ='';
		
			var building = document.createElement('div');
			building.className = 'building450';
			
			building.innerHTML = '<img name="nbuilding450" src="http://torquelaunchdev.com/cww_interactive_building/assets/renderings/building-450.png" width="450" height="443" border="0" id="nbuilding450" usemap="#m_building450" alt="" />\
			<map name="m_building450" id="m_building450" onmouseout="updateNumber();">\
			<area shape="poly" id="12" coords="64,218,64,225,183,82,202,82,353,195,354,203,360,208,359,222,378,222,427,259,427,252,379,210,360,212,361,208,355,202,354,195,353,194,353,185,202,58,184,59" href="#" alt="" onclick="buildFloor(12);"  onmouseover="onMouseOverFloor(12);" />\
			<area shape="poly" id="11" coords="63,233,181,97,203,95,218,105,354,204,360,209,357,231,379,230,427,265,427,260,378,223,359,223,360,209,354,203,353,196,202,82,183,82,63,226,63,233" href="#" alt="" onclick="buildFloor(11);"  onmouseover="onMouseOverFloor(11);" />\
			<area shape="poly" id="10" coords="62,248,193,129,427,276,427,269,379,234,363,235,357,231,356,214,203,105,185,105,62,242,62,248" href="#" alt="" onclick="buildFloor(10);"  onmouseover="onMouseOverFloor(10);" />\
			<area shape="poly" id="9" coords="62,249,62,256,192,151,427,284,427,277,193,129,62,249" href="#" alt="" onclick="buildFloor(9);"  onmouseover="onMouseOverFloor(9);" />\
			<area shape="poly" id="8" coords="62,256,62,268,192,175,427,297,427,284,193,151,62,256" href="#" alt="" onclick="buildFloor(8);"  onmouseover="onMouseOverFloor(8);" />\
			<area shape="poly" id="7" coords="61,269,61,281,191,197,428,308,428,298,192,175,61,269" href="#" alt="" onclick="buildFloor(7);"  onmouseover="onMouseOverFloor(7);" />\
			<area shape="poly" id="6" coords="61,282,61,295,191,221,428,319,428,308,191,196,61,282" href="#" alt="" onclick="buildFloor(6);"  onmouseover="onMouseOverFloor(6);" />\
			<area shape="poly" id="5" coords="61,296,61,308,190,247,428,328,428,319,191,221,61,296" href="#" alt="" onclick="buildFloor(5);"  onmouseover="onMouseOverFloor(5);" />\
			<area shape="poly" id="4" coords="61,309,61,321,191,271,428,338,428,329,190,248,61,309" href="#" alt="" onclick="buildFloor(4);"  onmouseover="onMouseOverFloor(4);" />\
			<area shape="poly" id="3" coords="61,328,150,292,153,289,159,287,170,285,186,285,205,285,226,287,235,291,237,294,429,344,428,339,191,271,61,322,61,328" href="#" alt="" onclick="buildFloor(3);"  onmouseover="onMouseOverFloor(3);" />\
			<area shape="poly" id="2" coords="54,347,151,322,172,320,191,320,200,320,229,322,235,324,428,354,428,348,230,296,196,292,184,292,172,293,159,297,55,336,54,347" href="#" alt="" onclick="buildFloor(2);"  onmouseover="onMouseOverFloor(2);" />\
			<area shape="poly" id="1" coords="55,377,194,395,428,371,428,354,194,323,165,326,54,351,55,377" href="#" alt="" onclick="buildFloorRetail(1);"  onmouseover="onMouseOverFloor(1);" />\
			</map>';

								document.getElementById('building_rendering').appendChild(building);
									jQuery('#nbuilding250').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill: true });
									jQuery('#nbuilding450').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill:true });
									jQuery('#nbuilding600').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill:true });
									
								jQuery('map area').click(function(e) {
									e.preventDefault();
									var clickedArea = jQuery(this); // remember clicked area
									
									// foreach area
									jQuery('map area').each(function() {
										hData = jQuery(this).data('maphilight') || {}; // get
										hData.alwaysOn = jQuery(this).is(clickedArea); // modify
										jQuery(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
        
    								});
    								deselectDropdown();

								});
}


function useRendering_600(){
		
			jQuery(".building250").remove();
			jQuery(".building450").remove();
			jQuery(".building600").remove();
			var toggle = document.getElementById('toggle');
			toggle.innerHTML ='';
		
			var building = document.createElement('div');
			building.className = 'building600';
			
			building.innerHTML = '<img name="nbuilding600" src="http://torquelaunchdev.com/cww_interactive_building/assets/renderings/building-600.png" width="610" height="600" border="0" id="nbuilding600" usemap="#m_building600" alt="" /><map name="m_building600" id="m_building600" onmouseout="updateNumber();">\
<area shape="poly" id="12" coords="86,295,86,305,248,111,274,111,479,264,480,275,488,282,487,301,513,301,579,351,579,341,513,285,489,287,489,282,481,273,480,265,478,262,478,250,274,79,250,80"  href="#" alt="" onclick="buildFloor(12);"  onmouseover="onMouseOverFloor(12);" />\
<area shape="poly" id="11" coords="86,315,245,131,275,129,296,142,479,277,487,283,484,313,513,312,579,359,579,353,513,302,486,302,488,283,479,275,479,265,274,111,248,111,86,306,86,315"  href="#" alt="" onclick="buildFloor(11);"  onmouseover="onMouseOverFloor(11);" />\
<area shape="poly" id="10" coords="84,335,261,174,579,374,579,364,513,317,493,318,484,313,483,290,275,143,250,142,84,327,84,335"  href="#" alt="" onclick="buildFloor(10);"  onmouseover="onMouseOverFloor(10);" />\
<area shape="poly" id="9" coords="85,337,84,346,261,204,579,385,578,375,261,175,85,337"  href="#" alt="" onclick="buildFloor(9);"  onmouseover="onMouseOverFloor(9);" />\
<area shape="poly" id="8" coords="84,347,84,363,260,237,579,403,579,385,261,204,84,347"  href="#" alt="" onclick="buildFloor(8);"  onmouseover="onMouseOverFloor(8);" />\
<area shape="poly" id="7" coords="83,364,83,380,259,266,580,417,580,404,260,237,83,364"  href="#" alt="" onclick="buildFloor(7);"  onmouseover="onMouseOverFloor(7);" />\
<area shape="poly" id="6" coords="83,382,83,400,259,299,580,432,580,418,259,266,83,382"  href="#" alt="" onclick="buildFloor(6);"  onmouseover="onMouseOverFloor(6);" />\
<area shape="poly" id="5" coords="83,400,83,418,258,335,580,444,580,432,259,299,83,400"  href="#" alt="" onclick="buildFloor(5);"  onmouseover="onMouseOverFloor(5);" />\
<area shape="poly" id="4" coords="83,419,83,435,259,367,580,458,581,445,258,336,83,419"  href="#" alt="" onclick="buildFloor(4);"  onmouseover="onMouseOverFloor(4);" />\
<area shape="poly" id="3" coords="83,444,203,395,207,391,215,388,231,387,252,385,278,386,306,389,318,395,321,398,581,466,580,459,259,367,83,436,83,444"  href="#" alt="" onclick="buildFloor(3);"  onmouseover="onMouseOverFloor(3);" />\
<area shape="poly" id="2" coords="73,470,205,436,233,434,258,433,271,433,310,437,319,438,580,479,580,472,312,401,266,395,249,395,234,397,216,402,74,455,73,470"  href="#" alt="" onclick="buildFloor(2);"  onmouseover="onMouseOverFloor(2);" />\
<area shape="poly" id="1" coords="74,511,263,536,580,503,581,479,263,438,223,441,73,476,74,511" href="#" alt="" onclick="buildFloorRetail(1);"  onmouseover="onMouseOverFloor(1);" />\
</map>';

								document.getElementById('building_rendering').appendChild(building);
									jQuery('#nbuilding250').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill: true });
									jQuery('#nbuilding450').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill:true });
									jQuery('#nbuilding600').maphilight({ stroke: false, fillColor: 'f9a23d', fillOpacity: 0.8 , alwaysOn: false, fill:true });
									
								jQuery('map area').click(function(e) {
									e.preventDefault();
									var clickedArea = jQuery(this); // remember clicked area
									
									// foreach area
									jQuery('map area').each(function() {
										hData = jQuery(this).data('maphilight') || {}; // get
										hData.alwaysOn = jQuery(this).is(clickedArea); // modify
										jQuery(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
        
    								});
    								deselectDropdown();

								});
}


function useToggle(){

		if(tierSelected == false){
			jQuery(".building250").remove();
			jQuery(".building450").remove();
			jQuery(".building600").remove();	
/*
	var bigBuilding = document.getElementById('big_building');
	bigBuilding.innerHTML = '';
*/
	
	var toggle = document.getElementById('toggle');
	
	toggle.innerHTML = '<div class="content-section" id="toggle-content-section">\
    <div class="content-container" id="toggle-content-container">\
      <div class="toggle-container" id="toggle-container">\
        <a class="toggle-left" id="toggle-left" href="#" onclick="minusOne();"><img class="left-arrow" src="http://torquelaunchdev.com/cww_interactive_building/assets/images/arrow-left.png" width="35" alt="">\
        </a>\
        <div class="floor-block" id="floor-block">\
          <div class="text-floor" id="text-floor">Floor</div>\
          <div class="text-number" id="text-number">8</div>\
        </div>\
        <a class="toggle-right" id="toggle-right" href="#" onclick="plusOne();" ><img class="right-arrow" src="http://torquelaunchdev.com/cww_interactive_building/assets/images/arrow-right.png" width="35" alt="">\
        </a>\
      </div>\
    </div>\
  </div>';	
	
	updateToggle(theFloor);
	buildFloor(theFloor);
	}else{
		jQuery(".building250").remove();
			jQuery(".building450").remove();
			jQuery(".building600").remove();	
		
	}
}

function plusOne(){
		
	if(theFloor+1 <= 12)
	{
		updateToggle(theFloor+1);
		
		var res = theFloor +1;
		
		if(res == 1){
			
			buildFloorRetail(1);
		}else{
			buildFloor(theFloor+1);
		}
		
	}
	
}

function minusOne(){
	
	if(theFloor-1 >= 1)
	{
		updateToggle(theFloor-1);
		var res = theFloor -1;
		
		if(res == 1){
			
			buildFloorRetail(1);
		}else{
			buildFloor(theFloor+1);
		}
	}
	
	
}

function updateToggle(floorNumber){
	
	

		var text = document.getElementById("text-number");
		text.innerHTML = floorNumber;
	
}



	
	
function onMouseOverFloor(floorNumber){
	
	var text = document.getElementById("floorNumber");
	
	switch(floorNumber) {
	case 1:
        text.innerHTML = "Retail Space";
        break;
    case 2:
        text.innerHTML = "Floor <span class=\"fNumber\">2</span>";
        break;
    case 3:
        text.innerHTML = "Floor <span class=\"fNumber\">3</span>";
        break;
    case 4:
        text.innerHTML = "Floor <span class=\"fNumber\">4</span>";
        break;
    case 5:
        text.innerHTML = "Floor <span class=\"fNumber\">5</span>";
        break;
    case 6:
        text.innerHTML = "Floor <span class=\"fNumber\">6</span>";
        break;
    case 7:
        text.innerHTML = "Floor <span class=\"fNumber\">7</span>";
        break;
    case 8:
        text.innerHTML = "Floor <span class=\"fNumber\">8</span>";
        break;
    case 9:
        text.innerHTML = "Floor <span class=\"fNumber\">9</span>";
		break;
    case 10:
        text.innerHTML = "Floor <span class=\"fNumber\">10</span>";
        break;
    case 11:
        text.innerHTML = "Floor <span class=\"fNumber\">11</span>";
        break;
    case 12:
        text.innerHTML = "Floor <span class=\"fNumber\">12</span>";
        break;
    case 21:
        text.innerHTML = "10,000 - 30,000 SF";
        break;
    case 22:
        text.innerHTML = "60,000 - 120,000 SF";
        break;
    case 23:
        text.innerHTML = "More Than 120,000 SF";
        break;    
    
        default:
        //text.innerHTML = "Floor <br><span class=\"fNumber\">2</span>";
		}
		
		//text.innerHTML = "Floorwqw <br><span class=\"fNumber\">2</span>";
}
	
	
	
	
	
	

function updateNumber(){
	onMouseOverFloor(theFloor);
	
}


var $j = jQuery.noConflict();
$j('map area').click(function(e) {
    e.preventDefault();
    var clickedArea = $(this); // remember clicked area
    // foreach area
    $j('map area').each(function() {
        hData = $(this).data('maphilight') || {}; // get
        hData.alwaysOn = $(this).is(clickedArea); // modify
        $j(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
        
    });

});



