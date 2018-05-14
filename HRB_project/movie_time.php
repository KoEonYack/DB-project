<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
</head>
<body>
        <h1><a href="../button.html">메인으로</a></h1>
        <!-- 쿼리가 짧아서 그냥 여기다 씀-->
        <?php
            require('../db_connect.php');
            global $conn;
            $sql = "SELECT SUM(running_time) AS time_sum FROM movie_list
            LEFT JOIN user_rating_list
            ON movie_list.movie_id=user_rating_list.movie_id";
            echo '<h1>'.$sql.'</h1>';

            $result = mysqli_query($conn, $sql);
            $time = mysqli_fetch_array($result);
            echo '<span style="font-size:35px">영화를 본 총 시간은 :
            '.$time['time_sum'].' 시간 입니다.</span>';
        ?>
</body>
</html>
