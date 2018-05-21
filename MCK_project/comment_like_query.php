<?php
    require('../db_connect.php');
    require('./include/session.php');
    // 영화리스트 출력하는 함수
    function commentList(){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];
        $sql = "SELECT * FROM movie_list" ;

        $result = mysqli_query($conn, $sql);
        echo '<h1>/"'.$user_name.'/"님께서 로그인 중.</h1><p>';
        echo '<h1> 영화 선택 :'.$sql.'</h1><p>';

        $n=0;
        // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
        echo "<p>";
        while($movie = mysqli_fetch_array($result)){
          echo '<button type="button" class="btn btn-default"><a href="comment_like.php?id='
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
            // 영화제목을 출력해야 하므로 가져온다.
            $sql = "SELECT * FROM comment_list WHERE movie_id=".$_GET['id'];
            echo '<h4>선택한 영화의 댓글 가져오기 : '.$sql.'</h4>';
            $result = mysqli_query($conn,$sql);

            echo "<p>";
            while($comment = mysqli_fetch_array($result)){
              echo '<button type="button" class="btn btn-default"><a href="comment_like.php?comment_id='
              .$comment['comment_id'].'" style="text-decoration:none; color:black;">'.$comment['contents'].'</a></button>';
              echo '  ';
              $n++;
              if($n%5===0) echo '</p><p>';
            }
        }
    }

    // 사용자가 영화를 클릭했을 때
    function commentClick(){
      //id에 대해 GET으로 받은 변수가 존재할 때
        if(isset($_GET['comment_id'])){
            global $conn;
            $user_name= $_SESSION['ses_userid'];
            $user_id = $_SESSION['userlist_id'];
            // 댓글을 출력해야 하므로 가져온다.
            $sql = "SELECT * FROM comment_list WHERE comment_id=".$_GET['comment_id'];
//            echo '<h4>선택한 영화의 댓글 가져오기 : '.$sql.'</h4>';
            $result = mysqli_query($conn,$sql);
            $comment = mysqli_fetch_array($result);
            
//            echo '<h1>: asdfnsadkj '.$comment['contents'].'</h1>';

            Form($user_id, $user_name, $_GET['comment_id'], $comment['contents']);
      }
    }

    // 평가 형식
    function Form($user_id, $user_name, $comment_id, $contents){
        echo '<br><span style="font-size:35px"> '.$movie_name.'</span>';
        // hidden 타입은 보이지 않게 넘기는 값들.
        echo '<h1>'.$contents.'</h1>';

        echo '<form action="./comment_likeData.php" method="post">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-secondary">
            <input type="radio" name="check" value="like" id="option2" autocomplete="off"> 좋아요.
          </label>
        </div>
        <input type="hidden" name="user_id" value="'.$user_id.'">
        <input type="hidden" name="user_name" value="'.$user_name.'">
        <input type="hidden" name="comment_id" value="'.$comment_id.'">
        <input type="hidden" name="contents" value="'.$contents.'">
        <br><input class="btn btn-primary" type="submit" value="좋아요.!">
        </form>';
    }
?>
