<!DOCTYPE html>
<html lang="ko">
<head>
  <title>DB SQL project</title>
  <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
    <body>
        <?php     
            session_start();
            $session_id = $_SESSION['userlist_id'];
            # echo $session_id;
            if(!isset($_SESSION['ses_userid'])){
                echo
                '<script>
                    alert("로그인을 해주세요");
                    document.location.href="../button.php"; 
                </script>';
                
            }
        ?>

        <div class="container"><br><br>
        <h2>SQL Senario</h2>
        <p>유저는 다른 유저를 검색할 수 있다.</p>
        <hr>
            <form role="form" action="serarch_user_sql20_1.php" method="POST"  > 
                <div class="form-group"> 
                    <label for="username">유저 검색</label> 
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name"> 
                </div> 

                <button type="submit" class="btn btn-default">검색</button>
                <p align="right">
                <a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
                </p>
            </form>

            
        </div>
    </body>
</html>