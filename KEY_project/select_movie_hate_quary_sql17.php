<?php
    function movieClick(){
        if(isset($_GET['id'])){
            
            global $conn;
                   
            # require('../db_connect.php');
            $sql = "INSERT INTO user_hate_list VALUES (".$_SESSION['userlist_id'].",".$_GET['id'].")";
            $result = mysqli_query($conn, $sql);
            

            $sql1 = "SELECT movie_name FROM movie_list WHERE movie_id=".$_GET['id'];

            echo '<h4>'.$sql.'</h4>';
            $result = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($result);
            echo '<h5>'.$row["movie_name"].'을(를) 관심없어요에 담았습니다.</h5>';

            // echo '<h5>유저 ID : '.$row['userlist_id'].'</h5>';
            // echo '<h5>개봉국가 : '.$row['nation'].'</h5>';
        }
          else{
              echo "No input movie_id";
          }
        }
        

?>
