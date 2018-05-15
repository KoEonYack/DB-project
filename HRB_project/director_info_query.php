<?php
    require('../db_connect.php');
    function directorClick(){
      if(isset($_GET['id'])){
        global $conn;
        $sql = "SELECT * FROM director_list WHERE director_id=".$_GET['id'];
        echo '<h4>'.$sql.'</h4><hr><br>';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        echo '<h5>이름 : '.$row['director_name'].'</h5>';
        echo '<h5>나이 : '.$row['director_age'].'</h5>';
        echo '<br><img src="'.$row['photo_url'].'">';
      }
    }

    function directorList(){
      global $conn;
      $sql = "SELECT * FROM director_list";
      echo '<h4>'.$sql.'</h4>';
      $result = mysqli_query($conn, $sql);
      $n=0;
      echo "<p>";
      while($row = mysqli_fetch_array($result)){
        echo '<button type="button" class="btn btn-default"><a href="director_info.php?id='
        .$row['director_id'].'" style="text-decoration:none; color:black;">'.$row['director_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n%8===0) echo '</p><p>';
      }
    }
?>
