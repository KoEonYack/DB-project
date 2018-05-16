<?php
  require('../db_connect.php');
  echo "<h1> in the insert rating date </h1>";
  global $conn; 
  $point = $_POST['point'];
  $movie_id = $_POST['movie'];
  $user_id = $_POST['user'];
  $type = $_POST['type'];

  $sql = "INSERT INTO user_rating_list VALUES({$user_id},{$movie_id},{$point});";
  echo $sql;

  mysqli_query($conn,$sql);

  // Redirect 할 때 POST 값을 그대로 전송
  header("HTTP/1.1 307 Temporary move"); 
  header("Location: ./initial_rating.php");
  exit;
?>
