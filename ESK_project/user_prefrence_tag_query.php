<?php
    require('../db_connect.php');

    // select tag_id from user_rating_list join movie_tag_list on user_rating_list.movie_id=movie_tag_list.movie_id where user_rating_list.userlist_id=1 and user_rating_list.star_rate>=4
    
    function showTag(){
      global $conn;
      $user_id = 1;
      // $user_name= $_SESSION['ses_userid'];
      // $user_id = $_SESSION['userlist_id'];
      $user_sql = "SELECT * FROM userlist WHERE userlist_id={$user_id}";
      echo '<h1>'.$user_sql.'</h1>';
      echo '<br><h2> 유저의 선호 태그 입니다. 평점 4.0 이상 준 영화를 기준으로 작성되었습니다. </h2><p>';
      // $user_result = mysqli_query($conn, $user_sql);
      $user = mysqli_query($conn, $user_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      // while($user = mysqli_fetch_array($user_result)){
        // $movie_sql = "SELECT * FROM user_rating_list WHERE userlist_id={$user['userlist_id']} AND star_rate>=4.0;";
        $movie_sql = "SELECT * FROM user_rating_list WHERE userlist_id={$user_id} AND star_rate>=4.0;";
        $movie_list = mysqli_query($conn, $movie_sql);
        while($movie = mysqli_fetch_array($movie_list)){
          $movie_tag_id_sql = "SELECT * FROM movie_tag_list WHERE movie_id={$movie['movie_id']};";
          $movie_tag_id_list = mysqli_query($conn, $movie_tag_id_sql);
          while($movie_tag_id = mysqli_fetch_array($movie_tag_id_list)){
            $tag_query = "SELECT * FROM tag_list WHERE tag_id={$movie_tag_id['tag_id']};";
            $tag = mysqli_query($conn, $tag_query);
            $t = mysqli_fetch_array($tag);
            echo ' '
            .$t["tag_name"]. ' ';
          }
        
        }
      // }
      echo '</div>';
    }
    
?>
