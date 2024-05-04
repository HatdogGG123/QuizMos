
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
            
            header("Location: quizio.html");
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
    <link rel="stylesheet" href="easyChapter.css">
    <title>QuizIO Week 5</title>
</head>
<body>

<iframe width="841" height="473" src="https://www.youtube.com/embed/GNDWNW3IKwU?autoplay=1&loop=1" title="Cute Background Music No Copyright / Funny Background Music" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <style>
    iframe {
        visibility: hidden;
        position: absolute;
    }
    /*Design for rule container*/
    .container .startBtnContainer {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .container .startBtnContainer .ruleBox {
        width: 30%;
        background-color: white;
        border: 3px solid black;
        border-radius: 10px;
        padding: 10px;
    }
    .container .startBtnContainer .ruleBox .header {
        text-align: center;
        font-size: 40px;
        margin-bottom: 20px;
    }
    .container .startBtnContainer .ruleBox p {
        text-align: center;
        font-size: 25px;
        margin-bottom: 20px;
    }
    .container .startBtnContainer .ruleBox .backAndStartBtnContainer {
        width: 100%;
        display: flex;
        gap: 10px;
    }
    .container .startBtnContainer .ruleBox .backAndStartBtnContainer button {
        width: 50%;
        font-size: 30px;
        padding: 10px;
        border-radius: 10px;
        cursor: pointer;
        color: black;
        background-color: white;
        border: 3px solid black;
    }
    .container .startBtnContainer .ruleBox .backAndStartBtnContainer button:active {
        transform: scale(0.95);
    }

    @media screen and (max-width: 768px){
        .container .startBtnContainer .ruleBox {
        width: 60%;
        }
    }

    @media screen and (max-width: 430px){
        .container .startBtnContainer .ruleBox {
        width: 80%;
        background-color: white;
        border: 3px solid black;
        border-radius: 10px;
        padding: 10px;
        }
        .container .startBtnContainer .ruleBox .header {
            font-size: 30px;
        }
        .container .startBtnContainer .ruleBox p {
            font-size: 20px;
        }
        .container .startBtnContainer .ruleBox .backAndStartBtnContainer button {
            font-size: 25px;
        }
    }
    </style>
    <div class="container">
        <!--Start button-->
        <div class="startBtnContainer" id="startBtnContainer">
            <div class="ruleBox">
                <div class="header">Game Mechanics</div>
                <p> Click the word that you think is the correct answer and corresponds to the question. You only have <b>10 seconds</b> to choose the correct answer.</p>
                <div class="backAndStartBtnContainer">
                    <button id="startBtn" onclick="startGame()">Start Quiz</button>
                    <button onclick="exitQuiz()">Exit Quiz</button>
                </div>
            </div>
        </div>

        <!--Quiz container-->
        <div class="quizContainer" id="quizContainer">
            <!--Timer-->
            <div id="timer">10</div>

            <!--Score counter and Item Counter-->
            <div class="counterContainer">
                <div class="textCounter">
                    <div id="itemCounter">Question 1/5</div>
                    <div id="scoreCounter">Score: 0</div>
                </div>
                <div class="itemCounterBox">
                    <p class="diffText diffText-easy">Easy</p>
                    <div id="item1"></div>
                    <div id="item2"></div>
                    <div id="item3"></div>
                    <div id="item4"></div>
                    <p class="diffText diffText-ave">Normal</p>
                    <div id="item5"></div>
                    <div id="item6"></div>
                    <div id="item7"></div>
                    <p class="diffText diffText-hard">Hard</p>
                    <div id="item8"></div>
                    <div id="item9"></div>
                    <div id="item10"></div>
                </div>
            </div>

            

            <!--Question and choices box-->
            <div class="questionAndChoicesBox">
                <div id="question">Question asdasdajksdja sdja sdkla lksd alksdk ak djsklajsdlk alk dslka dkl akls dka lksd a</div>
                <div class="choice">
                    <div class="choiceBox">
                        <button id="A" class="letterChoice">adasdasdasdasdasd asd A</button>
                    </div>
                    <div class="choiceBox">
                        <button id="B" class="letterChoice">adsads adasdasd asdas B</button>
                    </div>
                    <div class="choiceBox">
                        <button id="C" class="letterChoice">adasda sdadsasda dsasd C</button>
                    </div>
                    <div class="choiceBox">
                        <button id="D" class="letterChoice">asdasda sdasda sdasdad D</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="resultContainer" id="resultContainer">
            <div class="congratsText">Congratulations!</div>
            <div class="percentText">You got <span id="percentage">100%</span> <br> correct answers!</div>
            <div class="medalBox">
                <div id="bronzeMedal" style="display: none;"><img src="bronze medal.png" alt=""></div>
                <div id="silverMedal" style="display: none;"><img src="silver medal.png" alt=""></div>
                <div id="goldMedal"><img src="gold medal.png" alt=""></div>
            </div>
            <div class="rightAndWrongCounter">
                <div class="correctBox">
                    <img src="check.png" alt="">
                    <p id="correctCount">0</p>
                </div>
                <div class="wrongBox">
                    <img src="wrong.png" alt="">
                    <p id="wrongCount">0</p>
                </div>
            </div>
            <div class="rightAndWrongImg">
                <div id="correctImg" style="display: none;"><img src="CongratsQuiz.gif" alt=""></div>
                <div id="wrongImg" style="display: none;"><img src="sadCat.gif" alt=""></div>
            </div>
        </div>

        <!--Next button container-->
        <div class="nextButtonContainer" id="nextButtonContainer">
            <button onclick="nextQuestion()" id="nextBtn">
                <img src="skip.png" alt="">
            </button>
        </div>

        <!--Form box-->
        <div class="formContainer" id="formContainer">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required> <br>
                <input id="gameTitle" type="text" name="gameTitle" placeholder="Game title" required> <br>
                <input id="week" type="text" name="week" placeholder="Week" required> <br>
                <input id="difficultyLevel" type="text" name="difficultyLevel" placeholder="Difficulty level" required> <br>
                <input id="easyScore" type="text" name="easyScore" placeholder="Easy Score" required> <br>
                <input id="normalScore" type="text" name="normalScore" placeholder="Normal Score" required> <br>
                <input id="hardScore" type="text" name="hardScore" placeholder="Hard Score" required> <br>
                <input id="itemTotal" type="text" name="itemTotal" placeholder="Total item" required> <br>
                <input id="scoreTotal" type="text" name="scoreTotal" placeholder="Total score" required> <br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>

        <!--Show form button container-->
        <div class="showFormButtonContainer" id="showFormButtonContainer">
            <button id="showFormBtn" onclick="showForm()">Tell us what you got!</button>
        </div>
    </div>

    <script>
        const startBtnContainer = document.getElementById('startBtnContainer')
        const quizContainer = document.getElementById('quizContainer')
        const resultContainer = document.getElementById('resultContainer')
        const nextBtn = document.getElementById('nextBtn')
        const formContainer = document.getElementById('formContainer')
        const showFormButtonContainer = document.getElementById('showFormButtonContainer')

        const displayQuestion = document.getElementById('question')
        const displayChoiceA = document.getElementById('A')
        const displayChoiceB = document.getElementById('B')
        const displayChoiceC = document.getElementById('C')
        const displayChoiceD = document.getElementById('D')
        
        const displayTimer = document.getElementById('timer')

        const displayItemCounter = document.getElementById('itemCounter')
        const displayScoreCounter = document.getElementById('scoreCounter')
        const item1 = document.getElementById('item1')
        const item2 = document.getElementById('item2')
        const item3 = document.getElementById('item3')
        const item4 = document.getElementById('item4')
        const item5 = document.getElementById('item5')
        const item6 = document.getElementById('item6')
        const item7 = document.getElementById('item7')
        const item8 = document.getElementById('item8')
        const item9 = document.getElementById('item9')
        const item10 = document.getElementById('item10')

        const bronzeMedal = document.getElementById('bronzeMedal')
        const silverMedal = document.getElementById('silverMedal')
        const goldMedal= document.getElementById('goldMedal')

        const userChoiceBtn = document.querySelectorAll('.letterChoice')
        const percentage = document.getElementById('percentage')

        let correctCount = document.getElementById('correctCount')
        let wrongCount = document.getElementById('wrongCount')

        let easyScore = 0
        let normalScore = 0
        let hardScore = 0

        let wrong = 0
        let correct = 0
        let currentQuestionIndex = 0
        let timerStart
        let second = 10
        let questionCounter = 1


        let questionList = [
            {
                question: "What does PHP stand for",
                a: "Hypertext Process",
                b: "Hyper Processor",
                c: "Hypertext Preprocessor",
                d: "Hyper Preprocessor",
                level: "easy",
                answer: "Hypertext Preprocessor"
            },
            {
                question: "Who created the PHP",
                a: "Rasmus Lerdorf",
                b: "Rasmus Leomord",
                c: "Marc Andreesen",
                d: "Brendan Eich",
                level: "easy",
                answer: "Rasumus Lerdorf"
            },
            {
                question: "What year did PHP was created?",
                a: "1993",
                b: "1994",
                c: "1995",
                d: "1996",
                level: "easy",
                answer: "1994"
            },
            {
                question: "When did PHP appear in the market?",
                a: "1993",
                b: "1994",
                c: "1995",
                d: "1996",
                level: "easy",
                answer: "1995"
            },
            {
                question: "What is the latest version of PHP?",
                a: "PHP 360",
                b: "PHP 7.4.0",
                c: "PHP 2012",
                d: "PHP 2.0.1",
                level: "average",
                answer: "PHP 7.4.0"
            },
            {
                question: "When the PHP 7.4.0 version was released?",
                a: "November 20",
                b: "November 23",
                c: "November 25",
                d: "November 28",
                level: "average",
                answer: "November 28"
            },
            {
                question: "PHP is a ______________________, which is used to design the dynamic web applications with MySQL database.",
                a: "Server side scripting language",
                b: "Database side scripting language",
                c: "HTML scripting side language",
                d: "CSS scripting side language",
                level: "average",
                answer: "Server side scripting language"
            },
            {
                question: "The PHP source code and software can be easily accessed online at no cost.",
                a: "Open script",
                b: "Open source",
                c: "Open code",
                d: "Open server",
                level: "hard",
                answer: "Open source"
            },
            {
                question: "A feature of PHP that is simple to incorporate PHP code within HTML tags and scripts.",
                a: "Excluded",
                b: "Concluded",
                c: "Stitched",
                d: "Embedded",
                level: "hard",
                answer: "Embedded"
            },
            {
                question: "What features of PHP is compatible with popular databases like MySQL, SQLite, ODBC, and more.",
                a: "Database",
                b: "Database support",
                c: "Datavase support",
                d: "Data support",
                level: "hard",
                answer: "Database support"
            },
        ]

        function exitQuiz() {
            window.location.href = "quizio.html"
        }

        function startGame() {
            //This will hide these values
            startBtnContainer.style.display = "none"
            //This will show these values
            quizContainer.style.display = "flex"

            //This will display score and item counter
            displayScoreCounter.innerHTML = "Score: " + correct
            displayItemCounter.innerHTML = "Question " + questionCounter + "/" + questionList.length
            item1.style.backgroundColor = "#548B7E"

            //Starts the timer
            timerStart = setInterval(counter, 1000)
            function counter() {
                displayTimer.innerHTML = second--

                if(second === -1) {
                    clearInterval(timerStart)

                    wrong

                    displayChoiceA.disabled = true
                    displayChoiceB.disabled = true
                    displayChoiceC.disabled = true
                    displayChoiceD.disabled = true

                    //This will reveal the correct answer
                    if(displayChoiceA.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceA.style.color = "green"
                        displayChoiceA.style.border = "3px solid green"
                    }
                    if(displayChoiceB.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceB.style.color = "green"
                        displayChoiceB.style.border = "3px solid green"
                    }
                    if(displayChoiceB.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceC.style.color = "green"
                        displayChoiceC.style.border = "3px solid green"
                    }
                    if(displayChoiceB.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceD.style.color = "green"
                        displayChoiceD.style.border = "3px solid green"
                    }
                    
                    //This will enable the next button after the user clicks an answer
                    document.getElementById('nextButtonContainer').style.display = "block"

                    
                }
            }

            //This will display the current question
            displayQuestion.innerHTML = questionList[currentQuestionIndex].question
            //This will display the choices
            displayChoiceA.innerHTML = questionList[currentQuestionIndex].a
            displayChoiceB.innerHTML = questionList[currentQuestionIndex].b
            displayChoiceC.innerHTML = questionList[currentQuestionIndex].c
            displayChoiceD.innerHTML = questionList[currentQuestionIndex].d
        }

        userChoiceBtn.forEach(bt => {
            bt.addEventListener('click', (e)=>{
                let userAnswer = e.target.innerHTML

                //If the answer is correct this will run
                if(userAnswer === questionList[currentQuestionIndex].answer) {

                    //This will change the color if the answer is correct
                    e.target.style.color = "green"

                    //This will update the score every correct answer
                    correct++
                    displayScoreCounter.innerHTML = "Score: " + correct

                    //This will stop the timer if the user clicks an answer
                    clearInterval(timerStart)

                    //This will disable the buttons once the user clicks an answer
                    displayChoiceA.disabled = true
                    displayChoiceB.disabled = true
                    displayChoiceC.disabled = true
                    displayChoiceD.disabled = true

                    //This will show the next button
                    document.getElementById('nextButtonContainer').style.display = "block"

                    //This will color the answer of the user
                    e.target.style.color = "green"
                    e.target.style.border = "3px solid green"

                    if(questionList[currentQuestionIndex].level === "easy") {
                        if(questionList[currentQuestionIndex].answer === userAnswer){
                            easyScore++
                            console.log("easy score: " + easyScore)
                        }
                    }
                    else if(questionList[currentQuestionIndex].level === "average") {
                        if(questionList[currentQuestionIndex].answer === userAnswer){
                            normalScore++
                            console.log("normal score: " + normalScore)
                        }
                    }
                    else if(questionList[currentQuestionIndex].level === "hard") {
                        if(questionList[currentQuestionIndex].answer === userAnswer){
                            hardScore++
                            console.log("hard score: " + hardScore)
                        }
                    }
                    
                }

                //If the answer is wrong this will run
                else if(userAnswer !== questionList[currentQuestionIndex].answer) {
                    

                    //This will update the score every wrong answer
                    wrong++

                    //This will stop the timer if the user clicks an answer
                    clearInterval(timerStart)

                    //This will disable the buttons once the user clicks an answer
                    displayChoiceA.disabled = true
                    displayChoiceB.disabled = true
                    displayChoiceC.disabled = true
                    displayChoiceD.disabled = true

                    //This will enable the next button after the user clicks an answer
                    document.getElementById('nextButtonContainer').style.display = "block"

                    //This will change the color if the answer is correct
                    e.target.style.color = "red"
                    e.target.style.border = "3px solid red"

                    //This will reveal the correct answer
                    if(displayChoiceA.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceA.style.color = "green"
                        displayChoiceA.style.border = "3px solid green"
                    }
                    if(displayChoiceB.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceB.style.color = "green"
                        displayChoiceB.style.border = "3px solid green"
                    }
                    if(displayChoiceC.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceC.style.color = "green"
                        displayChoiceC.style.border = "3px solid green"
                    }
                    if(displayChoiceD.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceD.style.color = "green"
                        displayChoiceD.style.border = "3px solid green"
                    }
                }

                //This will check if all of the question is done
                let sum = wrong + correct
                if(sum === 10) {
                    //This will hide this value
                    quizContainer.style.display = "none"
                    document.getElementById('nextButtonContainer').style.display = "none"
                    //This will show this value
                    resultContainer.style.display = "flex"
                    showFormButtonContainer.style.display = "flex"
                }

                correctCount.innerHTML = correct
                wrongCount.innerHTML = wrong

                //This will show the result of the quiz
                if(correct === 0) {
                    percentage.innerHTML = "0%"
                    percentage.style.color = "darkred"

                    document.getElementById('wrongImg').style.display = "block"
                    document.getElementById('correctImg').style.display = "none"

                    //This will show base on user score
                    bronzeMedal.style.display = "block"
                    silverMedal.style.display = "none"
                    goldMedal.style.display = "none"
                }
                else if(correct === 1) {
                    percentage.innerHTML = "10%"
                    percentage.style.color = "darkred"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "block"
                    silverMedal.style.display = "none"
                    goldMedal.style.display = "none"
                }
                else if(correct === 2) {
                    percentage.innerHTML = "20%"
                    percentage.style.color = "darkred"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "block"
                    silverMedal.style.display = "none"
                    goldMedal.style.display = "none"
                }
                else if(correct === 3) {
                    percentage.innerHTML = "30%"
                    percentage.style.color = "darkred"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "block"
                    goldMedal.style.display = "none"
                }
                else if(correct === 4) {
                    percentage.innerHTML = "40%"
                    percentage.style.color = "orange"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "block"
                    goldMedal.style.display = "none"
                }
                else if(correct === 5) {
                    percentage.innerHTML = "50%"
                    percentage.style.color = "orange"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "block"
                    goldMedal.style.display = "none"
                }
                else if(correct === 6) {
                    percentage.innerHTML = "60%"
                    percentage.style.color = "gold"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "block"
                    goldMedal.style.display = "none"
                }
                else if(correct === 7) {
                    percentage.innerHTML = "70%"
                    percentage.style.color = "gold"
                    
                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "block"
                    goldMedal.style.display = "none"
                }
                else if(correct === 8) {
                    percentage.innerHTML = "80%"
                    percentage.style.color = "yellowgreen"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "none"
                    goldMedal.style.display = "block"
                }
                else if(correct === 9) {
                    percentage.innerHTML = "90%"
                    percentage.style.color = "yellowgreen"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "none"
                    goldMedal.style.display = "block"
                }
                else if(correct === 10) {
                    percentage.innerHTML = "100%"
                    percentage.style.color = "green"

                    document.getElementById('wrongImg').style.display = "none"
                    document.getElementById('correctImg').style.display = "block"

                    //This will show base on user score
                    bronzeMedal.style.display = "none"
                    silverMedal.style.display = "none"
                    goldMedal.style.display = "block"
                }
                
            })
        })

        function nextQuestion() {
            currentQuestionIndex++
            questionCounter++

            second = 10
            displayTimer.innerHTML = second
             //Starts the timer
             timerStart = setInterval(counter, 1000)
            function counter() {
                displayTimer.innerHTML = second--

                if(second === -1) {
                    clearInterval(timerStart)

                    wrong++

                    displayChoiceA.disabled = true
                    displayChoiceB.disabled = true
                    displayChoiceC.disabled = true
                    displayChoiceD.disabled = true
                    
                    //This will enable the next button after the user clicks an answer
                    document.getElementById('nextButtonContainer').style.display = "block"

                    //This will reveal the correct answer
                    if(displayChoiceA.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceA.style.color = "green"
                        displayChoiceA.style.border = "3px solid green"
                    }
                    if(displayChoiceB.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceB.style.color = "green"
                        displayChoiceB.style.border = "3px solid green"
                    }
                    if(displayChoiceC.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceC.style.color = "green"
                        displayChoiceC.style.border = "3px solid green"
                    }
                    if(displayChoiceD.innerHTML === questionList[currentQuestionIndex].answer) {
                        displayChoiceD.style.color = "green"
                        displayChoiceD.style.border = "3px solid green"
                    }

                }
            }

            //This will display current question number and score
            displayItemCounter.innerHTML = "Question " + questionCounter + "/" + questionList.length
            displayScoreCounter.innerHTML = "Score: " + correct
            //This will disable the next button
            document.getElementById('nextButtonContainer').style.display = "none"

            //This will enable the choices button
            displayChoiceA.disabled = false
            displayChoiceB.disabled = false
            displayChoiceC.disabled = false
            displayChoiceD.disabled = false

            //This will turn back the colors to black
            displayChoiceA.style.color = "black"
            displayChoiceB.style.color = "black"
            displayChoiceC.style.color = "black"
            displayChoiceD.style.color = "black"
            displayChoiceA.style.border = "none"
            displayChoiceB.style.border = "none"
            displayChoiceC.style.border = "none"
            displayChoiceD.style.border = "none"
            
            //This will display question and choices
            displayQuestion.innerHTML = questionList[currentQuestionIndex].question
            displayChoiceA.innerHTML = questionList[currentQuestionIndex].a
            displayChoiceB.innerHTML = questionList[currentQuestionIndex].b
            displayChoiceC.innerHTML = questionList[currentQuestionIndex].c
            displayChoiceD.innerHTML = questionList[currentQuestionIndex].d

            if(questionCounter === 1) {
                item1.style.backgroundColor = "#548B7E"
            }
            else if(questionCounter === 2) {
                item2.style.backgroundColor = "#548B7E"
            }
            else if(questionCounter === 3) {
                item3.style.backgroundColor = "#548B7E"
            }
            else if(questionCounter === 4) {
                item4.style.backgroundColor = "#548B7E"
            }
            else if(questionCounter === 5) {
                item5.style.backgroundColor = "#C97D5D"
            }
            else if(questionCounter === 6) {
                item6.style.backgroundColor = "#C97D5D"
            }
            else if(questionCounter === 7) {
                item7.style.backgroundColor = "#C97D5D"
            }
            else if(questionCounter === 8) {
                item8.style.backgroundColor = "#AD4848"
            }
            else if(questionCounter === 9) {
                item9.style.backgroundColor = "#AD4848"
            }
            else if(questionCounter === 10) {
                item10.style.backgroundColor = "#AD4848"
            }
        }

        function showForm() {
            formContainer.style.display = "flex"
            resultContainer.style.display = "none"
            showFormButtonContainer.style.display = "none"

            document.getElementById('gameTitle').style.display = "none"
            document.getElementById('difficultyLevel').style.display = "none"
            document.getElementById('week').style.display = "none"
            document.getElementById('itemTotal').style.display = "none"
            document.getElementById('easyScore').style.display = "none"
            document.getElementById('normalScore').style.display = "none"
            document.getElementById('hardScore').style.display = "none"
            document.getElementById('scoreTotal').style.display = "none"
            
            let scoreTotal = easyScore + normalScore + hardScore

            document.getElementById('gameTitle').value = "QuizIo"
            document.getElementById('difficultyLevel').value = "easy"
            document.getElementById('week').value = "5"
            document.getElementById('itemTotal').value =  "10"
            document.getElementById('easyScore').value = easyScore
            document.getElementById('normalScore').value = normalScore
            document.getElementById('hardScore').value = hardScore
            document.getElementById('scoreTotal').value = scoreTotal
        }
    </script>
</body>
</html>