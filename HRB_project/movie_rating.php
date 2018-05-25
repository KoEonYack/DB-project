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
            <a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a><br><br>
            <?php
                session_start();
                if(!isset($_SESSION['ses_userid'])){
                    echo
                    '<script>
                        alert("로그인을 해주세요");
                        document.location.href="../button.php"; 
                    </script>';
                    
                }
                require('movie_rating_query.php');
                movieList();
                movieClick();
                alreadyRated();
                rateForm();
            ?>
            <br>
        </div>
    </body>
</html>
