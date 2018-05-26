<?php
  require('../db_connect.php');

  // select tag_id from user_rating_list join movie_tag_list on user_rating_list.movie_id=movie_tag_list.movie_id where user_rating_list.userlist_id=1 and user_rating_list.star_rate>=4
  
  function showTag(){
    global $conn;
    $user_name= $_SESSION['ses_userid'];
    $user_id = $_SESSION['userlist_id'];

    $tag_sql = "SELECT tag_name FROM tag_list JOIN 
    (SELECT tag_id FROM user_rating_list JOIN movie_tag_list ON user_rating_list.movie_id=movie_tag_list.movie_id 
    WHERE user_rating_list.userlist_id=1 AND user_rating_list.star_rate>=4) tag_num ON tag_num.tag_id= tag_list.tag_id;";

    echo '<br><h1>'.$user_name. ' 유저의 선호 태그 입니다. 평점 4.0 이상 준 영화를 기준으로 작성되었습니다.  </h1><p>';
    echo '<h4>'.$tag_sql.'</h4>';

    $tag_list = mysqli_query($conn, $tag_sql);
    while($tag = mysqli_fetch_array($tag_list)){
      echo ' '
      .$tag["tag_name"]. ' ';

    }
    echo '</div>';
  }
    
?>
