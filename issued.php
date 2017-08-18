<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
$jsondata = file_get_contents('checkout.json');
$data = json_decode($jsondata, true);
$u_id = $data['uid'];
$b_id = $data['bid'];
$issued_at = time();
//Insert into DB
$insert = mysqli_query($connection, "INSERT into issued(u_id,b_id,status,issued_at)VALUES('$u_id', '$b_id', 0,'$issued_at')");
if($insert){
    $error = "Successfully!";
}
else{
    $error = "Some Error!";
}



?>