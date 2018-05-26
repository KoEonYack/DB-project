<?php
    require('../db_connect.php');
    // require('./include/session.php');
    // 팔로워를 출력하는 함수
    function showFollower(){
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];
      global $conn;

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
   
    function userList(){
      global $conn;
      $sql = "SELECT * from user_list ";
      $result = mysqli_query($conn, $sql);
      echo '<h1>'.$_SESSION['ses_userid'].'님이 팔로우할 유저 보기</h1><p>';
      echo '<h1>:'.$sql.'</h1><p>';

      $n=0;
      // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
      echo "<p>";
      while($user = mysqli_fetch_array($result)){
        echo '<button type="button" class="btn btn-default"><a href="user_follow_insert.php?following_id='
        .$user['userlist_id'].'" style="text-decoration:none; color:black;">'.$user['nick_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n%5===0) echo '</p><p>';
      }
  }

  // 사용자가 팔로우하고 싶은 사용자를 클릭했을 때
  function userClick(){
    //id에 대해 GET으로 받은 변수가 존재할 때
    if(isset($_GET['following_id'])){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];


      $sql = "INSERT INTO follower_list (`follower_id`,`userlist_id`) VALUES(".$user_id.",".$_GET['following_id'].")";
      echo ' : '.$sql.'<p>';
      $result = mysqli_query($conn,$sql);

      echo '<br><br><br>';
      $user_sql = "SELECT * FROM `follower_list` F INNER JOIN `user_list` U on F.`userlist_id` = U.`userlist_id` WHERE F.`follower_id`={$user_id}";
      echo '<br><h2>'.$user_name. ' 유저의 following list 입니다. </h2><p>';
      echo '<h4>'.$user_sql.'</h1>';
      $user_result = mysqli_query($conn, $user_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      while($user = mysqli_fetch_array($user_result)){
        echo ' ' 
        .$user["nick_name"]. ' ';
      }
      echo '</div>';
      echo '<br><br><br>';
      $user_sql = "SELECT * FROM `follower_list` F INNER JOIN `user_list` U on F.`follower_id` = U.`userlist_id` WHERE F.`userlist_id`={$user_id}";
      echo '<br><h2>'.$user_name. ' 유저의 follower list 입니다. </h2><p>';
      echo '<h4>'.$user_sql.'</h1>';
      $user_result = mysqli_query($conn, $user_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      while($user = mysqli_fetch_array($user_result)){
        echo ' ' 
        .$user["nick_name"]. ' ';
      }
      echo '</div>';
    }
  }

?>
