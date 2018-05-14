<?php
    require('../db_connect.php');
    // 본 영화리스트 출력하는 함수
    function movieSawGenreList(){
      global $conn;
      echo '<br><span style="font-size:35px"><장르별로 보기></span><br>';
      $genre_sql = "SELECT * FROM genre_list";
      echo '<h1>'.$genre_sql.'</h1>';
      $genre_result = mysqli_query($conn, $genre_sql);
      $n = 0;
      while($genre = mysqli_fetch_array($genre_result)){
        echo '<button type="button"><span style="font-size:20px"><a href="movie_genre.php?id='
        .$genre["genre_id"].'"style="text-decoration:none; color:black;">'
        .$genre["genre_name"].'</a></span></button>&nbsp;&nbsp;&nbsp;';
        $n++;
        if($n%5===0) echo '<br><br>';
      }

      echo "<br>-------------------------------------------------------------<br>";
    }

    function genreClick(){
      global $conn;
      $user_id=1;
      if(isset($_GET['id'])){
        // 사용자가 본 영화의 genre_id를 뽑아내는 쿼리
        // user_rating_list와 movie_genre_list를 movie_id 기준으로 JOIN 시켜서 USER가 본 영화들이 어떤 장르에 속하는지 알아낸다.
        $movie_genre_sql =
        "SELECT u.movie_id,m.genre_id FROM user_rating_list u
        LEFT JOIN movie_genre_list m
        ON u.movie_id=m.movie_id
        WHERE u.userlist_id=1";

        echo '<h1>'.$movie_genre_sql.'</h1>';

        $movie_genre_result = mysqli_query($conn, $movie_genre_sql);
        while($movie_genre = mysqli_fetch_array($movie_genre_result)){
          if($movie_genre['genre_id']===$_GET['id']){ 
            $movie_sql = "SELECT * FROM movie_list WHERE movie_id={$movie_genre['movie_id']};";
            echo '<h1>'.$movie_sql.'</h1>';
            $movie_result = mysqli_query($conn, $movie_sql);
            $movie = mysqli_fetch_array($movie_result);
            echo '<br><span style="font-size:35px"><a href="movie_saw.php?id='
            .$movie["movie_id"].'"style="text-decoration:none; color:black;">'
            .$movie["movie_name"].'</a></span><br>';
          }
        }
      }
    }
?>
