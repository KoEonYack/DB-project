<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>     
    </head>
    <body>
        <div class="container"><br><br>
            <?php
                require('user_follow_insert_query.php');
                userList();
                userClick();

                // showFollower();

                // $user_result = mysqli_query($conn, "SELECT * FROM user_list");
                // // $n = 0;
                // while($user = mysqli_fetch_array($user_result)){
                //   echo '<button type="button"  class="btn btn-default">
                //   <span style="font-size:20px">'
                //   .$user["nick_name"].'</span></button>  ';
                // }
            ?>
            <br>
            <br><a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>
