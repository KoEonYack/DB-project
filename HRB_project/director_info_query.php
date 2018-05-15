<?php
    require('../db_connect.php');
    function directorClick(){
      if(isset($_GET['id'])){
        global $conn;
        $sql = "SELECT * FROM director_list WHERE director_id=".$_GET['id'];
        echo '<h4>'.$sql.'</h4><hr><br>';
        $result = mysqli_query($conn,$sql);
        $director = mysqli_fetch_array($result);

        $movie_sql = 
        "SELECT m.movie_name FROM movie_list m 
        LEFT JOIN movie_director_list md ON m.movie_id=md.movie_id
        WHERE md.director_id=".$_GET['id'];

        $result = mysqli_query($conn, $movie_sql);
        $movie = mysqli_fetch_array($result);

        echo '<h5>이름 : '.$director['director_name'].'</h5>';
        echo '<h5>나이 : '.$director['director_age'].'</h5>';
        echo '<h5>작품 : '.$movie['movie_name'].'</h5>';
        echo '<br><img src="'.$director['photo_url'].'" width="200px">';
      }
    }

    function directorList(){
      global $conn;
      $sql = "SELECT * FROM director_list";
      echo '<h4>'.$sql.'</h4>';
      $result = mysqli_query($conn, $sql);
      $n=0;
      echo "<p>";
      while($director = mysqli_fetch_array($result)){
        echo '<button type="button" class="btn btn-default"><a href="director_info.php?id='
        .$director['director_id'].'" style="text-decoration:none; color:black;">'.$director['director_name'].'</a></button>';
        echo '  ';
        $n++;
        if($n%8===0) echo '</p><p>';
      }
    }
?>
