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
        SELECT * FROM movie_list WHERE release_date > 2018;
        </p>

        <?php
            require('../db_connect.php');
            $sql = "SELECT 
            UL.user_name,
            MV.nation,
            RL.star_rate
            FROM user_list AS UL INNER JOIN user_rating_list AS RL 
            ON UL.userlist_id = AW.userlist_id
            WHERE movie_id=".$_GET['id'];


            $result = mysqli_query($conn, "    ");




           echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
           # echo "<table class='table table-hover' >";

            echo "<tr><th style='text-align:center;'>Movie ID</th><th style='text-align:center;'>Movie Title</th>
            <th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>
            <th style='text-align:center;'>Revenue</th>    
            </tr>";

            while( $row = mysqli_fetch_array($result) ){  
                $id = $row["movie_id"]; 
                $title = $row["movie_name"];
                $content = $row["english_name"];
                $date = $row["release_date"];
                $revenue = $row["revenue"];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$id."</td>  <td>".$title."</td>  <td>".$content."</td>  <td>".$date."</td> <td>".$revenue."</td>  </tr>";
            }
            echo "</table>";

            mysqli_close($conn);
        ?>
        
        <a href="./admin.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
    </body>
</html>
