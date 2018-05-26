<?php
    require('../db_connect.php');
    // 팔로워를 출력하는 함수
    function showFollower(){
      global $conn;
      // $user_id = 1;
      $user_id = $_SESSION['userlist_id'];
      $user_name= $_SESSION['ses_userid'];
      $user_sql = "SELECT * FROM follower_list WHERE userlist_id={$user_id}";
      echo '<br><h2>'.$user_name. ' 유저의 following list 입니다. </h2><p>';
      echo '<h4>'.$user_sql.'</h1>';
      $user_result = mysqli_query($conn, $user_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      while($user = mysqli_fetch_array($user_result)){
        $following_sql = "SELECT * FROM user_list WHERE userlist_id={$user['follower_id']};";
        $following_result = mysqli_query($conn, $following_sql);
        $following = mysqli_fetch_array($following_result);

        echo ' ' 
        .$following["nick_name"]. ' ';

      }
      echo '</div>';
      echo '<br><br><br>';
      // $user_id = 1;
      $user_id = $_SESSION['userlist_id'];
      $user_name= $_SESSION['ses_userid'];
      $user_sql = "SELECT * FROM follower_list WHERE follower_id={$user_id}";
      echo '<br><h2>'.$user_name. ' 유저의 follower list 입니다. </h2><p>';
      echo '<h4>'.$user_sql.'</h1>';
      $user_result = mysqli_query($conn, $user_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      while($user = mysqli_fetch_array($user_result)){
        $follower_sql = "SELECT * FROM user_list WHERE userlist_id={$user['userlist_id']};";
        $follower_result = mysqli_query($conn, $follower_sql);
        $follower = mysqli_fetch_array($follower_result);

        echo ' ' 
        .$follower["nick_name"]. ' ';

      }
      echo '</div>';
    }
?>
