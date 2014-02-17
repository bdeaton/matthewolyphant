<?php

$jsonLive = $_POST['data']; // required

$jsonLive2 = '{
	"item1": [
		{
			"newOrder": "1",
			"itemId":"2"
		}
	],
	"item2": [
		{
			"newOrder": "1",
			"itemId":"2"
		}
	]
}';


$json1 = '{
		"item1": [{
			"newOrder":1
		}]
	}';

$json = '{
	"item1": [
		{
			"newOrder": "1",
			"itemId":"2"
		}
	],
	"item2": [
		{
			"newOrder": "1",
			"itemId":"2"
		}
	]
}';

/*
$data1 = json_decode($json1);
foreach ($data1 as $name1 => $value1) {
	echo $value1->newOrder.':<br />';
}
*/

$data = json_decode($jsonLive);
foreach ($data as $name => $value) {
    echo $name . ':<br />';
    foreach ($value as $entry) {
        echo 'itemId - ' . $entry->itemId;
        echo'<br />';
        echo 'New - ' . $entry->newOrder;
        echo'<br />';
        echo'<br />';
    }
}


?>
