<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

        <style>
            body { padding-top: 70px; }
            .centered { position: absolute; left: 50%; transform: translateX(-50%); }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="page-header">
                <h3>Scenario List sql query list
                <?php
                    session_start();
                    if(!isset($_SESSION['ses_userid'])){
                        echo "<small>로그인을 해주세요</small>";
                    }
                    else{
                        echo "<small> 안녕하세요 ", $_SESSION['ses_userid']  ,"님!      </small>";
                    }
                ?>
                <a href="index.html"><button type="button" class="btn btn-success">Go To Index Page</button></a>
                </h3>
            </div>
            <hr><br>

            <p>
                <a href="./MCK_project/member/signUpForm.php"><button type="button" class="btn btn-default"> 1. 회원가입 </button></a>
                <?php
                    session_start();
                    if(!isset($_SESSION['ses_userid'])){
                        echo '<a href="./MCK_project/member/main.php"><button type="button" class="btn btn-info"> 2-1. Login </button></a>';
                    }
                    else{
                        echo '<a href="./MCK_project/member/signOut.php"><button type="button" class="btn btn-info"> 2-2. Logout </button></a>';
                    }
                ?>
                <a href="./MCK_project/initial_rating.php"><button type="button" class="btn btn-default">3. 회원가입시 10개의 영화평가(order by rand() limit 10)</button></a>
            </p>

            <p>
                <a href="./HRB_project/rank/spectator_rank.php"><button type="button" class="btn btn-default"> 4-1. 관람객 많은 순으로 보기 </button></a>
                <a href="./HRB_project/rank/reserve_rank.php"><button type="button" class="btn btn-default"> 4-2. 예매율 높은 순으로 보기 </button></a>
                <a href="./HRB_project/rank/star_rank.php"><button type="button" class="btn btn-default"> 4-3. 별점평균 높은 순으로 보기 </button></a>
                <a href="./HRB_project/rank/comment_rank.php"><button type="button" class="btn btn-default"> 4-4. 댓글 수 많은 순으로 보기 </button></a>
            </p>
    
            <p>
                <a href="KEY_project/Current_screening_sql5.php"><button type="button" class="btn btn-default"> 5. 현재 상영작 </button></a>    
                <a href="KEY_project/Before_Release_sql6.php"><button type="button" class="btn btn-default"> 6. 개봉 예정작 </button></a>
                <a href="KEY_project/movie_info.php"><button type="button" class="btn btn-default"> 7. 영화 기본 정보 보기 (View) </button></a>
                <a href="./HRB_project/director_info.php"> <button type="button" class="btn btn-default"> 8-1. 감독기본정보 </button></a>
                <a href="./HRB_project/actor_info.php"><button type="button" class="btn btn-default">8-2. 배우기본정보</button></a>
                <a href="./HRB_project/movie_rating.php"><button type="button" class="btn btn-default">9. 영화 평가하기</button></a>

            </p>

            <p>
                <a href="./HRB_project/movie_saw.php"><button type="button" class="btn btn-default"> 10-1. 이제까지 본 영화 </button></a>
                <a href="./HRB_project/movie_nation.php"><button type="button" class="btn btn-default">10-2. 국가별로 보기</button></a>
                <a href="./HRB_project/movie_genre.php"><button type="button" class="btn btn-default">10-3. 장르별로 보기</button></a>
            </p>

            <p>
                <a href="./ESK_project/write_comment.php"><button type="button" class="btn btn-default"> 11. 코멘트 작성하기 </button></a>
                <a href="./ESK_project/write_comments_comment.php"><button type="button" class="btn btn-default"> 12 : 댓글의 댓글달기</button></a>
                <a href="./ESK_project/sort_comment.php"><button type="button" class="btn btn-default"> 13. 코멘트 보기 </button></a>
                <a href="./MCK_project/comment_like.php"><button type="button" class="btn btn-default"> 14. 댓글에 좋아요 누르기 </button></a>
            </p>

            <p>
                <a href="./MCK_project/comment_like.php"><button type="button" class="btn btn-default"> 14. 댓글에 좋아요 누르기 </button></a>
                <a href="./MCK_project/hopeToSee_movie.php"><button type="button" class="btn btn-default"> 15-1. 보고싶어요 체크하기(NOT IN, Subquery) </button></a>
                <a href="./MCK_project/hopeToSee_remove.php"><button type="button" class="btn btn-default"> 15-2. 보고싶어요 삭제하기(IN, Subquery, Delete) </button></a>
            </p>

            <p>
                <a href="./MCK_project/wanted_movie.php"><button type="button" class="btn btn-default"> 16-1. 보고싶어요 영화 보기 (IN, Subquery)</button></a>
                <a href="./MCK_project/wanted_nation.php"><button type="button" class="btn btn-default"> 16-2. 보고싶어요 국가별 보기 (IN, Subquery)</button></a>
                <a href="./MCK_project/wanted_genre.php"><button type="button" class="btn btn-default"> 16-3. 보고싶어요 장르별 보기 (IN, Subquery)</button></a>
            </p>

            <p>
                <a href ="./KEY_project/select_movie_hate_sql17.php"><button type="button" class="btn btn-default"> 17-1. 관심없어요 체크하기 </button></a>
                <a href ="./KEY_project/hated_remove.php"><button type="button" class="btn btn-default"> 17-2. 관심없어요 삭제하기 </button></a>  
                <a href="./KEY_project/hated_movie.php"><button type="button" class="btn btn-default"> 18-1. 관심없어요 영화 보기 </button></a>
                <a href="./KEY_project/hated_nation.php"><button type="button" class="btn btn-default"> 18-2. 관심없어요 영화 국가별 보기 </button></a>
            </p>

            <p>
                <a href="./KEY_project/hated_genre.php"> <button type="button" class="btn btn-default"> 18-3. 관심없는 영화 장르별 보기 </button></a>
                <a href="./KEY_project/search_movie_sql19.php"><button type="button" class="btn btn-default"> SQL19 : 영화 검색 </button></a>
                <a href="./KEY_project/search_user_sql20.php"><button type="button" class="btn btn-default"> SQL20 : 유저 검색 </button></a>
                <a href="./KEY_project/users_preference_sql21.php"><button type="button" class="btn btn-default"> SQL21 : 선호하는 감독 / 장르 / 국가 / 배우 보기 </button></a> 
            </p>

            <p>
                <a href="./HRB_project/best_comment.php"><button type="button" class="btn btn-default"> 22. 최고 코멘트와 받은 좋아요 수 </button></a>
                <a href="./HRB_project/movie_time.php"><button type="button" class="btn btn-default"> 23. 영화 본 총 시간 </button></a>
                <a href="./HRB_project/star_info.php"><button type="button" class="btn btn-default"> 24. 별점 평균과 가장 많이 준 별점 </button></a>
                <a href="./ESK_project/user_prefrence_tag.php"><button type="button" class="btn btn-default"> 25. 선호 태그 조회 </button></a>
            </p>
            <p>
                <a href="./ESK_project/user_follow_insert.php"><button type="button" class="btn btn-default"> 26. 팔로우 추가하기 </button></a>
                <a href="./ESK_project/user_following.php"><button type="button" class="btn btn-default"> 27. 팔로잉 리스트 팔로워 리스트 조회 </button></a>
                <a href="./MCK_project/search_user.php"><button type="button" class="btn btn-default"> 28. 다른 사용자 검색 </button></a>
                <a href="./MCK_project/betweenUser_rating.php"><button type="button" class="btn btn-default"> 29. 다른 사용자와의 평가(Inner Join, Subquery)</button></a>
            </p>

            <p>     
                <a href="./MCK_project/recommend_genre.php"><button type="button" class="btn btn-default"> 30-1. 장르 기준 추천 영화(Left Join, Subquery, DISTINCT)</button></a>
                <a href="./MCK_project/recommend_nation.php"><button type="button" class="btn btn-default"> 30-2. 국가 기준 추천 영화(Left Join, Subquery, DISTINCT)</button></a>
            </p>

            
            <p>
                <a href="./Admin/admin.php"><button type="button" class="btn btn-default"> 99. 관리자 페이지 </button></a>
            </p>

        </div>
    </body>
</html>