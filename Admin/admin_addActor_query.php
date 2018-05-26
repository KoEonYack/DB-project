<!DOCTYPE html>
<html lang="en">
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
    <div class="container">
        <h2>SQL Table</h2>

        <?php
            require('../db_connect.php');
            global $conn;
            
            $actor = $_POST['actorname'];
            $age = $_POST['actorage'];
            $gender = $_POST['actorgender'];
            $type = $_POST['actortype'];
            $photo = $_POST['actorphoto'];
            $movie_id = $_POST['movieid'];

            $start = "START TRANSACTION";
            $commit = "COMMIT";
            $rollback = "ROLLBOK";
            $actor_sql = "INSERT INTO actor_list (actor_name, actor_age, actor_gender, actor_type, photo_url) 
            VALUES ('{$actor}', '{$age}', '{$gender}', '{$type}', '{$photo}')";
            mysqli_query($conn, $sql);

            $movie_actor_sql = "INSERT INTO movie_actor_list SELECT $movie_id, actor_id FROM actor_list ORDER BY actor_id DESC LIMIT 1";

            try{
                $conn->query($start);

                $conn->query($actor_sql);
                $conn->query($movie_actor_sql);

                $conn->query($commit);
            }catch(Exception $e){
                $conn->query($rollback);
            }
            echo '<h5>새로운 배우를 추가할 때 어떤 영화에 출연하는지 같이 입력하여 보조테이블에 넣는 쿼리입니다.</h5>';

            $result = mysqli_query($conn, "SELECT movie_name FROM movie_list WHERE movie_id=$movie_id");
            $movie_name = mysqli_fetch_array($result);
            $movie_name = $movie_name['movie_name'];

            echo '<h5>'.$start.'</h5>';
            echo '<h5>'.$actor_sql.'</h5>';
            echo '<h5>'.$movie_actor_sql.'</h5>';
            echo '<h5>'.$commit.'</h5>';
            echo '<h5>배우 '.$actor.'을(를) '.$movie_name.'에 추가했습니다.</h5>';
    
        ?>
        
        <a href="./admin_addActor.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
    </body>
</html>