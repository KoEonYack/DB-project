<?php
    require('../db_connect.php');
    // 본 영화리스트 출력하는 함수
    function movieSawNationList(){
      global $conn;
      echo '<br><span style="font-size:35px"><국가별로 보기></span><br>';
      echo '<h4>DISTINCT를 쓰는 이유는 국가가 많지 않기 때문에 영화와 국가 사이의 <br>aggregation table을 쓰지 않아서, 중복을 피하기 위함이다.';
      $nation_sql = "SELECT DISTINCT nation FROM movie_list";
      echo '<h4>'.$nation_sql.'</h4><hr>';
      $nation_result = mysqli_query($conn, $nation_sql);
      while($nation = mysqli_fetch_array($nation_result)){
        echo '<button type="button" class="btn btn-default"><a href="movie_nation.php?id='
        .$nation["nation"].'"style="text-decoration:none; color:black;">'
        .$nation["nation"].'</a></button>';
        echo '  ';
        $n++;
      }
    }

    function nationClick(){
      global $conn;
      $user_id=$_SESSION['userlist_id'];
      if(isset($_GET['id'])){
        $movie_nation_sql =
        "SELECT m.movie_id, movie_name FROM movie_list m
        INNER JOIN user_rating_list u
        ON m.movie_id=u.movie_id
        WHERE u.userlist_id={$user_id} AND m.nation='{$_GET['id']}';";
        echo '<h4>'.$movie_nation_sql.'</h4>';

        $result = mysqli_query($conn, $movie_nation_sql);
        echo '<div class="list-group" style="display:inline-block;">';
        while($movie_nation=mysqli_fetch_array($result)){
          echo '<a href="../KEY_project/movie_info.php?id='
          .$movie_nation["movie_id"].'" class="list-group-item list-group-item-action" style="text-decoration:none; color:black;">'
          .$movie_nation["movie_name"].'</a>';  
        }

      }
    }
?>
