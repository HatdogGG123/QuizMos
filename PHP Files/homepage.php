<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="homepage.css">
    <title>QuizMos Homepage</title>

    <style>
        .container .mainContent .welcomeTxt {
            height: fit-content;
            margin-bottom: 50px;
        }

        @media screen and (max-width: 768px) {
            .container .sidebar .navigation .navItem a:nth-child(2) {
                display: none;
            }

            .container .sidebar .navigation .navItem {
                justify-content: center;
            }
        }

        @media screen and (max-width: 425px) {
            /* Design for navigation */
            .container .sidebar .navigation {
                display: flex;
                flex-direction: row;
                gap: 10px;
            }
            .container .sidebar .navigation .navItem img {
                display: block;
                height: 17px;
            }
            .container .sidebar .navigation .navItem a:nth-child(2) {
                display: none;
            }
        }

        @media screen and (max-width: 320px) {
            .container .sidebar .navigation {
                margin-left: -20px;
            }
            .container .sidebar .navigation .navItem img {
                height: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img src="Logo Pic.png" alt="">
            </div>

            <div class="navigation">
                <div class="navItem">
                    <a href="#home"><img src="home.png" alt=""></a>
                    <a href="#home">Home</a>
                </div>
                <div class="navItem">
                    <a href="#module"><img src="open-book.png" alt=""></a>
                    <a href="#module">Modules</a>
                </div>
                <div class="navItem">
                    <a href="#game"><img src="games.png" alt=""></a>
                    <a href="#game">Games</a>
                </div>
                <div class="navItem">
                    <a href="leaderboard.php"><img src="ranking.png" alt=""></a>
                    <a href="leaderboard.php">Leaderboards</a>
                </div>
            </div>
            
            <div class="logoutBox">
                <div class="logoutImgBox">
                    <img src="door.png" alt="">
                </div>
                <button onclick="goHome()">
                    <img src="exit.png" alt="">
                    <p>Logout</p>
                </button>
            </div>
        </div>
        <div class="mainContent">
            <div class="welcomeTxt" id="home">
            <?php
                echo "<p> Welcome " . " " . $_SESSION["user"] . "!</p>";
            ?>
            </div>

            <div class="homeImage">
                <img src="Group 263.png" alt="">
            </div>

            <!-- Module Section -->
            <div class="moduleSection" id="module">
                <div class="header">
                    <p>Modules</p>

                    <h6 style="margin-top: 30px; margin-bottom: 10px;">Web Development</h6>
                </div>
                <div class="moduleList">
                    <!-- Module card for week #1 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 1 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #1: Introduction to Javascript</p>
                            <button onclick="goModule1()">Start Learning</button>
                        </div>
                    </div>

                    <!-- Module card for week #2 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 2 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #2: Javascript <br> Basics</p>
                            <button onclick="goModule2()">Start Learning</button>
                        </div>
                    </div>

                    <!-- Module card for week #3 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 3 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #3: Javascript Basics (Part 2)</p>
                            <button onclick="goModule3()">Start Learning</button>
                        </div>
                    </div>

                    <!-- Module card for week #4 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 4 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #4: JavaScript <br> Arrays</p>
                            <button onclick="goModule4()">Start Learning</button>
                        </div>
                    </div>

                    <!-- Module card for week #5 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 5 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #5: Introduction to PHP</p>
                            <button onclick="goModule5()">Start Learning</button>
                        </div>
                    </div>

                    <!-- Module card for week #6 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 6 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #6: How to run PHP code in XAMPP</p>
                            <button onclick="goModule6()">Start Learning</button>
                        </div>
                    </div>

                    <!-- Module card for week #7 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="week 7 - page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Week #7: PHP Using echo and print</p>
                            <button onclick="goModule7()">Start Learning</button>
                        </div>
                    </div>
                    
                    <!-- Reviewer Card -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <img src="reviewer page 1.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">JavaScript and PHP: Additional Information Reviewer</p>
                            <button onclick="goReviewer()">Start Learning</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Game Section -->
            <div class="gameSection" id="game">
                <div class="header">
                    <p>Games</p>
                </div>
                <div class="gameList">
                    <!-- game card for week Hangman -->
                    <div class="gameCard">
                        <div class="imgBox">
                            <img src="hangman.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Hangman</p>
                            <button onclick="goHangman()">PLAY</button>
                        </div>
                    </div>

                    <!-- game card for QuizIO -->
                    <div class="gameCard">
                        <div class="imgBox">
                            <img src="choose.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">QuizIO</p>
                            <button onclick="goQuizIO()">PLAY</button>
                        </div>
                    </div>

                    <!-- game card for Codemaster-->
                    <div class="gameCard">
                        <div class="imgBox">
                            <img src="hacker.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Codemaster</p>
                            <button onclick="goCodemaster()">PLAY</button>
                        </div>
                    </div>

                    <!-- game card for Codemaster -->
                    <div class="gameCard">
                        <div class="imgBox">
                            <img src="quest.png" alt="">
                        </div>
                        <div class="infoBox">
                            <p class="title">Monster Hunter's Quest</p>
                            <button onclick="goMonsterHunterQuest()">PLAY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Redirect to index.html
        function goHome() {
            window.location.href = "index.html"
        }

        //Redirect to Week 1 Module
        function goModule1() {
            window.location.href = "week1Module.html"
        }

        //Redirect to Week 2 Module
        function goModule2() {
            window.location.href = "week2Module.html"
        }

        //Redirect to Week 3 Module
        function goModule3() {
            window.location.href = "week3Module.html"
        }

        //Redirect to Week 4 Module
        function goModule4() {
            window.location.href = "week4Module.html"
        }

        //Redirect to Week 5 Module
        function goModule5() {
            window.location.href = "week5Module.html"
        }

        //Redirect to Week 6 Module
        function goModule6() {
            window.location.href = "week6Module.html"
        }

        //Redirect to Week 7 Module
        function goModule7() {
            window.location.href = "week7Module.html"
        }

        //Redirect to Reviewer
        function goReviewer() {
            window.location.href = "reviewer.html"
        }

        //Redirect to Hangman page
        function goHangman() {
            window.location.href = "hangman.html"
        }

        //Redirect to QuizIO page
        function goQuizIO() {
            window.location.href = "quizio.html"
        }

        //Redirect to Codemaster page
        function goCodemaster() {
            window.location.href = "codemaster.html"
        }
        
        //Redirect to Monster Hunters Quest
        function goMonsterHunterQuest() {
            window.location.href = "MonsterHunterQuest.html"
        }
    </script>
</body>
</html>