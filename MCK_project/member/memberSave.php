<!doctype html>

<html lang="Ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registraion Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome 
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">-->
    <!-- Custom style
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8"> -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <script type="text/javascript" src="../js/mySignupForm.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 </head>

<body>
    <?php
        include "../../db_connect.php";
        /*echo "<pre>";
        echo var_dump($_POST);*/

        $memberId = $_POST['memberId'];
        $memberName = $_POST['memberName'];
        $memberPw = $_POST['memberPw'];
        $memberPw2 = $_POST['memberPw2'];
        $memberEmailAddress = $_POST['memberEmailAddress'];
        $tel = $_POST['tel'];
        $open_range=$_POST['open_range'];
        $profile=$_POST['profile'];

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
        //var_dump($res->num_rows);

        //비밀번호 일치하는지 확인

        if($memberPw !== $memberPw2){
            echo '비밀번호가 일치하지 않습니다.';
            exit;
        }else{
            echo '비밀번호를 암호화 처리<br>';
            $memberPw = $memberPw;
        }

        //전화번호 이름이 빈값이 아닌지
        if($tel == '' || $memberName == ''){
            echo '전화번호 혹은 이름의 값이 없습니다.';
            exit;
        }
    
        //이메일 주소가 올바른지
        $checkEmailAddress = filter_var($memberEmailAddress, FILTER_VALIDATE_EMAIL);

        if($checkEmailAddress != true){
            echo '<h1>올바른 이메일 주소가 아닙니다.</h1>';
            exit;
        }
        
        //이제부터 넣기 시작
        $sql = "INSERT INTO user_list(nick_name, user_password, user_email, user_phone, user_name, open_range, user_profile_url) 
        VALUES('$memberId','$memberPw','$memberEmailAddress','$tel','$memberName','$open_range','$profile')";
        echo '<h5>'.$sql.'</h5>';
        if($conn->query($sql)){
            echo '<h1>회원가입 성공</h1>';
        }
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

