<?php
    require('../db_connect.php');
    require('./include/session.php');
    // 영화리스트 출력하는 함수
    function notseenMovieList(){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];
        $sql = "SELECT * FROM movie_list WHERE `movie_id` NOT IN (SELECT `movie_id` FROM user_want_list WHERE `userlist_id` = $user_id)";

        $result = mysqli_query($conn, $sql);
        echo '<h1>'.$user_name.'님께서 로그인 중.</h1><p>';
        echo '<h1>평가하지 않은 영화들 :'.$sql.'</h1><p>';

        $n=0;
        // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
        echo "<p>";
        while($movie = mysqli_fetch_array($result)){
          echo '<button type="button" class="btn btn-default"><a href="hopeToSee_movie.php?id='
          .$movie['movie_id'].'" style="text-decoration:none; color:black;">'.$movie['movie_name'].'</a></button>';
          echo '  ';
          $n++;
          if($n%5===0) echo '</p><p>';
        }
    }

    // 사용자가 영화를 클릭했을 때
    function movieClick(){
      if(isset($_GET['id'])){
          global $conn;
          $sql = "INSERT INTO user_want_list VALUES (".$_SESSION['userlist_id'].",".$_GET['id'].")";
          $result = mysqli_query($conn, $sql);

          $sql1 = "SELECT movie_name FROM movie_list WHERE movie_id=".$_GET['id'];
          echo '<h4>'.$sql.'</h4>';
          $result = mysqli_query($conn, $sql1);
          $row = mysqli_fetch_array($result);
          echo '<h5>'.$row["movie_name"].'을(를) 보고싶어요에 담았습니다.</h5>';
      }
  }
?>
