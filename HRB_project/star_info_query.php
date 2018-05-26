<?php  
    require('../db_connect.php');

    function starAverage(){
        global $conn;
        $user_id=$_SESSION['userlist_id'];
        $sql = "SELECT AVG(star_rate) AS star_avg FROM user_rating_list WHERE userlist_id=".$user_id;
        echo '<h4>'.$sql.'</h4><p>';
        $result = mysqli_query($conn,$sql);
        $avg = mysqli_fetch_array($result);
        $star = floor($avg['star_avg']); // 별점 평균 반올림

        echo '<h4>별점 평균 : ';
        while($star--) echo '★';
        echo ' (반올림 값)</h4><p><p>';
    }
    
    function frequentStar(){
        global $conn;
        $user_id=$_SESSION['userlist_id'];
        $sql = 
        "SELECT star_rate, COUNT(star_rate) AS frequency FROM user_rating_list WHERE userlist_id={$user_id}
         GROUP BY star_rate ORDER BY frequency DESC LIMIT 1";
        echo '<h4>'.$sql.'</h4><p>';
        $result = mysqli_query($conn,$sql);
        $fre = mysqli_fetch_array($result);
        echo "<h4>가장 많이 준 별점 : ".$fre['star_rate']."점을 ".$fre['frequency']."번 주셨습니다.</h4>";
    }
?>