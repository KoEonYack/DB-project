<?php
    require('../../db_connect.php');

    function star(){
        global $conn;
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr><th style='text-align:center;'>Rank</th><th style='text-align:center;'>Movie Title</th>
            <th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>
            <th style='text-align:center;'>Star</th>    
            </tr>";

        $start = "START TRASACTION";
        $view = "CREATE VIEW movie_star AS SELECT movie_id,AVG(star_rate) AS star_average FROM user_rating_list GROUP BY movie_id";
        $select = "SELECT * FROM movie_star INNER JOIN movie_list ON movie_star.movie_id=movie_list.movie_id ORDER BY star_average DESC";
        $drop = "DROP VIEW movie_star";
        $commit = "COMMIT";
        $rollback = "ROLLBACK";
        try{
            $conn->query($start);

            $conn->query($view);
            $result = $conn->query($select);
            $conn->query($drop);

            $conn->query($commit);
        }catch(Exception $e){
            $conn->query($rollback);
        }

        echo '<h5>user_rating_list를 이용해서 GROUP BY로 각 movie_id에 해당하는 별점 평균을 계산하여 뷰를 생성합니다.<br>';
        echo '그 후 뷰를 이용해서 movie_list와 INNER JOIN하여 모든 정보를 받아오고 이제 뷰는 필요없으니 DROP 합니다.<br>';
        echo '이 과정이 한 번에 이루어져야 하므로 TRANSACTION을 사용합니다.</h5><br>';

        echo '<h4>'.$start.'<br>'.$view.'<br>'.$select.'<br>'.$drop.'<br>'.$commit.';</h4><br>';

        $rank = 1;
            while( $row = mysqli_fetch_array($result) ){  
                $title = $row["movie_name"];
                $content = $row["english_name"];
                $date = $row["release_date"];
                $star = $row["star_average"];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$rank."</td>  <td>".$title."</td>  <td>".$content."</td>  
                <td>".$date."</td> <td><strong>".$star."</strong></td>  </tr>";
                $rank++;
            }
            echo "</table>";
    }

?>