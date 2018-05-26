<?php
    require('../db_connect.php');
    require('./include/session.php');

    function button_changePW(){
      echo '<button type="button" class="btn btn-default"><a href="updateUserPassWord.php?id="ok" 
      style="text-decoration:none; color:black;">미소지기님의 비밀번호를 \'명철 123\'으로 변경할께요.</a></button>';
    }    
    function change_password(){
      global $conn;

      echo '<br><span style="font-size:35px">< Update 미소지기\'s password></span><br>';
      $miso_sql = "SELECT user_password FROM user_list WHERE nick_name = '미소지기'";

      echo '<h4> 미소지기님의 현재 비밀번호를 확인하자:'.$miso_sql.'</h4><hr>';
      $miso_result = mysqli_query($conn, $miso_sql);
      $miso = mysqli_fetch_array($miso_result);
      echo '<br><h4> 미소지기님의 현재 비밀번호:'.$miso['user_password'].'</h4>';

      if(isset($_GET['id'])){
        $UPDATE_sql = "UPDATE user_list SET user_password = '명철123' WHERE nick_name = '미소지기'";

        echo '<br><h4>미소지기님의 비밀번호를 \'명철123\'으로 변경하기</br>: '.$UPDATE_sql.'</h4>';
        mysqli_query($conn, $UPDATE_sql);
        echo "<br><h4>실행완료</h4>";
      }
    }
?>
