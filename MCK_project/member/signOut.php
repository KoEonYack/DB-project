<?php
    include "../include/session.php";
    echo '<h1>'.$_SESSION['ses_userid'].'님 다음에 또 방문해주세요. </h1>';

    unset($_SESSION['ses_userid']);

    if($_SESSION['ses_userid'] == null){
        echo '<br /><br /><h1>로그아웃 완료</h1> ';
    }
?>