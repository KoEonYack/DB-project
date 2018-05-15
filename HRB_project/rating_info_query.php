<?php
  require('../db_connect.php');
  global $conn; 
  $point = $_POST['point'];
  $movie_id = $_POST['movie'];
  $user_id = $_POST['user'];
  $type = $_POST['type'];

  if($type==='new_rating')
    $sql = "INSERT INTO user_rating_list VALUES({$user_id},{$movie_id},{$point});";
  else if($type==='re_rating')
    $sql = "UPDATE user_rating_list SET star_rate={$point} WHERE userlist_id={$user_id} AND movie_id={$movie_id}";

  echo $sql;

  mysqli_query($conn,$sql);

  // Redirect 할 때 POST 값을 그대로 전송
  header("HTTP/1.1 307 Temporary move"); 
  header("Location: ./movie_rating.php");
  exit;
?>
