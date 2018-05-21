<?php
    require('../db_connect.php');
    // 팔로워를 출력하는 함수
    function showFollower(){
      global $conn;
      $user_id = 1;
      $user_sql = "SELECT * FROM follower_list WHERE userlist_id={$user_id}";
      echo '<h1>'.$user_sql.'</h1>';
      echo '<br><h2> 유저의 follower 입니다. </h2><p>';
      $user_result = mysqli_query($conn, $user_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      while($user = mysqli_fetch_array($user_result)){
        $follower_sql = "SELECT * FROM user_list WHERE userlist_id={$user['follower_id']};";
        $follower_result = mysqli_query($conn, $follower_sql);
        $follower = mysqli_fetch_array($follower_result);

        echo ' ' 
        .$follower["user_name"]. ' ';

      }
      echo '</div>';
    }
?>
