<?php
    require('../db_connect.php');
    function actorClick(){
      if(isset($_GET['id'])){
        global $conn;
        $sql = "SELECT * FROM actor_list WHERE actor_id=".$_GET['id'];
        echo '<h1>'.$sql.'</h1>';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        echo '<br><span style="font-size:35px">나이 : '.$row['actor_age'].'</span>';
        echo '<br><span style="font-size:35px">성별 : '.$row['actor_gender'].'</span>';
        echo '<br><span style="font-size:35px">역할 : '.$row['actor_type'].'</span><br>';
        echo '<br><img src="'.$row['photo_url'].'">';
      }
    }

    function actorList(){
      global $conn;
      $sql = "SELECT * FROM actor_list";
      echo '<h1>'.$sql.'</h1>';
      $result = mysqli_query($conn, $sql);
      $n=0;
      while($row = mysqli_fetch_array($result)){
        echo '<button type="button" class="btn btn-default"><a href="actor_info.php?id='
        .$row['actor_id'].'" style="text-decoration:none; color:black;">'.$row['actor_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n % 5 === 0) echo '<br>';
      }
    }
?>
