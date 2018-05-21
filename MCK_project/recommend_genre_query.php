<?php
    require('../db_connect.php');
    require('./include/session.php');

    // 본 영화리스트 출력하는 함수
    function recommendMovieGenreList(){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];

      echo '<br><span style="font-size:35px"><장르를 기준으로 추천하기></span><br>';
      $genre_sql = "SELECT C.genre_id, C.genre_name 
      FROM user_rating_list A 
      left JOIN movie_genre_list B on A.movie_id = B.movie_id 
      left JOIN genre_list C on B.genre_id = C.genre_id 
      WHERE userlist_id=$user_id and star_rate >3
      ";

      echo '<h4>사용자가 높게 평가한 영화들의 장르: '.$genre_sql.'</h4><hr>';
      $genre_result = mysqli_query($conn, $genre_sql);
      $n = 0;
      echo "<p>";

      while($genre = mysqli_fetch_array($genre_result)){
        $movie_genre_sql = 
        "SELECT DISTINCT C.movie_id, C.movie_name 
        FROM user_rating_list A 
        left JOIN movie_genre_list B on A.movie_id=B.movie_id 
        left JOIN movie_list C ON A.movie_id=C.movie_id 
        WHERE userlist_id != $user_id AND genre_id = '{$genre['genre_id']}' AND star_rate>4";

        echo '<br><h4>'.$user_name.'님께서 높게 평가한 장르 "'.$genre['genre_name'].'" 중에서 다른 사용자들이 높게 평가한 영화 </br>: '.$movie_genre_sql.'</h4>';
        $movie_genre_result = mysqli_query($conn, $movie_genre_sql);
        echo '<h3> 영화 장르 중 "'.$genre['genre_name'].'"를 선호하시는 고객님께 추천드리는 영화</h3>';
        while($movie_genre = mysqli_fetch_array($movie_genre_result)){
            echo '<h4><strong>"'.$movie_genre['movie_name'].'"</strong>을 추천드립니다. </h4>';
        }
        echo "<hr>";
      }
      echo "<hr>";
    }
?>
