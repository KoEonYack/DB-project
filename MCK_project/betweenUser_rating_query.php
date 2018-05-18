<?php
    require('../db_connect.php');
    require('./include/session.php');
    // 사용자들을 출력하는 함수
    function userList(){
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
        echo '<button type="button" class="btn btn-default"><a href="betweenUser_rating.php?id='
        .$registed_user["userlist_id"].'"style="text-decoration:none; color:black;">'
        .$registed_user["nick_name"].'</a></button>';
        echo '  ';
        $n++;
        if($n%5===0) echo '<p></p>';
      }

      echo "<hr>";
    }

    function userClick(){
      global $conn;
      $user_id=1;
      if(isset($_GET['id'])){
        // 다른 사용자의 정보를 보여줌
        // open range를 확인하여 사용자의 정보를 보여준다. 
        $search_user_sql = "SELECT * FROM `user_list` WHERE userlist_id = ".$_GET['id'];

        echo '<h4>'.$search_user_sql.'</h4><hr><br>';
        $result = mysqli_query($conn, $search_user_sql);
        $row = mysqli_fetch_array($result);

        if($row['open_range']=='none'){
            echo '<h3>공개를 원하지 않는 고객님이십니다.</h3>';
        }else{
            echo '<h5>이름 : '.$row['user_name'].'</h5>';
            echo '<h5>e-mail : '.$row['user_email'].'</h5>';
            echo '<h5>전화번호 : '.$row['user_phone'].'</h5>';
            echo '<h5>profile : '.$row['user_profile_url'].'</h5>';
        }   
        }
    }
?>
