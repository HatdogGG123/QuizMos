<?php
    include('databaseConnection.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'];
        $gameTitle = $_POST['gameTitle'];
        $week = $_POST['week'];
        $itemTotal = $_POST['itemTotal'];
        $scoreTotal = $_POST['scoreTotal'];
        $easyScore = $_POST['easyScore'];
        $normalScore = $_POST['normalScore'];
        $hardScore = $_POST['hardScore'];

        $sql = "SELECT * FROM studenAccount WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {   
            $gameResult = "INSERT INTO studentinfo (user, gameTitle, week, itemTotal, scoreTotal, easy, normal, hard) VALUES ('$username', '$gameTitle', '$week', '$itemTotal', '$scoreTotal','$easyScore', '$normalScore', '$hardScore' )";
            mysqli_query($conn, $gameResult);
            
            header("Location: codemaster.html");
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="codemasterMainGame.css">
    <title>Codemasters Week 4</title>
    <style>
        .container .computer .computer-head .mainContent .quizBox .question p {
            background-color: transparent;
            text-align: center; 
            font-size: 50px; 
            margin-top: 50px;
        }
        .container .computer .computer-head .mainContent .quizBox .question button {
            font-size: 35px;
            margin-top: 10px;
            padding: 10px 30px;
            border-radius: 10px;
            border: 3px solid black;
            cursor: pointer;
        }
        .container .computer .computer-head .mainContent .quizBox .question button:active {
            transform: scale(0.95);
        }
        @media screen and (max-width: 768px) {
            #question1 {
                font-size: 30px;
            }
            .container .computer .computer-head .mainContent .quizBox .question button {
                font-size: 25px;
                padding: 10px 20px;
            }
        }
        @media screen and (max-width: 430px) {
            #question1 {
                margin-top: 10px;
            }
            .container .computer .computer-head .mainContent .quizBox .question button {
                font-size: 25px;
                padding: 10px 20px;
            }
        }

        iframe {
            position: absolute;
            visibility: hidden;
        }
    </style>
</head>
<body>

<iframe width="841" height="473" src="https://www.youtube.com/embed/GNDWNW3IKwU?autoplay=1&loop=1" title="Cute Background Music No Copyright / Funny Background Music" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <div class="container">
        <div class="backBtnContainer" id="backBtnContainer">
            <button>
                <a href="homepage.html">
                    <img src="back-arrow.png" alt="">
                </a>
            </button>
        </div>
        <div class="table">
            <div class="upperTable">
                <div class="timer">
                    <div class="timerButton"></div>
                    <div class="timerText" id="timer">00:15</div>
                    <div class="timerStand"></div>
                </div>
                <div class="book">
                    <div class="book1"></div>
                    <div class="book2"></div>
                    <div class="book3"></div>
                </div>
            </div>
            <div class="middleTable"></div>
            <div class="lowerTable">
                <div id="wrongCount">0</div>
                <div id="correctCount">0</div>
            </div>
        </div>
        <div class="computer">
            <div class="computer-head">
                <div class="mainContent">
                    <div class="itemCounter">
                        <p class="diffText diffText-easy">Easy</p>
                        <div id="item1" style="background-color: #548B7E;"></div>
                        <div id="item2"></div>
                        <div id="item3"></div>
                        <div id="item4"></div>
                        <p class="diffText diffText-normal">Normal</p>
                        <div id="item5"></div>
                        <div id="item6"></div>
                        <div id="item7"></div>
                        <p class="diffText diffText-hard">Hard</p>
                        <div id="item8"></div>
                        <div id="item9"></div>
                        <div id="item10"></div>
                    </div>
                    <div class="quizBox">
                        <div class="formContainer" id="formContainer" style="display: none;">
                            <form action="" method="post">
                                <input type="text" name="username" placeholder="Username" required> <br>
                                <input id="gameTitle" type="text" name="gameTitle" placeholder="Game title" required> <br>
                                <input id="week" type="text" name="week" placeholder="week" required> <br>
                                <input id="easyScore" type="text" name="easyScore" placeholder="Easy Score" required> <br>
                                <input id="normalScore" type="text" name="normalScore" placeholder="Normal Score" required> <br>
                                <input id="hardScore" type="text" name="hardScore" placeholder="Hard Score" required> <br>
                                <input id="scoreTotal" type="text" name="scoreTotal" placeholder="Total Score" required> <br>
                                <input id="itemTotal" type="text" name="itemTotal" placeholder="Total Score" required> <br>
                                <input type="submit" name="submit" value="Submit">
                            </form>
                        </div>
                        <div class="resultContainer" id="resultContainer" style="display: none;">
                            <div class="congratsText">Congratulations!</div>
                            <div id="scoreText">You solved 5 problems!</div>
                            <div class="medalContainer">
                                <div><img id="medal" src=""></div>
                            </div>
                        </div>
                        <div class="question" style="text-align: center;">
                            <!-- Easy question -->
                            <p id="question1">
                                THERE IS NO CODING IN THIS WEEK!
                            </p>
                            <button onclick="back()">BACK</button>
                        </div>
                    </div>
                    <div class="answerBox">
                        <div class="userAnswerBox" id="userAnswerBox">
                            <input type="text" id="userAnswer" placeholder="Type the expected output here..."> 
                        </div>
                        <div class="submitBtnContainer" id="submitBtnContainer">
                            <button id="submitBtn" onclick="submitAnswer()">Submit</button>
                        </div>
                        <div class="nextBtnContainer" id="nextBtnContainer">
                            <button id="nextBtn" onclick="nextQuestion()">Next</button>
                        </div>
                        <div class="showFormBtnContainer" id="showFormBtnContainer" style="display: none;">
                            <button onclick="showFormCon()">Tell us what you got!</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="computer-neck"></div>
            <div class="computer-stand"></div>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "codemaster.html"
        }
    </script>
</body>
</html>