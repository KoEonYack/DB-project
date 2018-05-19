<?php
    require('../../db_connect.php');

    function spectator(){
        global $conn;
        echo "<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example' >";
        echo "<tr><th style='text-align:center;'>Rank</th><th style='text-align:center;'>Movie Title</th>
            <th style='text-align:center;'>English Title</th><th style='text-align:center;'>Year</th>
            <th style='text-align:center;'>Spectator</th>    
            </tr>";

        echo '<h5>cumulative_audience(누적관객) 기준으로 내림차순 정렬하였고 타입이 문자열이라 <br>CAST 쿼리를 써야 해서 배울 수 있었습니다.</h5>';
        $sql = "SELECT * FROM movie_list ORDER BY CAST(cumulative_audience AS UNSIGNED) DESC";
        echo '<h5>'.$sql.'</h5>';
        $result = mysqli_query($conn, $sql);
        $rank = 1;
            while( $row = mysqli_fetch_array($result) ){  
                $title = $row["movie_name"];
                $content = $row["english_name"];
                $date = $row["release_date"];
                $spectator = $row["cumulative_audience"];
                #echo "<tr><td><div>".$id."</div></td><td>".$title."</td><td  style='padding-right:200px;'>".$content."</td></tr>";
                echo "<tr>  <td>".$rank."</td>  <td>".$title."</td>  <td>".$content."</td>  
                <td>".$date."</td> <td><strong>".number_format($spectator)."</strong></td>  </tr>";
                $rank++;
            }
            echo "</table>";
    }

?>