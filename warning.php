<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');


$check = mysqli_query($connection, "SELECT * FROM issued");
$row = mysqli_fetch_assoc($check);
$uid=$row['u_id'];
$flag=$row['issued_at']-518094;
var_dump($flag);
var_dump($row['issued_at']);
if($row['issued_at']<= $flag){
    $mail = mysqli_query($connection, "SELECT * FROM user WHERE u_id='$uid' ");
    $row1 = mysqli_fetch_assoc($mail);
    $email=$row1['email'];
    $bid=$row['b_id'];

    $dont['email']="$email";
    $dont['b_id']="$bid";

    $fp = fopen('war.json', 'w');
    fwrite($fp, json_encode($dont));
    fclose($fp);
    system('python war.py'.$email.','.$b_id,$result);
}

;
?>
