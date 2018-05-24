<?php
    require('../db_connect.php');
    function actorClick(){
      if(isset($_GET['id'])){
        global $conn;
        $actor_sql = "SELECT * FROM actor_list WHERE actor_id=".$_GET['id'];
        echo "<hr>";
        echo '<h4>'.$sql.'</h4>';
        $result = mysqli_query($conn,$actor_sql);
        $actor = mysqli_fetch_array($result);

        $movie_sql = 
        "SELECT m.movie_name FROM movie_list m 
        INNER JOIN movie_actor_list ma ON m.movie_id=ma.movie_id
        WHERE ma.actor_id=".$actor['actor_id'];

        $result = mysqli_query($conn, $movie_sql);
        $movie = mysqli_fetch_array($result);

        echo '<h5>이름 : '.$actor['actor_name'].'</h5>';
        echo '<h5>나이 : '.$actor['actor_age'].'</h5>';
        echo '<h5>성별 : '.$actor['actor_gender'].'</h5>';
        echo '<h5>역할 : '.$actor['actor_type'].'</h5>';
        echo '<h5>출연 : '.$movie['movie_name'].'</h5>';
        echo '<br><img src="'.$actor['photo_url'].'" width="200px"  >';
      }
    }

    function actorList(){
      global $conn;
      $sql = "SELECT * FROM actor_list";
      echo '<h1>'.$sql.'</h1>';
      $result = mysqli_query($conn, $sql);
      $n=0;
      echo "<p>";
      while($actor = mysqli_fetch_array($result)){
        
        echo '<button type="button" class="btn btn-default"><a href="actor_info.php?id='
        .$actor['actor_id'].'" style="text-decoration:none; color:black;">'.$actor['actor_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n%10===0) echo '</p><p>';
      }
      
    }
?>
