<?php

    include "../../db_connect.php";

    $memberId = $row['memberId'];
/*
    $sql = "SELECT * FROM user_list WHERE nick_name = '{$memberId}'";

    $res = mysqli_query($conn, $sql);
    echo "Could not successfully run quert ($sql) from DB: ";
   // var_dump($res);

    if($res->num_rows >= 1){
        echo json_encode(array('res'=>'bad'));
    }else{
        echo json_encode(array('res'=>'good'));
    }
*/
    echo $memberId, '</br>';
    $sql = "SELECT * FROM user_list WHERE nick_name = '{$memberId}'";
    $res = mysqli_query($conn, $sql);
    //echo "Could not successfully run quert ($sql) from DB: ";
    var_dump($res);
    if($res->num_rows >= 1){
        echo '이미 존재하는 아이디가 있습니다.';
        exit;
    }else{
        var_dump($res->num_rows);
        echo $res->num_rows;
        echo '가능합니다.';
    }

?>

