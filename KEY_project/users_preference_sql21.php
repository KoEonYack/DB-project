<!DOCTYPE html>
<html lang="ko">
<head>
  <title>DB SQL project</title>
  <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
    <body>
        <?php     
            session_start();
            
            $session_id = $_SESSION['userlist_id'];
            # echo $session_id;
            if(!isset($_SESSION['ses_userid'])){
                echo
                '<script>
                    alert("로그인을 해주세요");
                    document.location.href="../button.php"; 
                </script>';
                
            }
        ?>

        <div class="container"><br><br>
        
        <?php require('../db_connect.php'); ?>

        <h2>SQL Senario</h2>
        <p>유저는 별점을 기준으로 선호 감독 / 장르 / 국가 / 배우를 알 수 있다.</p>
        <hr>

        <h4>선호하는 감독</h4>
        <p>SQL query : SELECT * FROM movie_director_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$user_id." AND star_rate>3.9) ml ON dl.movie_id=ml.movie_id
        INNER JOIN director_list gl ON gl.director_id = dl.director_id;</p>
        <hr>
    <?php

        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        # echo "<table class='table table-hover' >";

        echo "<tr>
        <th style='text-align:center;'>이름 이름</th>
        <th style='text-align:center;'>나이</th>
        <th style='text-align:center;'>프로필 사진</th>
        </tr>";
        $sql4 = "SELECT * FROM movie_director_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$session_id." AND star_rate>3.9) ml ON dl.movie_id=ml.movie_id
        INNER JOIN director_list gl ON gl.director_id = dl.director_id";

        $result_sql4= mysqli_query($conn, $sql4);
        while( $row1 = mysqli_fetch_array($result_sql4) ){  
            echo "<tr>  
            <td>".$row1['director_name']."</td>  
            <td>".$row1['director_age']."</td>  
            <td><image src=".$row1['photo_url']." width='80' height='90'></td>
            </tr>";
        }   
        echo "</table>";


    ?>

    <br><br><br>
    <h4>선호하는 장르</h4>
    <p>SQL query : SELECT * FROM movie_genre_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$user_id." AND star_rate>=4) ml ON dl.movie_id=ml.movie_id
        INNER JOIN genre_list gl ON gl.genre_id = dl.genre_id;</p>
    <hr>
    <?php
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr>
        <th style='text-align:center;'>선호하는 장르</th>
        </tr>";

        $sql5 = "SELECT * FROM movie_genre_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$session_id." AND star_rate>=4) ml ON dl.movie_id=ml.movie_id
        INNER JOIN genre_list gl ON gl.genre_id = dl.genre_id";

        $result_sql5 = mysqli_query($conn, $sql5);
        while( $row = mysqli_fetch_array($result_sql5) ){  
            echo "<tr>  
            <td>".$row['genre_name']."</td>  
            </tr>";
        }

        echo "</table>";
    ?>

    <br><br><br>
    <h4>선호하는 국가</h4>
    <p>SQL query : SELECT * FROM movie_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$session_id." AND star_rate>=4) ml ON dl.movie_id=ml.movie_id;</p>
    <hr>
    <?php
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr>
        <th style='text-align:center;'>국가</th>
        </tr>";


        $sql5 = "SELECT * FROM movie_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$session_id." AND star_rate>=4) ml ON dl.movie_id=ml.movie_id";

        $result_sql5 = mysqli_query($conn, $sql5);
        while( $row = mysqli_fetch_array($result_sql5) ){  
            echo "<tr>  
            <td>".$row['nation']."</td>  
            </tr>";
        }   

        echo "</table>";
    ?>

    <br><br><br>

    <h4>선호하는 배우</h4>
    <p>SQL query : SELECT * FROM movie_actor_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$session_id." AND star_rate>=4) ml ON dl.movie_id=ml.movie_id
        INNER JOIN actor_list gl ON gl.actor_id = dl.actor_id;</p>
    <hr>
    <?php
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr>
        <th style='text-align:center;'>이름</th>
        <th style='text-align:center;'>나이</th>
        <th style='text-align:center;'>성별</th>
        <th style='text-align:center;'>조연/주연</th>
        <th style='text-align:center;'>프로필 사진</th>
        </tr>";

        $sql5 = "SELECT * FROM movie_actor_list dl 
        INNER JOIN (SELECT movie_id FROM user_rating_list WHERE userlist_id=".$session_id." AND star_rate>=4) ml ON dl.movie_id=ml.movie_id
        INNER JOIN actor_list gl ON gl.actor_id = dl.actor_id";

        $result_sql5 = mysqli_query($conn, $sql5);
        while( $row = mysqli_fetch_array($result_sql5) ){  
            echo "<tr>  
            <td>".$row['actor_name']."</td>  
            <td>".$row['actor_age']."</td>  
            <td>".$row['actor_gender']."</td>
            <td>".$row['actor_type']."</td>
            <td><image src=".$row1['photo_url']." width='80' height='90'></td>
            </tr>";
        }
        echo "</table>";
    ?>

        <br>
        <a href="../button.php"><button type="button" class="btn btn-primary">Go To Menu</button></a>
        <br>

        </div>
    </body>
</html>