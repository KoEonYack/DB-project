<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <title> watcha main page </title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <script type="text/javascript" src="../js/mySignInForm.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="../css/mySignInForm.css" /> -->
</head>
<body>
    <div id="container">
        <div id="wrap">
            <div id="container"><br><br>
                <h1 class="title">왓차에 오신 것을 환영합니다.</h1>
                <h1> 로그인: SELECT * FROM user_list WHERE nick_name = '{$memberId}' AND user_password = '{$memberPw}'</h1>
                <hr><br>
                <form name="singIn" action="./signIn.php" method="post" onsubmit="return checkSubmit()">
                    <div class="line">
                        <div class="inputArea">
                            <p>아이디 
                        <input type="text" name="memberId" class="form-control" placeholder="아이디를 입력해주세요" /> </p>
                        </div>
                    </div>


                    <div class="line">
                        <div class="inputArea">
                            <p>비밀번호 <input type="password" name="memberPw"  class="form-control" placeholder="비밀번호를 입력해주세요"  /> </p>
                        </div>
                    </div>

                    <div class="line">
                        <input type="submit" value="로그인" class="form-control" />
                    </div>
                </form>
                <br><a href="./signUpForm.php"><button type="button" class="btn btn-primary">회원가입 하기</button></a>
            </div>
        </div>
    </div>
</body>
</html>