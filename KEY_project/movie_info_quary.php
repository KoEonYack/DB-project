<?php
    function movieClick(){



        if(isset($_GET['id'])){
            global $conn;
            // $sql = "SELECT * FROM movie_list WHERE movie_id=".$_GET['id'];
/*
            $sql = "SELECT MV.movie_name, MV.english_name, AW.award_name FROM movie_list AS MV 
            INNER JOIN award_list AS AW ON MV.award_id = AW.award_id
            WHERE movie_id="'.$_GET['id']';
 */
            $sql = "SELECT * FROM movie_list WHERE movie_id=".$_GET['id'];

            echo '<h4>'.$sql.'</h4>';
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            echo '<br><h5> 제목 : '.$row['movie_name'].'<h5>';
            echo '<small"'.$row['english_name'].'"<small>';
            echo '<h5>개봉년도 : '.$row['release_date'].'</h5>';
            echo '<h5>개봉국가 : '.$row['nation'].'</h5>';
            echo '<h5>사이트 주소 : '.$row['site_url'].'</h5>';
            echo '<h5>제작 비용 : '.$row['budget'].'</h5>';
            echo '<h5>수입 : '.$row['revenue'].'</h5>';
            echo '<h5>언어 : '.$row['language'].'</h5>';
            echo '<h5>상영등급 : '.$row['rating_certification'].'</h5>';
            echo '<h5>상영시간 : '.$row['running_time'].'</h5>';
            echo '<h5>누적 관객수 : '.$row['cumulative_audience'].'</h5>';
            echo '<h5>예매율 : '.$row['advance_rate'].'</h5>';
            echo '<h5>제작사 : '.$row['studio_name'].'</h5>';
            echo '<h5>작가 : '.$row['author'].'</h5>';
            echo '<p>영화 상세 설명 : '.$row['summary'].'</p>'; 
            
            $sql = "SELECT award_name FROM award_list a 
            INNER JOIN (SELECT award_id FROM movie_award_list WHERE movie_id=".$_GET['id'].") AS ma ON a.award_id=ma.award_id";
            echo '<h5>'.$sql.'<h5>';
            $result = mysqli_query($conn, $sql);
            echo '<h5>수상작 : ';
            while($row = mysqli_fetch_array($result))
                echo $row['award_name'].' | ';
            echo '</h5>';

            $sql = "SELECT tag_name FROM tag_list t 
            INNER JOIN (SELECT tag_id FROM movie_tag_list WHERE movie_id=".$_GET['id'].") AS mt ON t.tag_id=mt.tag_id";
            echo '<h5>'.$sql.'<h5>';
            $result = mysqli_query($conn, $sql);
            echo '<h5>태그 : ';
            while($row = mysqli_fetch_array($result))
                echo $row['tag_name'].' | ';
            echo '</h5>';

            $sql = "SELECT genre_name FROM genre_list g 
            INNER JOIN (SELECT genre_id FROM movie_genre_list WHERE movie_id=".$_GET['id'].") AS mg ON g.genre_id=mg.genre_id";
            echo '<h5>'.$sql.'<h5>';
            $result = mysqli_query($conn, $sql);
            echo '<h5>장르 : ';
            while($row = mysqli_fetch_array($result))
                echo $row['genre_name'].' | ';
            echo '</h5>';

            $sql = "SELECT actor_name FROM actor_list ac 
            INNER JOIN (SELECT actor_id FROM movie_actor_list WHERE movie_id=".$_GET['id'].") AS mac ON ac.actor_id=mac.actor_id";
            echo '<h5>'.$sql.'<h5>';
            $result = mysqli_query($conn, $sql);
            echo '<h5>출연배우 : ';
            while($row = mysqli_fetch_array($result))
                echo $row['actor_name'].' | ';
            echo '</h5>';
        }
          else{
              echo "Error :: invaild id";
          }
        }
        
        /*
        if(isset($_GET['id'])){
          global $conn;
          $sql = "SELECT * FROM movie_list WHERE movie_id=".$_GET['id'];
          echo '<h4>'.$sql.'</h4>';
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result);
          echo '<br><h5> 제목 : '.$row['movie_name'].'<h5>';
          echo '<small"'.$row['english_name'].'"<small>';
          echo '<h5>개봉년도 : '.$row['release_date'].'</h5>';
          echo '<h5>개봉국가 : '.$row['nation'].'</h5>';
          echo '<h5>사이트 주소 : '.$row['site_url'].'</h5>';
          echo '<h5>제작 비용 : '.$row['budget'].'</h5>';
          echo '<h5>수입 : '.$row['revenue'].'</h5>';
          echo '<h5>언어 : '.$row['language'].'</h5>';
          echo '<h5>상영등급 : '.$row['rating_certification'].'</h5>';
          echo '<h5>상영시간 : '.$row['running_time'].'</h5>';
          echo '<h5>누적 관객수 : '.$row['cumulative_audience'].'</h5>';
          echo '<h5>예매율 : '.$row['advance_rate'].'</h5>';
          echo '<h5>제작사 : '.$row['studio_name'].'</h5>';
          echo '<h5>작가 : '.$row['author'].'</h5>';
          echo '<p>영화 상세 설명 : '.$row['summary'].'</p>';
        }
        else{
            echo "Error :: invaild id";
        }
      }
*/






?>
