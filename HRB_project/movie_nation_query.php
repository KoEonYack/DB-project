<?php
    require('/../db_connect.php');
    // 본 영화리스트 출력하는 함수
    function movieSawNationList(){
      global $conn;

      echo '<br><span style="font-size:35px"><국가별로 보기></span><br>';
      $nation_sql = "SELECT DISTINCT nation FROM movie_list";
      echo '<h1>'.$nation_sql.'</h1>';
      $nation_result = mysqli_query($conn, $nation_sql);
      $n = 0;
      while($nation = mysqli_fetch_array($nation_result)){
        echo '<button type="button"><span style="font-size:20px"><a href="movie_nation.php?id='
        .$nation["nation"].'"style="text-decoration:none; color:black;">'
        .$nation["nation"].'</a></span></button>&nbsp;&nbsp;&nbsp;';
        $n++;
        if($n%5===0) echo '<br><br>';
      }

      echo "<br>-------------------------------------------------------------<br>";
    }

    function nationClick(){
      global $conn;
      $user_id=1;
      if(isset($_GET['id'])){
        $movie_nation_sql =
        "SELECT m.movie_id, movie_name FROM movie_list m
        LEFT JOIN user_rating_list u
        ON m.movie_id=u.movie_id
        WHERE u.userlist_id={$user_id} AND m.nation='{$_GET['id']}';";
        echo '<h1>'.$movie_nation_sql.'</h1>';

        $result = mysqli_query($conn, $movie_nation_sql);
        while($movie_nation=mysqli_fetch_array($result)){
          echo '<br><span style="font-size:35px"><a href="movie_saw.php?id='
          .$movie_nation['movie_id'].'"style="text-decoration:none; color:black;">'
          .$movie_nation['movie_name'].'</a></span><br>';
        }

      }
    }
?>
