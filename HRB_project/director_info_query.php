<?php
    require('../db_connect.php');
    function directorClick(){
      if(isset($_GET['id'])){
        global $conn;
        $sql = "SELECT * FROM director_list WHERE director_id=".$_GET['id'];
        echo '<h1>'.$sql.'</h1>';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        echo '<br><span style="font-size:35px">이름 : '.$row['director_name'].'</span>';
        echo '<br><span style="font-size:35px">나이 : '.$row['director_age'].'</span>';
        echo '<br><img src="'.$row['photo_url'].'">';
      }
    }

    function directorList(){
      global $conn;
      $sql = "SELECT * FROM director_list";
      echo '<h1>'.$sql.'</h1>';
      $result = mysqli_query($conn, $sql);
      $n=0;
      while($row = mysqli_fetch_array($result)){
        echo '<button type="button" class="btn btn-default"><a href="director_info.php?id='
        .$row['director_id'].'" style="text-decoration:none; color:black;">'.$row['director_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n % 5 === 0) echo '<br>';
      }
    }
?>
