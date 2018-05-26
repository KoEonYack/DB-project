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
        <div class="container"><br><br>
            <h2>SQL Table</h2>
            <p>유저는 싫어하는 영화를 추가할 수 있다. 
            <br>
                STEP1. SELECT * FROM movie_list;
            </p> <hr>
            
            <?php
                require('../db_connect.php');
                session_start();
                if(!isset($_SESSION['ses_userid'])){
                    echo "<small>로그인을 해주세요</small>";
                }
                else{
                    echo "<h5> 안녕하세요 ", $_SESSION['ses_userid']  ,"님의 싫어하는 영화를 선택해주세요! </h5><br>";
                }

                echo "<p>";
                require('./select_movie_hate_quary_sql17.php');
                
                $sql1 = "SELECT * FROM movie_list WHERE movie_id
                NOT IN (SELECT movie_id FROM user_hate_list WHERE userlist_id = ".$_SESSION['userlist_id'].")";
    
                $movie_result = mysqli_query($conn, $sql1);
                $n = 0;
                while($movie = mysqli_fetch_array($movie_result)){
                    # $cp_movie_id = $movie["movie_id"];
                    # echo $cp_movie_id ;
                  echo '<button type="button"  class="btn btn-default">
                  <span style="font-size:20px">
                  <a href="select_movie_hate_sql17.php?id='
                  .$movie["movie_id"].'
                  "style="text-decoration:none; color:black;">'
                  .$movie["movie_name"].'</a></span></button>  ';
                  $n++;
                  if($n%5===0) echo '</p><p>';
                }
                movieClick();
            ?>
            
            <br><a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>