<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <style>
  #sortable {
  	list-style-type: none;
  	margin: 0;
  	padding: 0;
  	width: 60%;
  }
  #sortable li {}
  
	#sortable li {
		margin: 10px 10px 0 0;
		padding: 0;
		float: left;
		width: 150px;
		height: 150px;
		overflow: hidden;
	}
  
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>
</head>
<body>
<?php
	$con = mysql_connect("localhost","rollclic_test","briand10");
	if ($con){
		mysql_select_db("rollclic_matthewolyphant", $con);


		/*
		$result = mysql_query("SELECT * FROM artists as A where A.artist_id=1");
		while($row = mysql_fetch_array($result)){
			echo $row['artist_id'] . " - " . $row['artist_name'] . " - " . $row['artist_desc'];
			echo "<br />";
		}
		*/

		$category = (int) $_GET['category'];
		$categoryFilter = ($category != null) ? ' where category_id='.$category : '';

		$result = mysql_query("SELECT * FROM items".$categoryFilter);

?>
<ul id="sortable">
<?
	while($row = mysql_fetch_array($result)){
		
		echo "    <li data-itemId=\"".$row['item_id']."\" data-newOrder=\"".$row['sort_order']."\" data-currentOrder=\"".$row['sort_order']."\"><img src=\"../img/artwork/installations/thumbnail/" . $row['filename'] . "\" width=\"200\" title=\"" . $row['item_name'] . "\" /></li>\n";
	
	
	
	}
?>
</ul>
<br /><br />
<?
	
	
	


	

	mysql_close($con);
}
else{
	die('Could not connect: ' . mysql_error());
}


?>
</body>
</html>
