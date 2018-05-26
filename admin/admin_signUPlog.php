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


        <?php
            require('../db_connect.php');
            echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
           # echo "<table class='table table-hover' >";

            echo "<tr><th style='text-align:center;'>userlist_id</th><th style='text-align:center;'>signup_time</th>
            </tr>";

            /*CREATE TRIGGER signup_log AFTER INSERT ON user_list
            FOR EACH ROW
            BEGIN
            INSERT INTO user_log_list SELECT userlist_id,NOW() FROM user_list ORDER BY userlist_id DESC LIMIT 1;
            END$$*/

            $result = mysqli_query($conn, "SELECT * FROM user_log_list");
            $rank = 1;
            while( $row = mysqli_fetch_array($result) ){  
                $user = $row['userlist_id'];
                $time = $row['signup_time'];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$user."</td>  <td>".$time."</td></tr>";
                $rank++;
            }
            echo "</table>";
        ?>
        
        <a href="./admin.php"><button type="button" class="btn btn-primary">Back</button></a>
        <br>
        </div>

    </body>
</html>