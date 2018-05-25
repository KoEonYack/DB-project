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
        if(isset($_POST['name']) && isset($_POST['check'])){
          echo '<h4>'.$_POST['name'].'을 보고싶은 영화로'.$_POST['check'].'하셨습니다.. </h4>';
        }
    }

    // 사용자가 영화를 클릭했을 때
    function movieClick(){
      //id에 대해 GET으로 받은 변수가 존재할 때
        if(isset($_GET['id'])){
            global $conn;
            $user_name= $_SESSION['ses_userid'];
            $user_id = $_SESSION['userlist_id'];
            // 영화제목을 출력해야 하므로 가져온다.
            $sql = "SELECT movie_name FROM movie_list WHERE movie_id=".$_GET['id'];
            echo '<h4>영화제목 표시 : '.$sql.'</h4>';
            $result = mysqli_query($conn,$sql);
            $movie = mysqli_fetch_array($result);
            rateForm($user_id, $user_name, $_GET['id'], $movie['movie_name']);
      }
    }

    // 평가 형식
    function rateForm($user_id, $user_name, $movie_id, $movie_name){
        echo '<br><span style="font-size:35px"> '.$movie_name.'</span>';
        // hidden 타입은 보이지 않게 넘기는 값들.
        echo '<form action="./hopeToSee_Data.php" method="post">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-secondary">
            <input type="radio" name="check" value="hopeToSee" id="option2" autocomplete="off"> 보고 싶어요
          </label>
        </div>
        <input type="hidden" name="movie_id" value="'.$movie_id.'">
        <input type="hidden" name="user_id" value="'.$user_id.'">
        <input type="hidden" name="user_name" value="'.$user_name.'">
        <input type="hidden" name="movie_name" value="'.$movie_name.'">
        <br><input class="btn btn-primary" type="submit" value="보고 싶어요!">
        </form>';
    }
?>
