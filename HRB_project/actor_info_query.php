<?php
    require('../db_connect.php');
    function actorClick(){
      if(isset($_GET['id'])){
        global $conn;
        $sql = "SELECT * FROM actor_list WHERE actor_id=".$_GET['id'];
        echo "<hr>";
        echo '<h4>'.$sql.'</h4>';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        echo '<h5>나이 : '.$row['actor_age'].'</h5>';
        echo '<h5>성별 : '.$row['actor_gender'].'</h5>';
        echo '<h5>역할 : '.$row['actor_type'].'</h5>';
        echo '<br><img src="'.$row['photo_url'].'">';
      }
    }

    function actorList(){
      global $conn;
      $sql = "SELECT * FROM actor_list";
      echo '<h1>'.$sql.'</h1>';
      $result = mysqli_query($conn, $sql);
      $n=0;
      echo "<p>";
      while($row = mysqli_fetch_array($result)){
        
        echo '<button type="button" class="btn btn-default"><a href="actor_info.php?id='
        .$row['actor_id'].'" style="text-decoration:none; color:black;">'.$row['actor_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n%10===0) echo '</p><p>';
      }
      
    }
?>
