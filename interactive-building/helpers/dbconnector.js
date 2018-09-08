var selectedFloor = 1; // this keeps the number of a selected floor

// Once one of the floors clicked,
function buildFloor(floorName, buildingID){

    var newhtml = '';
    jQuery.ajax({
      url: '/wp-content/themes/bannockburn-child/interactive-building/helpers/database.php',
      type: 'post',
      data: {'floorName': floorName, 'buildingID':buildingID},
      cache: false,
      success: function(str) {

        var el = document.getElementById('amenities_list');
	       while ( el.firstChild ) el.removeChild( el.firstChild );

         jQuery( "#amenities_list" ).append( str);

      },
      error: function(xhr, desc, err) {

        console.log(xhr + "\n" + err);
      }
    });
}
