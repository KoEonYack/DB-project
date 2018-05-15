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
    <article class="container">
    <br><br>
        <div class="page-header">
          <h1>회원가입</h1>
          <h2>중복체크: SELECT * FROM user_list WHERE nick_name = '{$memberId}'</h2>
          <h2>가입: INSERT INTO `user_list`(`nick_name`, `user_password`, `user_email`, `user_phone`, `user_name`) VALUES('{$memberId}','{$memberPw}','{$memberEmailAddress}','{$memberNickName}','{$memberName}')</h2>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form name="signUp" action="./memberSave.php" method="post" onsubmit="return checkSubmit()">
                <div class="form-group">
                    <label for="username">아이디</label>
                    <div class="input-group">
                        <input type="text" name="memberId" class="form-control" id="username" placeholder="아이디를 입력해 주세요">
                        <span class="input-group-btn">
                            <button class="btn btn-success" onclick="window.open('memberIdCheck.php','window_name','width=430,height=500,location=no,status=no,scrollbars=yes');">중복 확인</button>
                            <!-- <div class="memberIdComment comment"></div> -->
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">이름</label>
                    <input type="text" name="memberName" class="form-control" id="username" placeholder="이름을 입력해 주세요">
                </div>

                <div class="form-group">
                    <label for="InputPassword1">비밀번호</label>
                    <input type="password" name="memberPw" class="form-control" id="InputPassword1" placeholder="비밀번호">
                </div>                

                <div class="form-group">
                    <label for="InputPassword2">비밀번호 확인</label>
                    <input type="password" name="memberPw2" class="form-control" id="InputPassword2" placeholder="비밀번호 확인">
                    <p class="help-block">비밀번호 확인을 위해 다시한번 입력 해 주세요</p>
                    <div class="memberPw2Comment comment"></div>
                </div>

                <div class="form-group">
                    <label for="InputEmail">이메일 주소</label>
                    <input type="email" name="memberEmailAddress" class="form-control" id="InputEmail" placeholder="이메일 주소">
                    <div class="memberEmailAddressComment comment"></div>
                </div>

                <div class="form-group">
                    <label for="username">휴대폰 번호</label>
                    <input type="tel" name="tel" class="form-control" id="username" placeholder="- 없이 입력해 주세요">
                </div>

                <div class="form-group">
                    <label>약관 동의</label>
                    <div data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <span class="fa fa-check"></span>
                            <input id="agree" type="checkbox" autocomplete="off" checked>
                        </label>
                        <a href="#">이용약관</a>에 동의합니다.
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-info">회원가입<i class="fa fa-check spaceLeft"></i></button>
                    <button type="submit" class="btn btn-warning">가입취소<i class="fa fa-times spaceLeft"></i></button>
                </div>

                <div class="formCheck">
                    <input type="hidden" name="idCheck" class="idCheck" />
                    <input type="hidden" name="pw2Check" class="pwCheck2" />
                    <input type="hidden" name="eMailCheck" class="eMailCheck" />
                </div>
            </form>
        </div>
    </article>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>