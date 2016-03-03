<?php
header('Content-type: text/plain; charset=utf-8');

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

?>
<?php


$dbhost = 'localhost:3306';

$dbuser = 'Karen';
$dbpass = 'h94ru04u83';

//$dbuser = 'root';
//$dbpass = 'root';
$dbname = 'timeliner_game';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);

$action = isset($_POST['action']) ? $_POST['action'] : '' ;

$today = date("Y-m-d H:i");

$legend[] = array(
    "title" => '太后',
    "icon" => 'triangle_red.png'
);
$legend[] = array(
    "title" => '狗',
    "icon" => 'triangle_green.png'
);
$legend[] = array(
    "title" => '鸚鵡',
    "icon" => 'square_orange.png'
);
$legend[] = array(
    "title" => '垃圾人',
    "icon" => 'square_blue.png'
);
$legend[] = array(
    "title" => '死螃蟹',
    "icon" => 'circle_green.png'
);




if($action == 'insert') {

    $description = isset($_POST['description']) ? $_POST['description'] : '' ;
    $icon = isset($_POST['icon']) ? $_POST['icon'] : '' ;
    $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : $today ;
    $left_name = isset($_POST['left_name']) ? $_POST['left_name'] : '' ;
    $name = isset($_POST['name']) ? $_POST['name'] : '' ;


    //$title = substr($description, 0, 20);

    $description_str = $name." 說 ".$description." <br> - ".$left_name." at ".$datetime;

    $sql = "INSERT INTO record SET title = '".$description."', description = '".$description_str."', icon = '".$icon."', date = '".$datetime."', left_name = '".$left_name."', name = '".$name."'";

    $result = mysql_query($sql);


    $sql = "SELECT * FROM `record`";
    $result = mysql_query($sql);

    $temp = array();
    while($row = mysql_fetch_array($result)){

        $temp[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'startdate' => $row['date'],
            'description' => $row['description'],
            'icon' => $row['icon'],
            'low_threshold' => '1',
            'high_threshold' => '60',
            'importance'=> '45',
            'ypix'=> '0',
            'slug'=> ''
        );
    }




    $data = array(
        "id"=> "idahoTimeline",
        "title"=> "Office Bullshit Record",
        "focus_date"=> $today,
        "initial_zoom"=> "12",
        "color"=> "#82530d",
        "size_importance"=> "true",
        "events" => $temp,
        "legend" => $legend
    );

    //echo json_encode($data);


   $fp = fopen('json/demo2.json', 'w');
   fwrite($fp, json_encode(array($data)));
   fclose($fp);

} else if($action == 'update_record'){

    $sql = "SELECT * FROM `record`";
    $result = mysql_query($sql);

    $temp = array();
    while($row = mysql_fetch_array($result)){

        $temp[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'startdate' => $row['date'],
            'description' => $row['description'],
            'icon' => $row['icon'],
            'low_threshold' => '1',
            'high_threshold' => '60',
            'importance'=> '45',
            'ypix'=> '0',
            'slug'=> ''
        );
    }



    $data = array(
        "id"=> "idahoTimeline",
        "title"=> "Office Bullshit Record",
        "focus_date"=> $today,
        "initial_zoom"=> "12",
        "color"=> "#82530d",
        "size_importance"=> "true",
        "events" => $temp,
        "legend" => $legend
    );

    //echo json_encode($data);

    $fp = fopen('json/demo2.json', 'w');
    fwrite($fp, json_encode(array($data)));
    fclose($fp);
}





?>