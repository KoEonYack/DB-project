<?php
    require('../db_connect.php');
    require('./include/session.php');
    // 사용자들을 출력하는 함수
    function betweenUserList(){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];
      echo '<br><span style="font-size:35px"><가입한 사용자></span><br>';
      $user_sql = "SELECT * FROM user_list WHERE `userlist_id` != $user_id";
      echo '<h4>'.$user_sql.'</h4><hr>';
      $user_result = mysqli_query($conn, $user_sql);
      $n = 0;
      echo "<p>";
      while($registed_user = mysqli_fetch_array($user_result)){
        echo '<button type="button" class="btn btn-default"><a href="betweenUser_rating.php?name='.$registed_user["nick_name"].'&id='
        .$registed_user["userlist_id"].'"style="text-decoration:none; color:black;">'
        .$registed_user["nick_name"].'</a></button>';
        echo '  ';
        $n++;
        if($n%5===0) echo '<p></p>';
      }

      echo "<hr>";
    }

    function betweenUserClick(){
      global $conn;
      $user_name= $_SESSION['ses_userid'];
      $user_id = $_SESSION['userlist_id'];
      if(isset($_GET['id'])){
        // 다른 사용자의 정보를 보여줌
        // open range를 확인하여 사용자의 정보를 보여준다. 
        $between_user_sql = "SELECT *
        FROM (SELECT `userlist_id` AS a_UID, `movie_id` AS a_MID, `star_rate` AS a_rate FROM user_rating_list WHERE `userlist_id`=$user_id) A
        INNER JOIN (SELECT `userlist_id` AS b_UID, `movie_id` AS b_MID, `star_rate` AS b_rate FROM user_rating_list WHERE `userlist_id`={$_GET['id']}) B ON A.a_MID = B.b_MID";

        echo '<h4>'.$between_user_sql.'</h4>';
        $result = mysqli_query($conn, $between_user_sql);
        //var_dump($result);
        //echo "++++>".$result->num_rows;
        if($result->num_rows!=NULL){
            while($row = mysqli_fetch_array($result)){
                $diff=intval($row['a_rate'])-intval($row['b_rate']);
    
                $movie_sql = "SELECT * FROM movie_list WHERE `movie_id`=".$row['a_MID'];
                $movie_result = mysqli_query($conn, $movie_sql);
                $movie_rows = mysqli_fetch_array($movie_result);
                echo '<hr><br><h4>'.$movie_sql.'</h4>';
    
                if(abs($diff)>=3){
                    echo '<h2>평가가 갈린 영화: '.$movie_rows['movie_name'].'</h2>';
                    echo '<h5>'.$user_name.'님께서 '.$movie_rows['movie_name'].' 에 '.$row['a_rate'].'점을 주셨습니다. </h5>';
                    echo '<h5>'.$_GET['name'].'님께서 '.$movie_rows['movie_name'].' 에 '.$row['b_rate'].'점을 주셨습니다. </h5>';
                }
                elseif(abs($diff)<=1){
                    echo '<h2>평가가 유사한 영화: '.$movie_rows['movie_name'].'</h2>';
                    echo '<h5>'.$user_name.'님께서 '.$movie_rows['movie_name'].' 에 '.$row['a_rate'].'점을 주셨습니다. </h5>';
                    echo '<h5>'.$_GET['name'].'님께서 '.$movie_rows['movie_name'].' 에 '.$row['b_rate'].'점을 주셨습니다. </h5>';
                }
                else{
                    echo '<h2> 그저 그런 평가 ~ 영화는 같이 봤네요. </h2>';
                    echo '<h5>'.$user_name.'님께서 '.$movie_rows['movie_name'].' 에 '.$row['a_rate'].'점을 주셨습니다. </h5>';
                    echo '<h5>'.$_GET['name'].'님께서 '.$movie_rows['movie_name'].' 에 '.$row['b_rate'].'점을 주셨습니다. </h5>';
                }  
            }
        }
        else{
            echo '<h2> 같이 본 영화가 없습니다.</h2>';
        }
        echo '<hr><br>';
        }
    }
?>
