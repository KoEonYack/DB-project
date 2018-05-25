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
        <p>영화 Revenue ASC 순으로 정렬
        <br>
            SELECT * FROM movie_list ORDER BY revenue ASC
        </p>

        <?php
            require('../db_connect.php');
            $result = mysqli_query($conn, "SELECT * FROM movie_list ORDER BY revenue ASC");

           echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
           # echo "<table class='table table-hover' >";

            echo "<tr><th style='text-align:center;'>Rank</th><th style='text-align:center;'>Movie Title</th>
            <th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>
            <th style='text-align:center;'>Revenue</th>    
            </tr>";

            $rank = 1;
            while( $row = mysqli_fetch_array($result) ){  
                $title = $row["movie_name"];
                $content = $row["english_name"];
                $date = $row["release_date"];
                $revenue = $row["revenue"];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$rank."</td>  <td>".$title."</td>  <td>".$content."</td>  
                <td>".$date."</td> <td><strong>".number_format($revenue)."</strong></td>  </tr>";
                $rank++;
            }
            echo "</table>";

            mysqli_close($conn);
        ?>
        
        <a href="./admin.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
    </body>
</html>