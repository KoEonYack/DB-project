<?php
    include "../include/session.php";
    include "../../db_connect.php";
    /*echo "<pre>";
    var_dump($_POST);*/
    $memberId = $_POST['memberId'];
    $memberPw = $_POST['memberPw'];

    $sql = "SELECT * FROM user_list WHERE nick_name = '{$memberId}' AND user_password = '{$memberPw}'";
    $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($res);

        if ($row != null) {
            $_SESSION['ses_userid'] = $row['nick_name'];
            echo $_SESSION['ses_userid'].'님 안녕하세요 watcha입니다. ';
            echo "<a href='./signOut.php'>로그아웃</a>";
        }

        if($row == null){
            echo '로그인 실패 아이디와 비밀번호가 일치하지 않습니다.';
        }
?>



