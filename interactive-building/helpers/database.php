<?php
// Here we will build out the html system and return it to JSON
$floorNum = $_POST['floorName'];
$buildingID = $_POST['buildingID'];

$buiding;


if($buildingID == 4){
	
	$building = 'Bannockburn Lakes IV - 2201 Waukegan Rd';
	
}else if($buildingID == 3){
	
}else if ($buildingID ==2){
	
	$building = 'Bannockburn Lakes II - 2345 Waukegan Rd';
	
}else if ($buildingID == 1){
	
	$building = 'Bannockburn Lakes I - 2333 Waukegan Rd';
	
	
}


// Start of a database connection
$username = "torque-dbadmin";
$password = "K9arf!!!";
$hostname = "localhost";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");

$selected = mysqli_select_db($dbhandle, "bannockburn-stackingplan")
  or die("Could not select the interactive building");


if($floorNum !=''){
	$apartments_query = mysqli_query($dbhandle, "SELECT name, building, vacant,sqr_ft, pdf_url FROM Suite WHERE vacant = 'Yes' AND floor_number = $floorNum AND building = '$building'");
 }




if (mysqli_num_rows($apartments_query) == 0) {
   echo $html_string = '<tr>
   <td class="bodycopy darktext test">No Spaces Available</td>\</tr>';
}


while ($apartment = mysqli_fetch_array($apartments_query)) {

	$name = $apartment{'name'};
	$building = $apartment{'building'};
	$sqr_feet = $apartment{'sqr_ft'};
	$floor = $apartment{'floor'};
	$pdf_url = $apartment{'pdf_url'};


    $html_string = '<tr>\
					    <td class="bodycopy darktext">' .$name .'</td>\
					    <td class="bodycopy darktext">' . $sqr_feet. '</td>';
					    
	if($pdf_url == ''){
		
		$html_string = $html_string . '<td><a class="linktext-light" href="http://bbfloorplan.torquelaunchdev.com/assets/uploads/pdfs/'.$pdf_url.'" target="_blank"></a></td></tr>';
		
	}else{
		
		$html_string = $html_string . '<td><a class="linktext-light" href="http://bbfloorplan.torquelaunchdev.com/assets/uploads/pdfs/'.$pdf_url.'" target="_blank">Download</a></td></tr>';
	}
	
	
				   
	echo $html_string;			   
 };

	
?>
