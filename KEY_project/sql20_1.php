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
        <div class="container"><br><br>
            <?php 
                # $user = $_POST['username'];

                require('../db_connect.php');
                $result = mysqli_query($conn, "SELECT * FROM user_list");
    
               echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
               # echo "<table class='table table-hover' >";
    
                echo 
                "
                <tr>
                <th style='text-align:center;'>Name</th>
                <th style='text-align:center;'>Nick name</th>
                <th style='text-align:center;'>Email</th>
                <th style='text-align:center;'>Phone</th>
                <th style='text-align:center;'>profile url</th>
                </tr>";

                while( $row = mysqli_fetch_array($result) ){
                    if ( $row["user_name"] == $user ){ // 입력 받은 유저하고 디비에 있는 유저
                        if( $row["open_range"] == "all" || $row["open_range"] == "followers" ){
                            $name = $row["user_name"];
                            $nick_name = $row["nick_name"]; 
                            $user_email = $row["user_email"];
                            $user_phone = $row["user_phone"];
                            $user_profile_url = $row["user_profile_url"];
                            echo "<tr> <td>".$name."</td>  <td>".$nick_name."</td>  <td>".$user_email."</td>  
                            <td>".$user_phone."</td>  
                            <td> <img src='$user_profile_url' width='500' height='300'> </td>
                              </tr>";   
                        }
                        else{
                            $name = $row["user_name"];
                            $nick_name = "Private"; 
                            $user_email = "Private";
                            $user_phone = "Private";
                            $user_profile_url = "Private";
                        }
                    }
                }
                echo "</table>";
    
                mysqli_close($conn);
            ?>
            
        </div>
    </body>
</html>