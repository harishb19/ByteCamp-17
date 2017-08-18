<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
$jsondata = file_get_contents('checkin.json');
$data = json_decode($jsondata, true);
$u_id = $data['uid'];
$created_at = time();
//Insert into DB
$insert = mysqli_query($connection, "INSERT into check_in(u_id,created_at)VALUES('$u_id', '$created_at')");
if($insert){
    $error = "Successfully!";
}
else{
    $error = "Some Error!";
}



?>