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
            <a href="../button.html"><button type="button" class="btn btn-primary">Go To Main</button></a><br><br>
              <?php
                require('../db_connect.php');
                require('./include/session.php');
                echo "<h1> 처음 가입할 때, 평가하기 Insert  </h1>";
                global $conn; 
                $movie_id = $_POST['movie_id'];
                $movie_name = $_POST['movie_name'];
                $user_id = $_POST['user_id'];
                $user_name = $_POST['user_name'];
                $point = $_POST['point'];


                $sql = "INSERT INTO user_rating_list VALUES({$user_id},{$movie_id},{$point});";
                echo "<h4> User_rating_list에  추가: ".$sql."</h4>";

                echo "<h3>".$user_name."님의 User_rating_list에 ".$movie_name."에 대한 평점을 ".$point."점을 추가하였습니다.  </h3>";

                mysqli_query($conn,$sql);
              ?>
            <br>
        </div>
    </body>
</html>