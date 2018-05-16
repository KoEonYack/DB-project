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
        <p>When the user presses the "Expected Release" button, movies scheduled for release are displayed.
        <br>
        SELECT * FROM movie_list WHERE release_date > 2018;
        </p>

        <?php
            require('../db_connect.php');
            $result = mysqli_query($conn, "SELECT * FROM movie_list WHERE release_date > 2018");

           echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
           # echo "<table class='table table-hover' >";

            echo "<tr><th style='text-align:center;'>Movie ID</th><th style='text-align:center;'>Movie Title</th><th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>    </tr>";

            while( $row = mysqli_fetch_array($result) ){  
                $id = $row["movie_id"]; 
                $title = $row["movie_name"];
                $content = $row["english_name"];
                $date = $row["release_date"];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$id."</td>  <td>".$title."</td>  <td>".$content."</td>  <td>".$date."</td>  </tr>";
            }
            echo "</table>";

            mysqli_close($conn);
        ?>
        
        <a href="../button.html"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>