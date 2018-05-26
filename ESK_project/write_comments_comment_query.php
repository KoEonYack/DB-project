<?php
    require('../db_connect.php');
    // require('./include/session.php');
    // 영화리스트 출력하는 함수
    function movieList(){
        global $conn;
        $sql = "SELECT * from movie_list ";
        $result = mysqli_query($conn, $sql);
        echo '<h1>'.$_SESSION['ses_userid'].'님이 원하는 영화의 코멘트에 코멘트 달기</h1><p>';
        echo '<h1>:'.$sql.'</h1><p>';

        $n=0;
        // 영화이름과 링크를 연결, 링크는 매개변수 id로 보낸다.
        echo "<p>";
        while($movie = mysqli_fetch_array($result)){
          echo '<button type="button" class="btn btn-default"><a href="write_comments_comment.php?movie_id='
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
      if(isset($_GET['movie_id'])&&!isset($_GET['comment_id'])){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];


        // 영화제목을 출력해야 하므로 가져온다.
        $sql = "SELECT movie_name FROM movie_list WHERE movie_id=".$_GET['movie_id'];
        echo '영화제목 표시 : '.$sql.'<p>';
        $result = mysqli_query($conn,$sql);
        $movie = mysqli_fetch_array($result);

        echo '<br><span style="font-size:35px"> '.$movie["movie_name"].'</span>';
        // 영화제목을 출력해야 하므로 가져온다.
        $sql = "SELECT * FROM comment_list WHERE movie_id=".$_GET['movie_id'];
        echo '<p>댓글 표시 : '.$sql.'</p>';
        $result = mysqli_query($conn,$sql);
        //  $comment = mysqli_fetch_array($result);
        while($comment = mysqli_fetch_array($result)){
          echo '<a href="write_comments_comment.php?movie_id='.$_GET['movie_id'].'&comment_id='.$comment['comment_id'].'"><button type="button" class="btn btn-default">content : ' . $comment["contents"]. '</button></a><br>';
        }
      }
    } 

    function commentClick(){
      //commentid에 대해 GET으로 받은 변수가 존재할 때
      if(isset($_GET['comment_id'])){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];

        $sql = "SELECT * FROM comment_list WHERE comment_id=".$_GET['comment_id'];
        $result = mysqli_query($conn,$sql);

        while($comment = mysqli_fetch_array($result)){
          echo '<br><p>'.$comment['contents'].'의 대댓글</p>';
        }

        $sql = "SELECT * FROM comment_list WHERE parent_comment_id=".$_GET['comment_id'];
        echo '<br><p>대댓글 표시 : '.$sql.'</p>';
        $result = mysqli_query($conn,$sql);
        //  $comment = mysqli_fetch_array($result);
        while($comment = mysqli_fetch_array($result)){
          echo '<p>content : ' . $comment["contents"]. '</p>';
        }
      }
    }
    
    function writeComment(){
      if(isset($_GET['movie_id'])&&isset($_GET['comment_id'])){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];
        echo '
        
        <form role="form" action="write_comments_comment.php?movie_id='.$_GET['movie_id'].'&comment_id='.$_GET['comment_id'].'" method="POST"  > 
          <div class="form-group"> 
              <label for="comment">Write Comment </label> 
              <input type="text" class="form-control" id="comment" name="comment" placeholder="Write Comment"> 
          </div> 

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        ';

        writeCommentData();
      }
    }
    function Redirect($url, $permanent = false)
    {
      header('Location: ' . $url, true, $permanent ? 301 : 302);

      exit();
    }

    function writeCommentData(){
      if(isset($_POST['comment'])){
        global $conn;
        $user_name= $_SESSION['ses_userid'];
        $user_id = $_SESSION['userlist_id'];
        // $today= new Date().getTime();
        $today = date( 'Ymd', time() );
        $movie_id= $_GET['movie_id'];
        
        echo '
        <h2> '.$today.'일에 '.$_POST['comment'].'라는 대댓글을 '.$user_name.'님께서 작성하셨습니다. </h2>
        comment : '.$_POST['comment'].'
        user_id : '.$user_id.'
        movie_id : '.$_GET['movie_id'].'
        today : '.$today.'
        parent_comment_id : '.$_GET['comment_id'].'
        ';
        $sql = "INSERT INTO comment_list (`contents`,`userlist_id`,`movie_id`,`writing_time`,`parent_comment_id`) 
        VALUES('".$_POST['comment']."',".$user_id.",".$_GET['movie_id'].",".$today.",".$_GET['comment_id'].")";
        echo ' : '.$sql.'<p>';
        $result = mysqli_query($conn,$sql);

      }
    }
    
?>
