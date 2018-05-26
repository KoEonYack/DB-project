<?php
    require('../db_connect.php');
    require('./include/session.php');

    function button_DECREASEINDEX(){
      echo '<button type="button" class="btn btn-default"><a href="makeMovie_DECREASEINDEX.php?id="ok" 
      style="text-decoration:none; color:black;">DECREASE INDEX를 진짜 만들레요.</a></button>';
    }    
    function makeMovie_DECREASEINDEX(){
      global $conn;

      echo '<br><span style="font-size:35px"><DECEARSE cardinality INDEX></span><br>';
      $cardinality_sql = "SELECT COUNT(DISTINCT(`movie_id`)), COUNT(DISTINCT(`movie_name`)), COUNT(DISTINCT(`english_name`)), COUNT(DISTINCT(`release_date`)), COUNT(DISTINCT(`nation`)), COUNT(DISTINCT(`language`)), COUNT(DISTINCT(`rating_certification`)), COUNT(DISTINCT(`running_time`)), COUNT(DISTINCT(`cumulative_audience`)), COUNT(DISTINCT(`advance_rate`)), COUNT(DISTINCT(`studio_name`)), COUNT(DISTINCT(`summary`)), COUNT(DISTINCT(`author`)), COUNT(DISTINCT(`site_url`)), COUNT(DISTINCT(`budget`)), COUNT(DISTINCT(`revenue`)) FROM `movie_list`";

      echo '<h4>cardinality of Movie_list: '.$cardinality_sql.'</h4><hr>';
      $cardinality_result = mysqli_query($conn, $cardinality_sql);
      $cardinality = mysqli_fetch_array($cardinality_result);
      echo '<br><h4>cardinality of Movie_list: "movie_id:'.$cardinality['COUNT(DISTINCT(`movie_id`))'].' movie_name: '.$cardinality['COUNT(DISTINCT(`movie_name`))'].' author: '.$cardinality['COUNT(DISTINCT(`author`))'].'</h4>';
      if(isset($_GET['id'])){
        $DECREASE_index_sql = "CREATE INDEX INDEX_MOVIE_DECREASE on movie_list(`movie_id`, `movie_name`, `author`)";

        echo '<br><h4>attribute cardinality decreasing order INDEX  </br>: '.$DECREASE_index_sql.'</h4>';
        mysqli_query($conn, $DECREASE_index_sql);
        echo "<br><h4>실행완료</h4>";
      }
    }
?>
