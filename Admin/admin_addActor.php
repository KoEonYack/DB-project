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
            <a href="./admin.php"><button type="button" class="btn btn-primary">Back</button></a><br><br>
            <?php
                session_start();
                if(!isset($_SESSION['ses_userid'])){
                    echo
                    '<script>
                        alert("로그인을 해주세요");
                        document.location.href="../button.php"; 
                    </script>';
                    
                }
            ?>
            <form role="form" action="admin_addActor_query.php" method="POST"  > 
                <div class="form-group"> 
                    <label for="actorname">영화 배우 추가</label> 
                    <input type="text" class="form-control" id="actorname" name="actorname" placeholder="Enter actor name">
                    <input type="text" class="form-control" id="actorname" name="actorage" placeholder="Enter actor age">
                    <input type="text" class="form-control" id="actorname" name="actorgender" placeholder="Enter actor gender">
                    <input type="text" class="form-control" id="actorname" name="actortype" placeholder="Enter actor type">
                    <input type="text" class="form-control" id="actorname" name="actorphoto" placeholder="Enter actor photo_url">
                    <input type="text" class="form-control" id="moviename" name="movieid" placeholder="Enter movie id">  
                </div> 
                <button type="submit" class="btn btn-default">추가</button>
            </form>
            <br>
        </div>
    </body>
</html>
