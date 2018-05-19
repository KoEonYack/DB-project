<?php
    // 본 영화리스트 출력하는 함수
    function movieSawNationList(){
      global $conn;
      echo '<br>';
      echo '<h2>SQL Table</h2>';
      echo '<p>싫어한다고 선택한 영화들입니다.</p>';

      $nation_sql = "SELECT DISTINCT nation FROM movie_list";
      echo '<p>'.$nation_sql.'</h4></p>';
      $nation_result = mysqli_query($conn, $nation_sql);
      while($nation = mysqli_fetch_array($nation_result)){
        echo '<button type="button" class="btn btn-default"><a href="hated_nation.php?id='
        .$nation["nation"].'"style="text-decoration:none; color:black;">'
        .$nation["nation"].'</a></button>';
        echo '  ';
        $n++;
      }
    }

    function nationClick(){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];
      echo "<br>";
      if(isset($_GET['id'])){
        $movie_nation_sql = "SELECT * FROM `movie_list` WHERE `movie_id` IN (SELECT `movie_id` FROM `user_hate_list` WHERE `userlist_id`= {$user_id}) AND `nation`= '{$_GET['id']}';";
        echo '<h5>'.$movie_nation_sql.'</h5>';
        $result = mysqli_query($conn, $movie_nation_sql);
        echo '<div class="list-group" style="display:inline-block;">';
        
        while($movie_nation=mysqli_fetch_array($result)){
          echo '<a href="./movie_info.php?id='
          .$movie_nation["movie_id"].'" class="list-group-item list-group-item-action" style="text-decoration:none; color:black;">'
          .$movie_nation["movie_name"].'</a>';  
        }
      }
    }
?>
