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
            <h2>관리자 페이지</h2>
            <p>관리자는 본 페이지에서 통계를 볼 수 있습니다.</p>
        <hr>
        <?php
            require('../db_connect.php');

            echo "<br>";

            $comment_count_query = "SELECT count(*) as user_counter FROM user_list"; 
            $result = mysqli_query($conn, $comment_count_query);
            $row = mysqli_fetch_array($result);
            $content = $row["user_counter"];
            echo "회원 가입한 수 : ".$content;

            echo "<br>";

            $movie_count_query = "SELECT count(*) as movie_counter FROM movie_list"; 
            $result = mysqli_query($conn, $movie_count_query);
            $row = mysqli_fetch_array($result);
            $content = $row["movie_counter"];
            echo "DB에 저장된 영화 수 : ".$content;
            
            echo "<br>";

            $movie_count_query = "SELECT AVG(revenue) as movie_rev FROM movie_list"; 
            $result = mysqli_query($conn, $movie_count_query);
            $row = mysqli_fetch_array($result);
            $content = $row["movie_rev"];
            echo "평균 영화 수익(10,000$): ".$content;

            echo "<br>";

            $movie_count_query = "SELECT MAX(revenue) as movie_rev FROM movie_list"; 
            $result = mysqli_query($conn, $movie_count_query);
            $row = mysqli_fetch_array($result);
            $content = $row["movie_rev"];
            echo "최대 영화 수익(\$달러): ".$content." $";

            echo "<br>";

            $movie_count_query = "SELECT MIN(revenue) as movie_rev FROM movie_list"; 
            $result = mysqli_query($conn, $movie_count_query);
            $row = mysqli_fetch_array($result);
            $content = $row["movie_rev"];
            echo "최저 영화 수익(\$달러): ".$content." $";

            echo "<br><br>";

        ?>

        <br>
        <h4> 더 자세한 관리 보기 </h4>
        <hr>
        <br><a href="./admin_revASC.php"><button type="button" class="btn btn-primary">영화 수익 낮은 순으로 보기</button></a>
        <a href="./admin_revASC.php"><button type="button" class="btn btn-primary">영화 수익 높은 순으로 보기</button></a>
        <a href="./admin_user_rating.php"><button type="button" class="btn btn-primary">사용자가 별점을 준 리스트</button></a>
        
        <br><br><br><br><br>
        <a href="../button.html"><button type="button" class="btn btn-success">Go To Index Page</button></a>
        </div>
    </body>
</html>