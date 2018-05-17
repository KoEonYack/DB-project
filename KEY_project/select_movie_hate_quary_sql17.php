<?php
    function movieClick(){
        if(isset($_GET['id'])){
            global $conn;

            $sql = "SELECT MV.movie_name, MV.english_name,
            MV.release_date ,
            MV.nation ,
            MV.site_url ,
            MV.budget ,
            MV.revenue ,
            MV.language ,
            MV.rating_certification ,
            MV.advance_rate ,
            MV.studio_name,
            MV.cumulative_audience,
            MV.author,
            MV.running_time,
            MV.summary,
            AW.award_name FROM movie_list AS MV 
            INNER JOIN award_list AS AW ON MV.award_id = AW.award_id
            WHERE movie_id=".$_GET['id'];

            $sql = "INSERT INTO user_hate_list VALUES (".$movie['movie_id'].",".$_SESSION['userlist_id'].")";

            echo '<h4>'.$sql.'</h4>';
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo '<br><h5> 싫어하는 영화 ID : '.$row['movie_id'].'<h5>';
            echo '<h5>유저 ID : '.$row['userlist_id'].'</h5>';
            echo '<h5>개봉국가 : '.$row['nation'].'</h5>';

        }
          else{
              echo "Error :: invaild id";
          }
        }
        

?>
