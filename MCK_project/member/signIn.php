
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>     
    </head>
    <body>
        <div class="container"><br><br>
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
                        $_SESSION['userlist_id']= $row['userlist_id'];
                        
                        echo "<script>alert('로그인 성공');
                            history.back();
                            history.back();
                            </script>
                        ";
                        $userlist_id = $row['userlist_id'];
                        $sql = "INSERT INTO user_log_list2 VALUES($userlist_id, NOW())";
                        
                        mysqli_query($conn,$sql);

                        header("HTTP/1.1 307 Temporary move"); 
                        header("Location: ../../button.php");
                        exit;

                        # echo '<h1>'.$_SESSION['ses_userid'].'님 안녕하세요 watcha입니다. </h1>';
                        # echo '<a href="../../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a><br><br>';
                        # echo '<a href="./signOut.php"><button type="button" class="btn btn-primary">로그아웃</button></a>';
                    }
                    else{
                        echo "<script>alert('로그인 실패 아이디와 비밀번호가 일치하지 않습니다.');
                        history.back();</script>
                        ";
                    }
            ?>
            <br>
        </div>
    </body>
</html>





