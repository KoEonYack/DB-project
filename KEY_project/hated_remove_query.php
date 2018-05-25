<?php
    require('../db_connect.php');
    // 영화리스트 출력하는 함수
    function hatedMovieList(){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];
        $sql = "SELECT * FROM `movie_list` WHERE `movie_id` IN (SELECT `movie_id` FROM `user_hate_list` WHERE `userlist_id`={$user_id})";

        $result = mysqli_query($conn, $sql);
        echo '<h4>'.$user_name.'님께서 로그인 중.</h4><p>';
        echo '<h4>관심없어요 체크한 영화들<br>'.$sql.'</h4><p>';
        echo '<h4>관심없어요에서 삭제하고 싶으신 영화를 클릭해주세요!</h4>';
        $n=0;
        // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
        echo "<p>";
        while($movie = mysqli_fetch_array($result)){
          echo '<button type="button" class="btn btn-default"><a href="hated_remove.php?id='
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
            $sql = "DELETE FROM user_hate_list WHERE userlist_id={$_SESSION['userlist_id']} AND movie_id={$_GET['id']}";
            $result = mysqli_query($conn, $sql);
            $sql1 = "SELECT movie_name FROM movie_list WHERE movie_id=".$_GET['id'];
            echo '<h4>'.$sql.'</h4>';
            $result = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($result);
            echo '<h5>'.$row["movie_name"].'을(를) 관심없어요에서 삭제했습니다.</h5>';

            // echo '<h5>유저 ID : '.$row['userlist_id'].'</h5>';
            // echo '<h5>개봉국가 : '.$row['nation'].'</h5>';

        }
    }
?>
