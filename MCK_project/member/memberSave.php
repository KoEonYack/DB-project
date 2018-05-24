<?php
    include "../../db_connect.php";
    /*echo "<pre>";
    echo var_dump($_POST);*/
    global $conn;


    $memberId = $_POST['memberId'];
    $memberName = $_POST['memberName'];
    $memberPw = $_POST['memberPw'];
    $memberPw2 = $_POST['memberPw2'];
    $memberEmailAddress = $_POST['memberEmailAddress'];
    $tel = $_POST['tel'];
    //echo $memberId, '</br>', $memberName, '</br>',$memberPw, '</br>',$memberPw2, '</br>',$memberEmailAddress, '</br>',$tel;

    //PHP에서 유효성 재확인

    //아이디 중복검사.
    $sql = "SELECT * FROM user_list WHERE nick_name = '{$memberId}'";

    
    $res = $conn->query($sql);
    //var_dump($res);
    if($res->num_rows >= 1){
        echo '<h1>이미 존재하는 아이디가 있습니다.</h1>';
        exit;
    }
    var_dump($res);

    echo "<br>";
    //비밀번호 일치하는지 확인

    if($memberPw !== $memberPw2){
        echo '비밀번호가 일치하지 않습니다.';
        exit;
    }else{
        echo '비밀번호를 암호화 처리';
        $memberPw = $memberPw;
    }
    var_dump($res);
    echo "<br>";

    //전화번호 이름이 빈값이 아닌지
    if($tel == '' || $memberName == ''){
        echo '전화번호 혹은 이름의 값이 없습니다.';
        exit;
    }
    var_dump($res);
    echo "<br>";
    //이메일 주소가 올바른지
    $checkEmailAddress = filter_var($memberEmailAddress, FILTER_VALIDATE_EMAIL);

    if($checkEmailAddress != true){
        echo '<h1>올바른 이메일 주소가 아닙니다.</h1>';
        exit;
    }
    var_dump($res);
    echo "<br>";
    //이제부터 넣기 시작

   // $sql = "INSERT INTO `user_list`(`nick_name`, `user_password`, `user_email`, `user_phone`, `user_name`) VALUES('{$memberId}','{$memberPw}','{$memberEmailAddress}','{$memberNickName}','{$memberName}');";
    $sql1 = "INSERT INTO user_list(nick_name, user_password, user_email, user_phone, user_name) VALUES('1','1234','dssdk@naver.com',1234, 'aaa');";
    echo "<br>";
    mysqli_query($conn, "INSERT INTO user_list(nick_name, user_password, user_email, user_phone, user_name) VALUES('1','1234','dssdk@naver.com',1234, 'aaa')");

  if($conn->query(sql1)){
        echo '<h1>회원가입 성공</h1>';
    }
    else{
        echo "회원가입 실패";
    }



    mysqli_close($conn);
?>

