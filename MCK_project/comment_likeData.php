

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
                echo "<h1> insert user_want_list  </h1>";
                global $conn; 
                $comment_id = $_POST['comment_id'];
                $contents = $_POST['contents'];
                $user_id = $_POST['user_id'];
                $user_name = $_POST['user_name'];

                $sql = "INSERT INTO comment_like_list VALUES({$user_id},{$comment_id});";
                echo "<h4> comment_like_list에 추가: ".$sql."</h4>";
//                echo '<h1>: ddasdasdd '.$contents.'</h1>';

                
                echo "<h3>".$user_name."님께서 comment_like_list에 \"".$contents."\"에 좋아요를 누르셨습니다. </h3>";

                mysqli_query($conn, $sql);
              ?>
            <br>
        </div>
    </body>
</html>