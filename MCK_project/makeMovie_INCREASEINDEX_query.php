<?php
    require('../db_connect.php');
    require('./include/session.php');

    function button_INCREASEINDEX(){
      echo '<button type="button" class="btn btn-default"><a href="makeMovie_INCREASEINDEX.php?id="ok" 
      style="text-decoration:none; color:black;">INCREASE INDEX를 진짜 만들레요.</a></button>';
    }    
    function makeMovie_INCREASEINDEX(){
      global $conn;

      echo '<br><span style="font-size:35px"><INCEARSE cardinality INDEX></span><br>';
      $cardinality_sql = "SELECT COUNT(DISTINCT(`movie_id`)), COUNT(DISTINCT(`movie_name`)), COUNT(DISTINCT(`english_name`)), COUNT(DISTINCT(`release_date`)), COUNT(DISTINCT(`nation`)), COUNT(DISTINCT(`language`)), COUNT(DISTINCT(`rating_certification`)), COUNT(DISTINCT(`running_time`)), COUNT(DISTINCT(`cumulative_audience`)), COUNT(DISTINCT(`advance_rate`)), COUNT(DISTINCT(`studio_name`)), COUNT(DISTINCT(`summary`)), COUNT(DISTINCT(`author`)), COUNT(DISTINCT(`site_url`)), COUNT(DISTINCT(`budget`)), COUNT(DISTINCT(`revenue`)) FROM `movie_list`";

      echo '<h4>cardinality of Movie_list: '.$cardinality_sql.'</h4><hr>';
      $cardinality_result = mysqli_query($conn, $cardinality_sql);
      $cardinality = mysqli_fetch_array($cardinality_result);
      echo '<br><h4>cardinality of Movie_list: "rating_certification:'.$cardinality['COUNT(DISTINCT(`rating_certification`))'].' language: '.$cardinality['COUNT(DISTINCT(`language`))'].' nation: '.$cardinality['COUNT(DISTINCT(`nation`))'].'</h4>';
      if(isset($_GET['id'])){
        $INCREASE_index_sql = "CREATE INDEX INDEX_MOVIE_INCREASE ON movie_list (`rating_certification`, `language`, `nation`)";

        echo '<br><h4>attribute cardinality increasing order INDEX  </br>: '.$INCREASE_index_sql.'</h4>';
        mysqli_query($conn, $INCREASE_index_sql);
        echo "<br><h4>실행완료</h4>";
      }
    }
?>
