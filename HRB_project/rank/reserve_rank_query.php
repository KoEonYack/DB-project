<?php
    require('../../db_connect.php');

    function reserve(){
        global $conn;
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr><th style='text-align:center;'>Rank</th><th style='text-align:center;'>Movie Title</th>
            <th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>
            <th style='text-align:center;'>Advance rate</th>    
            </tr>";

        echo '<h5>advance_rate(예매율) 기준으로 내림차순 정렬하였습니다.</h5>';
        $sql = "SELECT * FROM movie_list ORDER BY advance_rate DESC";
        echo '<h5>'.$sql.'</h5>';
        $result = mysqli_query($conn, $sql);
        $rank = 1;
            while( $row = mysqli_fetch_array($result) ){  
                $title = $row["movie_name"];
                $content = $row["english_name"];
                $date = $row["release_date"];
                $advance_rate = $row["advance_rate"];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$rank."</td>  <td>".$title."</td>  <td>".$content."</td>  
                <td>".$date."</td> <td><strong>".$advance_rate."%</strong></td>  </tr>";
                $rank++;
            }
            echo "</table>";
    }

?>