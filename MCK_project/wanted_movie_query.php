<?php
    require('../db_connect.php');
    require('./include/session.php');

    // 본 영화리스트 출력하는 함수
    function wantMovieList(){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];
      $user_sql = "SELECT * FROM `movie_list` WHERE `movie_id` IN (SELECT `movie_id` FROM `user_want_list` WHERE `userlist_id`={$user_id})";
      echo '<br>';
      echo '<h4>'.$user_sql.'</h4>';
      echo '<h5>보고 싶다고 선택한 영화들입니다.</h5><p>';
      echo '<hr>';
      $movie_result = mysqli_query($conn, $user_sql);
      var_dump($movie_result); 
      echo '<div class="list-group" style="display:inline-block;">';
      while($movie = mysqli_fetch_array($movie_result)){
        echo $movie["movie_id"];
        echo '<a href="../KEY_project/movie_info.php?id='
        .$movie["movie_id"].'" class="list-group-item list-group-item-action" style="text-decoration:none; color:black;">'
        .$movie["movie_name"].'</a>';
      }
      echo '</div>';
    }
?>
