<?php
    require('../db_connect.php');
    // 본 영화리스트 출력하는 함수
    function movieSawList(){
      global $conn;
      $user_id = 1;
      $user_sql = "SELECT movie_id FROM user_rating_list WHERE userlist_id={$user_id}";
      echo '<h1>'.$user_sql.'</h1>';
      echo '<br><span style="font-size:35px"><보신 영화들입니다.></span><br>';
      $user_result = mysqli_query($conn, $user_sql);
      $n=0;
      // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
      while($user = mysqli_fetch_array($user_result)){
        $movie_sql = "SELECT * FROM movie_list WHERE movie_id={$user['movie_id']};";
        $movie_result = mysqli_query($conn, $movie_sql);
        $movie = mysqli_fetch_array($movie_result);
        echo '<span style="font-size:35px"><a href="movie_saw.php?id='
        .$movie["movie_id"].'"style="text-decoration:none; color:black;">'
        .$movie["movie_name"].'</a></span><br>';
      }
    }
?>
