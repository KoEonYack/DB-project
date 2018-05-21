<?php
    require('../db_connect.php');
    require('./include/session.php');

    // 본 영화리스트 출력하는 함수
    function recommendMovieNationList(){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];

      echo '<br><span style="font-size:35px"><국가를 기준으로 추천하기></span><br>';
      $nation_sql = "SELECT DISTINCT B.nation 
      FROM user_rating_list A 
      left JOIN movie_list B on A.movie_id = B.movie_id 
      WHERE userlist_id=1 and star_rate >3
      ";

      echo '<h4>사용자가 높게 평가한 영화들의 국가: '.$nation_sql.'</h4><hr>';
      $nation_result = mysqli_query($conn, $nation_sql);
      $n = 0;
      echo "<p>";

      while($nation = mysqli_fetch_array($nation_result)){
        $movie_nation_sql = 
        "SELECT DISTINCT B.movie_name 
        FROM user_rating_list A 
        left JOIN movie_list B on A.movie_id = B.movie_id 
        WHERE userlist_id!=1 and star_rate >4 and B.nation='{$nation['nation']}'
        ";

        echo '<br><h4>'.$user_name.'님께서 높게 평가한 영화의 국가 "'.$nation['nation'].'" 중에서 다른 사용자들이 높게 평가한 영화 </br>: '.$movie_nation_sql.'</h4>';
        $movie_nation_result = mysqli_query($conn, $movie_nation_sql);
        echo '<h3> 영화 국가 중 "'.$nation['nation'].'"를 선호하시는 고객님께 추천드리는 영화</h3>';
        while($movie_nation = mysqli_fetch_array($movie_nation_result)){
            echo '<h4><strong>"'.$movie_nation['movie_name'].'"</strong>을 추천드립니다. </h4>';
        }
        echo "<hr>";
      }
      echo "<hr>";
    }
?>
