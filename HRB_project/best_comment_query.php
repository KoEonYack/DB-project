<?php
    require('../db_connect.php');

    function bestComment(){
        global $conn;
        $user_id=1;
        // 먼저 해당 유저가 쓴 comment_id를 전부 가져온다.
        $comment_sql = "SELECT comment_id FROM comment_list WHERE userlist_id={$user_id};";
        echo '<h4>'.$comment_sql.'</h4>';
        $comment_result = mysqli_query($conn, $comment_sql);

        $long_sql = "SELECT contents FROM comment_list 
        INNER JOIN (SELECT MAX(like_num) AS best 
        FROM (SELECT COUNT(likes.comment_id) AS like_num 
        FROM comment_like_list likes 
        INNER JOIN comment_list comment ON likes.comment_id=comment.comment_id 
        WHERE comment.userlist_id=1 GROUP BY comment.comment_id) AS best_like) best_comment ON comment_list.comment_id=best_comment.best;";
        
        // 총 좋아요 개수와 최고 코멘트를 알아내기 위한 연관 배열 선언
        $like_num_list;
        $best_comment_list;

        while($comment=mysqli_fetch_array($comment_result)){
            // 가져온 comment_id에 좋아요가 몇개 찍혔는지 알아내기 위해 COUNT 사용
            $like_sql =
            "SELECT COUNT(comment_id) AS like_num FROM comment_like_list
            WHERE comment_id={$comment['comment_id']};";
            echo '<h4>'.$like_sql.'</h4>';
            $like_result = mysqli_query($conn, $like_sql);
            $like = mysqli_fetch_array($like_result);

            // 일단 각 comment_id에 대한 like_num을 저장
            $like_num_list[$comment['comment_id']] = $like['like_num'];
            // 각각의 like_num에 대해 comment_id도 저장
            $best_comment_list[$like['like_num']] = $comment['comment_id'];
        }

        // 가장 like_num이 많은 comment_id를 가져온다.
        $best_comment_id = $best_comment_list[max($like_num_list)];
        $contents_sql = "SELECT contents FROM comment_list WHERE comment_id={$best_comment_id};";
        echo '<h4>'.$contents_sql.'</h4>';
        $contents_result = mysqli_query($conn, $contents_sql);
        $contents = mysqli_fetch_array($contents_result);

        echo '<h4>'.$long_sql.'</h4>';

        echo '<br><span style="font-size:20px">
        최고 코멘트 : '.$contents['contents'].'</span>';
        echo '<br><span style="font-size:20px">
        이제까지 받은 총 좋아요 수 : '.array_sum($like_num_list).'</span>';
    }
?>
