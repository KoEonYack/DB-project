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
        <div class="container"><br><br>
            <h2>SQL Table</h2>
            <p>유저는 싫어하는 영화를 추가할 수 있다. 
            <br>
                STEP1. SELECT * FROM movie_list;
            </p> <hr>
            
            <?php
                echo "<p>";
                require('../db_connect.php');
                # require('./select_movie_hate_sql17.php');
                $movie_result = mysqli_query($conn, "SELECT * FROM movie_list");
                $n = 0;
                while($movie = mysqli_fetch_array($movie_result)){
                  echo '<button type="button"  class="btn btn-default">
                  <span style="font-size:20px">
                  <a href="movie_info.php?id='
                  .$movie["movie_id"].'
                  "style="text-decoration:none; color:black;">'
                  .$movie["movie_name"].'</a></span></button>  ';
                  $n++;
                  if($n%5===0) echo '</p><p>';
                }
                # movieClick();
            ?>
            
            <br><a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>