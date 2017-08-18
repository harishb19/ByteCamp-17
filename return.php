<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
$jsondata = file_get_contents('return.json');
$data = json_decode($jsondata, true);
$u_id = $data['uid'];
$b_id = $data['bid'];
$deposited_at = time();
//Insert into DB
$insert = mysqli_query($connection, "INSERT into deposited(u_id,b_id,deposited_at)VALUES('$u_id', '$b_id', '$deposited_at')");
$bk= mysqli_query($connection,"SELECT * FROM books WHERE b_id='$b_id' ");
$row = mysqli_fetch_assoc($bk);
$change= $row['stock']+1;
$update_issue = mysqli_query($connection, "UPDATE books SET stock='$change' WHERE b_id='$b_id' ");

if($insert){
    $error = "Successfully!";
    $update_issue = mysqli_query($connection, "UPDATE issued SET status='1' WHERE u_id='$u_id' AND b_id='$b_id'  AND status='0'");
}
else{
    $error = "Some Error!";
}



?>