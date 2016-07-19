<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require("db_connection.php");

//phpinfo();
$room   = ($_POST['room'])  ? $_POST['room'] : '';
$unit   = ($_POST['unit'])  ? $_POST['unit'] : '';
$date   = ($_POST['date'])  ? $_POST['date'] : '';
$date = date("Y-m-d", strtotime($date));
$start  = ($_POST['start']) ? $_POST['start'] : '';
$end    = ($_POST['end'])   ? $_POST['end'] : '';
$color  = ($_POST['color']) ? $_POST['color'] : '';

$func  = ($_POST['func']) ? $_POST['func'] : '';

$db = new DB();
$db->connect();


if($func == 'get'){

	//unlink("booking.xml");

	$sql = "SELECT * FROM records ORDER BY event_date ASC";
	$result = $db->query($sql);

	$dom = new DomDocument('1.0', 'UTF-8');

	$monthly = $dom->appendChild($dom->createElement("monthly"));
	//$dom_monthly = $dom->createElement("monthly");


	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

		$dom_id = $dom->appendChild($dom->createElement("id", $row['id']));

		$title = $row['name'] . " - " . $row['unit'];

		$dom_name = $dom->appendChild($dom->createElement("name", $title));
		$dom_date_start = $dom->appendChild($dom->createElement("startdate", $row['event_date']));
		$dom_date_end = $dom->appendChild($dom->createElement("enddate", $row['event_date']));
		$dom_start = $dom->appendChild($dom->createElement("starttime", $row['start_time']));
		$dom_end = $dom->appendChild($dom->createElement("endtime", $row['end_time']));
		$dom_color = $dom->appendChild($dom->createElement("color", $row['color']));

		$event = $dom->appendChild($dom->createElement("event"));

		$event->appendChild($dom_id);
		$event->appendChild($dom_name);
		$event->appendChild($dom_date_start);
		$event->appendChild($dom_date_end);
		$event->appendChild($dom_start);
		$event->appendChild($dom_end);
		$event->appendChild($dom_color);

		$monthly->appendChild($event);

	}



	$dom->formatOutput = true;
	$test1 = $dom->saveXML(); // put string in test1
	//echo "<pre>", htmlspecialchars($test1, ENT_QUOTES, 'UTF-8'), "</pre>";

	$dom->save("booking.xml"); // save as file
	$result = $dom->save("booking.xml");


} elseif($func == 'insert') {

	if($room != '' && $date != '' && $start != '' && $end != ''){
		if($color == '#FFFFFF' || $color == '#ffffff'){
			$color = '' ;
		}
		$sql = "INSERT INTO records SET name = '".$room."', unit = '".$unit."',event_date = '".$date."', start_time = '".$start."', end_time = '".$end."', color = '".$color."'";

		//echo $sql;
		$result = $db->query($sql);

		echo "insert success";

	} else {
		echo "error";
	}
}
