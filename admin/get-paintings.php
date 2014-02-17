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
		echo "<table border='1'>
		<tr>
			<th colspan='20' style='text-transform:uppercase;'>Items</td>
		</tr>
		<tr>
			<th>item_id</th>
			<th>creation_date</th>
			<th>category_id</th>
			<th>sort_order</th>
			<th>active</th>
			<th>item_name</th>
			<th>item_year</th>
			<th>item_desc</th>
			<th>medium_desc</th>
			<th>item_width</th>
			<th>item_height</th>
			<th>filename</th>
			<th>large_width</th>
			<th>large_height</th>
		</tr>";

		
		while($row = mysql_fetch_array($result)){
		  echo "<tr>";
			  echo "<td>" . $row['item_id'] . "</td>";
			  echo "<td>" . $row['creation_date'] . "</td>";
			  echo "<td>" . $row['category_id'] . "</td>";
			  echo "<td>" . $row['sort_order'] . "</td>";
			  echo "<td>" . $row['active'] . "</td>";
			  echo "<td>" . $row['item_name'] . "</td>";
			  echo "<td>" . $row['item_year'] . "</td>";
			  echo "<td>" . $row['item_desc'] . "</td>";
			  echo "<td>" . $row['medium_desc'] . "</td>";
			  echo "<td>" . $row['item_width'] . "</td>";
			  echo "<td>" . $row['item_height'] . "</td>";
			  echo "<td>" . $row['filename'] . "</td>";
			  echo "<td>" . $row['large_width'] . "</td>";
			  echo "<td>" . $row['large_height'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
		echo "<br /><br />";
		
		
		


		

		mysql_close($con);
	}
	else{
		die('Could not connect: ' . mysql_error());
	}
	
	
?>

