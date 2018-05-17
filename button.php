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
                </h3>
            </div>
            <hr><br>

            <p>
                <a href="./MCK_project/member/signUpForm.php"><button type="button" class="btn btn-default"> 1. Sign UP </button></a>
                <?php
                    session_start();
                    if(!isset($_SESSION['ses_userid'])){
                        echo '<a href="./MCK_project/member/main.php"><button type="button" class="btn btn-info"> 2-1. Login</button></a>';
                    }
                    else{
                        echo '<a href="./MCK_project/member/signOut.php"><button type="button" class="btn btn-info"> 2-2. Logout </button></a>';
                    }
                ?>
                <a href="./MCK_project/initial_rating.php"><button type="button" class="btn btn-default">3. 회원가입시 10개의 영화평가 </button></a>
                <a href="#"><button type="button" class="btn btn-default"> SQL4 </button></a>
                <a href="KEY_project/Current_screening_sql5.php"><button type="button" class="btn btn-default"> 5. 현재 상영작 </button></a>
            </p>
    
            <p>
                <a href="KEY_project/Before_Release_sql6.php"><button type="button" class="btn btn-default"> 6. 개봉 예정작 </button></a>
                <a href="KEY_project/movie_info.php"><button type="button" class="btn btn-default"> 7. 영화 기본 정보 보기 </button></a>
                <a href="./HRB_project/director_info.php"> <button type="button" class="btn btn-default"> 8-1. 감독기본정보 </button></a>
                <a href="./HRB_project/actor_info.php"><button type="button" class="btn btn-default">8-2. 배우기본정보</button></a>
                <a href="./HRB_project/movie_rating.php"><button type="button" class="btn btn-default">9. 영화 평가하기</button></a>
                <a href="./HRB_project/movie_saw.php"><button type="button" class="btn btn-default"> 10-1. 이제까지 본 영화 </button></a>

            </p>

            <p>
                <a href="./HRB_project/movie_nation.php"><button type="button" class="btn btn-default">10-2. 국가별로 보기</button></a>
                <a href="./HRB_project/movie_genre.php"><button type="button" class="btn btn-default">10-3. 장르별로 보기</button></a>
                <button type="button" class="btn btn-default"> SQL11 : 미완성</button>
                <button type="button" class="btn btn-default"> SQL12 : 미완성</button> 
                <button type="button" class="btn btn-default"> SQL13 : 미완성</button> 
            </p>

            <p>
                <a href="./MCK_project/comment_like.php"><button type="button" class="btn btn-default"> 14. 댓글에 좋아요 누르기 </button></a>
                <a href="./MCK_project/hopeToSee_movie.php"><button type="button" class="btn btn-default"> 15. 보고싶어요 체크하기 </button></a>
                <a href="./MCK_project/wanted_movie.php"><button type="button" class="btn btn-default"> 16-1. 보고 싶은 영화 보기 </button></a>
                <a href="./MCK_project/wanted_nation.php"><button type="button" class="btn btn-default"> 16-2. 보고 싶은 영화 국가별 보기 </button></a>
                <a href="./MCK_project/wanted_genre.php"><button type="button" class="btn btn-default"> 16-3. 보고 싶은 영화 장르별 보기 </button></a>
            </p>

            </p>
                <button type="button" class="btn btn-default"> SQL17 </button> 
                <button type="button" class="btn btn-default"> SQL19 : 미완성</button> 
                <a href="sql20.php"><button type="button" class="btn btn-default"> SQL20 : 미완성 </button></a>
                <button type="button" class="btn btn-default"> SQL21 : 미완성 </button> 
                <a href="./HRB_project/best_comment.php"><button type="button" class="btn btn-default"> 22. 최고 코멘트와 받은 좋아요 수 </button></a>
                <a href="./HRB_project/movie_time.php"><button type="button" class="btn btn-default"> 23. 영화 본 총 시간 </button></a>
            </p>
            <p>
                <a href="./HRB_project/movie_time.php"><button type="button" class="btn btn-default"> 23. 영화 본 총 시간 </button></a>
                <a href="./HRB_project/star_info.php"><button type="button" class="btn btn-default"> 24. 별점 평균과 가장 많이 준 별점 </button></a>
            </p>

            <br><br><br><br>
            <a href="index.html"><button type="button" class="btn btn-success">Go To Index Page</button></a>
        </div>
    </body>
</html>