<?php
    

    
    // 본 영화리스트 출력하는 함수
    function hateMovieList(){
      global $conn;

      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];

      $user_sql = "SELECT * FROM `movie_list` WHERE `movie_id` IN (SELECT `movie_id` FROM `user_hate_list` WHERE `userlist_id`={$user_id})";
      
      echo '<br>';
      echo '<h2>SQL Table</h2>';
      echo '<p>싫어한다고 선택한 영화들입니다.</p>';
      echo  '<p>'.$user_sql.'</p>';

      echo '<hr>';
      $movie_result = mysqli_query($conn, $user_sql);
      // var_dump($movie_result); 
      echo '<div class="list-group" style="display:inline-block;">';
/*
      while($movie = mysqli_fetch_array($movie_result)){
        
        echo $movie["movie_id"];
        echo '<a href="./KEY_project/movie_info.php?id='
        .$movie["movie_id"].'" class="list-group-item list-group-item-action" style="text-decoration:none; color:black;">'
        .$movie["movie_name"].'</a>';
        }
*/

        echo '<p>';
        while($movie = mysqli_fetch_array($movie_result)){
            echo '<button type="button"  class="btn btn-default">
            <span style="font-size:15px">
            <a href="movie_info.php?id='
            .$movie["movie_id"].'
            "style="text-decoration:none; color:black;">'
            .$movie["movie_name"].'</a></span></button>';
            $n++;
            echo "   ";
            if($n%5===0) echo '</p><p>';
          }
      
      echo '</div>';
    }
?>
