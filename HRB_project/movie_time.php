<!DOCTYPE html>
<html lang="ko">
<<<<<<< HEAD
<head>
    <meta charset="UTF-8">
</head>
<body>
        <h1><a href="../button.php">메인으로</a></h1>
        <!-- 쿼리가 짧아서 그냥 여기다 씀-->
        <?php
            require('../db_connect.php');
            global $conn;
            $sql = "SELECT SUM(running_time) AS time_sum FROM movie_list
            LEFT JOIN user_rating_list
            ON movie_list.movie_id=user_rating_list.movie_id";
            echo '<h1>'.$sql.'</h1>';
=======
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
                require('../db_connect.php');
                global $conn;
                $sql = "SELECT SUM(running_time) AS time_sum FROM movie_list
                LEFT JOIN user_rating_list
                ON movie_list.movie_id=user_rating_list.movie_id";
                echo '<h4>'.$sql.'</h4>';
>>>>>>> a9de26b4852d051dccc34da3c53afb67d847af7c

                $result = mysqli_query($conn, $sql);
                $time = mysqli_fetch_array($result);
                echo '<h4>영화를 본 총 시간은 :
                '.$time['time_sum'].' 시간 입니다.</h4>';
            ?>
            <br><br><a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>