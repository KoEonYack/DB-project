<?php
    include "../include/session.php";
    echo $_SESSION['ses_userid'].'님 로그아웃 하겠습니다.';

    unset($_SESSION['ses_userid']);

    if($_SESSION['ses_userid'] == null){
        echo '<br /><br />로그아웃 완료 ';
    }
?>