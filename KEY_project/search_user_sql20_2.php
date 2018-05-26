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
                $user = $_POST['nickname'];
                $flag = 0;

                session_start();
                $session_id = $_SESSION['userlist_id'];
                # echo $session_id;

                require('../db_connect.php');
                $result = mysqli_query($conn, "SELECT * FROM user_list WHERE nick_name LIKE \"%".$user."%\"");
            
               echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
               # echo "<table class='table table-hover' >";


                echo 
                "<tr>
                <th style='text-align:center;'>Name</th>
                <th style='text-align:center;'>Nick name</th>
                <th style='text-align:center;'>Email</th>
                <th style='text-align:center;'>Phone</th>
                <th style='text-align:center;'>profile url</th>
                </tr>";

                while( $row = mysqli_fetch_array($result) ){
                        if( $row["open_range"] == "all" ){
                            $name = $row["user_name"];
                            $nick_name = $row["nick_name"]; 
                            $user_email = $row["user_email"];
                            $user_phone = $row["user_phone"];
                            $user_profile_url = $row["user_profile_url"];
                            echo "<tr> <td>".$name."</td>  <td>".$nick_name."</td>  <td>".$user_email."</td>  
                            <td>".$user_phone."</td>  
                            <td> <img src='$user_profile_url' width='500' height='300'> </td>
                            </tr>";
                            $flag = 1;
                        }
                        else if(  $row["open_range"] == "followers" ){
                            echo "here";
                            echo $session_id;
                            echo $_SESSION['userlist_id'];
                            // 로그인한 ID = 팔로우 ID follower_id

                            
                            // SELECT * FROM `follower_list` WHERE userlist_id = 3 AND follower_id = 20
                            // $followersList = mysqli_query($conn, "SELECT * FROM follower_list WHERE userlist_id =".$_SESSION['userlist_id']."AND follower_id =".$follower_id.")";
                            // $follower_id = $row["follower_id"];
                            // echo $follower_id;                            
                            
                            /*
                            echo followersList;
                            */
                            $flag = 1;
                        }
                        else if ( $row["open_range"] == "none"  ){
                            $name = $row["user_name"];
                            $nick_name = "Private"; 
                            $user_email = "Private";
                            $user_phone = "Private";
                            $user_profile_url = "Private";

                            echo "<tr> 
                            <td>".$name."</td>  <td>".$nick_name."</td>  <td>".$user_email."</td>  
                            <td>".$user_phone."</td><td>".$user_profile_url."</td></tr>";          
                            $flag = 1;                     
                        }   
                    }
                echo "</table>";

                
                if ($flag==0){
                    echo "<script>alert('검색 결과가 없습니다.');
                    history.back();
                    </script>";
                }
                
                
                mysqli_close($conn);
            ?>
            <br><br>
            <a href="./serarch_user_sql20.php"><button type="button" class="btn btn-primary">Go To Search</button></a>
            <a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>