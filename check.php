<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
$jsondata = file_get_contents('check.json');
$data = json_decode($jsondata, true);
$u_id = $data['uid'];
//Insert into DB
$sql = mysqli_query($connection, "SELECT * FROM user WHERE u_id='$u_id'");
$count= mysqli_num_rows($sql);
var_dump($count);
if($count>0){
    $data1['uid']=1;
    $data1['bid']=0;
    var_dump($data1);
    $fp = fopen('checked.json', 'w');
    fwrite($fp, json_encode($data1));
    fclose($fp);
}
else{
    $data1['uid']=0;
    $data1['bid']=1;
    $fp = fopen('checked.json', 'w');
    fwrite($fp, json_encode($data1));
    fclose($fp);
}
if($sql){
    $error = "Successfully!";
}
else{
    $error = "Some Error!";
}
echo ($error);


?>