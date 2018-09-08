<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>building</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Fireworks CS3 Generic target.  Created Fri Nov 07 10:41:08 GMT-0600 (CST) 2014-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="assets/master.css">
<style type="text/css">
	.building-rendering{
		background-image: url(assets/stacking-plan.png);
		background-repeat: no-repeat;
	}

	.heaven-on-earth {
		fill: yellow;
	}
</style>
</head>
<body>
	<div id="map" class="building-rendering"></div>
	<table class="table" style="vertical-align: center;">
		<thead>
			<tr>
				<th class="bodycopy greentext">Suite</th>
				<th class="bodycopy greentext">SF</th>
				<th class="bodycopy greentext">Video</th>
				<th class="bodycopy greentext">Floor Plan</th>
			</tr>
		</thead>
		<tbody id="amenities_list">
		</tbody>
	</table>

	<script src="helpers/raphael-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="helpers/building.js" type="text/javascript" charset="utf-8"></script>
	<script src="helpers/dbconnector.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
