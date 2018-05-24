<?php
    require('../db_connect.php');
    // require('./include/session.php');
    // 영화리스트 출력하는 함수
    function movieList(){
        global $conn;
        $sql = "SELECT * from movie_list ";
        $result = mysqli_query($conn, $sql);
        echo '<h1>/"'.$_SESSION['ses_userid'].'/"원하는 영화의 코멘트 보기.</h1><p>';
        echo '<h1>:'.$sql.'</h1><p>';

        $n=0;
        // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
        echo "<p>";
        while($movie = mysqli_fetch_array($result)){
          echo '<button type="button" class="btn btn-default"><a href="write_comment.php?movie_id='
          .$movie['movie_id'].'" style="text-decoration:none; color:black;">'.$movie['movie_name'].'</a></button>';
          echo '  ';
          $n++;
          if($n%5===0) echo '</p><p>';
        }
        if(isset($_POST['name']) && isset($_POST['point'])){
          echo '<h4>'.$_POST['name'].'을 '.$_POST['point'].'점으로 평가하셨습니다!</h4>';
        }
    }

    // 사용자가 영화를 클릭했을 때
    function movieClick(){
      //id에 대해 GET으로 받은 변수가 존재할 때
        if(isset($_GET['movie_id'])){
            global $conn;
            $user_name= $_SESSION['ses_userid'];
            $user_id = $_SESSION['userlist_id'];


            // 영화제목을 출력해야 하므로 가져온다.
            $sql = "SELECT movie_name FROM movie_list WHERE movie_id=".$_GET['movie_id'];
            echo '영화제목 표시 : '.$sql.'<p>';
            $result = mysqli_query($conn,$sql);
            $movie = mysqli_fetch_array($result);

            rateForm($user_id, $user_name, $_GET['id'],$movie['movie_name'],'new_rating');
      }
    }

    // 평가 형식
    function rateForm($user_id, $user_name, $movie_id, $movie_name,$rating_type){
        echo '<br><span style="font-size:35px"> '.$movie_name.'</span>';
           // 영화제목을 출력해야 하므로 가져온다.
          $sql = "SELECT * FROM comment_list WHERE movie_id=".$_GET['movie_id'];
          echo '<p>댓글 표시 : '.$sql.'</p>';
          $result = mysqli_query($conn,$sql);
          //  $comment = mysqli_fetch_array($result);
          while($comment = mysqli_fetch_array($result)){
            echo '<p>content : ' . $comment["contents"]. '</p>';
          }
          

          // $comment_sql = "SELECT * FROM comment_list WHERE movie_id=".$_GET['movie_id'];
          // $comment_result = mysqli_query($conn, $comment_sql);
          // echo '<div class="list-group" style="display:inline-block;">';
          // while($comment = mysqli_fetch_array($comment_result)){
          //   echo '<p> comment : ' 
          //   .$comment["contents"]. ' writing time : '
          //   .$comment["writing_time"].'</p>';
    
          // }
          // echo '</div>';

        // hidden 타입은 보이지 않게 넘기는 값들.
        // echo '<form action="./write_comment_data.php" method="post">
        // <div class="btn-group" data-toggle="buttons">
        //   <label class="btn btn-secondary active">
        //     <input type="radio" name="point" value="1.0" id="option1" autocomplete="off" checked> 1점
        //   </label>
        //   <label class="btn btn-secondary">
        //     <input type="radio" name="point" value="2.0" id="option2" autocomplete="off"> 2점
        //   </label>
        //   <label class="btn btn-secondary">
        //     <input type="radio" name="point" value="3.0" id="option3" autocomplete="off"> 3점
        //   </label>
        //   <label class="btn btn-secondary">
        //     <input type="radio" name="point" value="4.0" id="option3" autocomplete="off"> 4점
        //   </label>
        //   <label class="btn btn-secondary">
        //     <input type="radio" name="point" value="5.0" id="option3" autocomplete="off"> 5점
        //   </label>
        // </div>
        // <input type="hidden" name="movie_id" value="'.$movie_id.'">
        // <input type="hidden" name="user_id" value="'.$user_id.'">
        // <input type="hidden" name="user_name" value="'.$user_name.'">
        // <input type="hidden" name="movie_name" value="'.$movie_name.'">
        // <br><input class="btn btn-primary" type="submit" value="평가">
        // </form>';
    }
?>
