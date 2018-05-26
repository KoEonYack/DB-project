<?php
    include "../include/session.php";
    require('../../db_connect.php');
    echo '<h1>'.$_SESSION['ses_userid'].'님 다음에 또 방문해주세요. </h1>';
    $user_id = $_SESSION['userlist_id'];
    unset($_SESSION['ses_userid']);

    $sql = "INSERT INTO user_log_list3 VALUES({$user_id},NOW())";
    mysqli_query($conn, $sql);

    if($_SESSION['ses_userid'] == null){
        echo '<br/><br/><h1>로그아웃 완료</h1> ';
        echo "<script>alert('로그아웃 완료');
        history.back();</script>
        ";
        header("HTTP/1.1 307 Temporary move"); 
        header("Location: ../../button.php");
        exit;
    }
?>