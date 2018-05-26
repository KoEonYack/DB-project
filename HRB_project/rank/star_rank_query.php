<?php
    require('../../db_connect.php');

    function star(){
        global $conn;
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr><th style='text-align:center;'>Rank</th><th style='text-align:center;'>Movie Title</th>
            <th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>
            <th style='text-align:center;'>Star</th>    
            </tr>";

        echo '<h5>Transaction과 View를 쓰지 않고 단순 INNER JOIN을 쓴 경우</h5><br>';
        $sql = "SELECT * FROM movie_list INNER JOIN (SELECT movie_id,AVG(star_rate) AS star_average 
        FROM user_rating_list GROUP BY movie_id) AS movie_star ON movie_list.movie_id=movie_star.movie_id 
        ORDER BY star_average DESC";
        echo '<h5>'.$sql.'</h5><br>';
        $result = mysqli_query($conn, $sql);

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