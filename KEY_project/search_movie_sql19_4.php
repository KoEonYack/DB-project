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
                require('../db_connect.php');
                $begin = $_POST['time_begin'];
                $end = $_POST['time_end'];
                $flag = 0;

                $sql = "SELECT * FROM movie_list WHERE running_time>={$begin} AND running_time<={$end}";
                $result = mysqli_query($conn, $sql);

                #$temp_findcategory = $_POST['findcategory']; 
                #$temp_findkeyword = "%".$_POST['findkeyword']."%";
                #$search = mysqli_query($conn,"SELECT * FROM table WHERE field1 like '$temp_findkeyword' order by '$temp_findcategory' asc"); 

                echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
                echo 
                "<tr>
                    <th style='text-align:center;'> 영화 제목 </th>
                    <th style='text-align:center;'> 영어 제목 </th>
                    <th style='text-align:center;'> 개봉년도 </th>
                    <th style='text-align:center;'> 개봉 국가 </th>
                    <th style='text-align:center;'> 사이트 주소 </th>
                    <th style='text-align:center;'> 언어 </th>
                    <th style='text-align:center;'> 상영등급 </th>
                    <th style='text-align:center;'> 제작사 </th>
                </tr>";

                while( $row = mysqli_fetch_array($result) ){

                    $movie_name = $row["movie_name"];
                    $english_name = $row["english_name"]; 
                    $release_date = $row["release_date"];
                    $nation = $row["nation"];
                    $site_url = $row["site_url"];
                    $language = $row["language"];
                    $rating_certification = $row["rating_certification"];
                    $studio_name = $row["studio_name"];

                    echo "<tr> <td>".$movie_name."</td>  <td>".$english_name."</td>  <td>".$release_date."</td>  
                    <td>".$nation."</td>  <td>".$site_url."</td>  <td>".$language."</td>  
                    <td>".$rating_certification."</td>  <td>".$studio_name."</td>  
                    </tr>";
                    $flag = 1;
       
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
            <a href="./search_movie_sql19.php"><button type="button" class="btn btn-primary">Go To Search</button></a>
            <a href="../button.php"><button type="button" class="btn btn-primary">Go To Main</button></a>
        </div>
    </body>
</html>