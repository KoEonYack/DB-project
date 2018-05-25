<?php
    require('../db_connect.php');
    // 팔로워를 출력하는 함수
    function showComment(){
      global $conn;

      $user_id = $_SESSION['userlist_id'];
      $user_name= $_SESSION['ses_userid'];
      $comment_sql = "SELECT * FROM comment_list WHERE userlist_id={$user_id} ORDER BY writing_time";
      echo '<h1>'.$comment_sql.'</h1>';
      // echo '<br><h2> 유저의 comment의 날짜별 정렬입니다. </h2><p>';
      echo '<br><h2>' .$user_name.'유저의 날짜별 댓글입니다. </h2><p>';
      $comment_result = mysqli_query($conn, $comment_sql);
      echo '<div class="list-group" style="display:inline-block;">';
      while($comment = mysqli_fetch_array($comment_result)){
        echo '<p> comment : ' 
        .$comment["contents"]. ' writing time : '
        .$comment["writing_time"].'</p>';

      }
      echo '</div>';
    }
?>
