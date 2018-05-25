<?php
    require('../db_connect.php');
    // 본 영화리스트 출력하는 함수
    function movieSawList(){
      global $conn;
      $user_id = $_SESSION['userlist_id'];
      $user_sql = "SELECT movie_id FROM user_rating_list WHERE userlist_id={$user_id}";
      echo '<h1>'.$user_sql.'</h1>';
      echo '<br><h2>이제까지 본 영화들입니다.</h2><p>';
      $user_result = mysqli_query($conn, $user_sql);
      // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
      echo '<div class="list-group" style="display:inline-block;">';
      while($user = mysqli_fetch_array($user_result)){
        $movie_sql = "SELECT * FROM movie_list WHERE movie_id={$user['movie_id']};";
        $movie_result = mysqli_query($conn, $movie_sql);
        $movie = mysqli_fetch_array($movie_result);
        echo '<a href="../KEY_project/movie_info.php?id='
        .$movie["movie_id"].'" class="list-group-item list-group-item-action" style="text-decoration:none; color:black;">'
        .$movie["movie_name"].'</a>';
      }
      echo '</div>';
    }
?>
