<?php
//var_dump($_POST);

$full_url = "";


$full_url = $_POST['url_str']."?order=1&asc=1&role=".$_POST['role']."&fmt=".$_POST['fmt']."&fz=".$_POST['fz']."&kwop=".$_POST['kwop']."&role_status=".$_POST['role_status']."&incs=".$_POST['incs']."&intmp=".$_POST['intmp'];

if(!empty($_POST['cols'])){
    $full_url .= "&cols=".$_POST['cols'];
}

if(!empty($_POST['area'])){
    $full_url .= "&area=".$_POST['area'];
}

if(!empty($_POST['keyword'])){
    $full_url .= "&keyword=".$_POST['keyword'];
}

if(!empty($_POST['cat'])){
    $full_url .= "&cat=".$_POST['cat'];
}

if(isset($_POST['page']) && !empty($_POST['page'])){
    $full_url .= "&pgsz=10&page=".$_POST['page'];
} else {
    $full_url .= "&pgsz=10&page=1";
}


    echo file_get_contents($full_url);


    ?>