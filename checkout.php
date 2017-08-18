<html>
<body>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
    $jsondata = file_get_contents('checkout.json');
    $data = json_decode($jsondata, true);
    $s_id = $data['uid'];
    $b_id = $data['bid'];
    $created_at = time();
    $sql= mysqli_query($connection,"SELECT * FROM issued WHERE u_id='$s_id' AND status = '0' ");
    $bk= mysqli_query($connection,"SELECT * FROM books WHERE b_id='$b_id' AND stock > '0' ");
    $count= mysqli_num_rows($sql);
    $row = mysqli_fetch_assoc($bk);
    if($row['stock']>5){
        $dont['key']=1;
        $fp = fopen('results.json', 'w');
        fwrite($fp, json_encode($dont));
        fclose($fp);
        var_dump($dont);
    }
    else{
        if($count>2){
            $dont['key']=1;
            $fp = fopen('results.json', 'w');
            fwrite($fp, json_encode($dont));
            fclose($fp);
            var_dump($dont);
        }
        else{
            $change= $row['stock']-1;
            var_dump($change);
            $dont['key']=0;
            $fp = fopen('results.json', 'w');
            fwrite($fp, json_encode($dont));
            fclose($fp);
            $insert_co = mysqli_query($connection, "INSERT into check_out(u_id,b_id,created_at)VALUES('$s_id', '$b_id', '$created_at')");
            $insert = mysqli_query($connection, "INSERT into issued(u_id,b_id,status,issued_at)VALUES('$s_id', '$b_id', 0, '$created_at')");
            $update_issue = mysqli_query($connection, "UPDATE books SET stock='$change' WHERE b_id='$b_id' ");
        }
    }





?>
</body>
</html>
