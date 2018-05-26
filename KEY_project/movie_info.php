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
            <p>유저는 영화의 상세 정보를 볼 수 있다.
            <br>
            SELECT * FROM movie_list;
            </p> <hr>

            <?php
                echo "<p>";
                require('../db_connect.php');
                require('movie_info_quary.php');

                $movieAward_view_query = "CREATE View movieAward_view AS
                    SELECT award_name, ma.movie_id
                    FROM award_list AS a
                    INNER JOIN movie_award_list AS ma ON a.award_id=ma.movie_id
                    WHERE 1";
                $movieTag_view_query = "CREATE View movieTag_view AS
                    SELECT tag_name, ma.movie_id
                    FROM tag_list AS a
                    INNER JOIN movie_tag_list AS ma ON a.tag_id=ma.tag_id
                    WHERE 1";
                $movieGenre_view_query = "CREATE View movieGenre_view AS
                    SELECT genre_name, ma.movie_id
                    FROM genre_list AS a
                    INNER JOIN movie_genre_list AS ma ON a.genre_id=ma.genre_id
                    WHERE 1";
                $movieActor_view_query = "CREATE View movieActor_view AS
                    SELECT actor_name, ma.movie_id
                    FROM actor_list AS a
                    INNER JOIN movie_actor_list AS ma ON a.actor_id=ma.actor_id
                    WHERE 1";

                $result = mysqli_query($conn, $movieAward_view_query);
                echo '<h5>movie & award View 생성</br>'.$movieAward_view_query.'<h5>';
                // var_dump($result);

                $result = mysqli_query($conn, $movieTag_view_query);
                echo '<h5>movie & Tag View 생성</br>'.$movieTag_view_query.'<h5>';
                // var_dump($result);

                $result = mysqli_query($conn, $movieGenre_view_query);
                echo '<h5>movie & Genre View 생성</br>'.$movieGenre_view_query.'<h5>';
                // var_dump($result);

                $result = mysqli_query($conn, $movieActor_view_query);
                echo '<h5>movie & Actor View 생성</br>'.$movieActor_view_query.'<h5>';
                // var_dump($result);


                $movie_result = mysqli_query($conn, "SELECT * FROM movie_list");
                $n = 0;
                while($movie = mysqli_fetch_array($movie_result)){
                  echo '<button type="button"  class="btn btn-default">
                  <span style="font-size:20px">
                  <a href="movie_info.php?id='
                  .$movie["movie_id"].'
                  "style="text-decoration:none; color:black;">'
                  .$movie["movie_name"].'</a></span></button>  ';
                  $n++;
                  if($n%5===0) echo '</p><p>';
                }
                movieClick();

                $movieAward_view_query = "DROP VIEW movieAward_view";
                $movieTag_view_query = "DROP VIEW movieTag_view";
                $movieGenre_view_query = "DROP VIEW movieGenre_view";
                $movieActor_view_query = "DROP VIEW movieactor_view";

                $result=mysqli_query($conn, $movieAward_view_query);
                echo '<h5>movie & award View 삭제</br>'.$movieAward_view_query.'<h5>';
                // var_dump($result);

                $result=mysqli_query($conn, $movieTag_view_query);
                echo '<h5>movie & Tag View 삭제</br>'.$movieTag_view_query.'<h5>';
                // var_dump($result);

                $result=mysqli_query($conn, $movieGenre_view_query);
                echo '<h5>movie & Genre View 삭제</br>'.$movieGenre_view_query.'<h5>';
                // var_dump($result);

                $result=mysqli_query($conn, $movieActor_view_query);
                echo '<h5>movie & Actor View 삭제</br>'.$movieActor_view_query.'<h5>';
                // var_dump($result);


            ?>
            
            <br><a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>