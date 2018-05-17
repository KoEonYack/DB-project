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
            echo '<h5>수상작 : '.$row['award_name'].'</h5>'; 
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
