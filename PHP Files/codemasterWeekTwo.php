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
    <title>Codemasters Week 2</title>
    <style>
        .container .computer .computer-head .mainContent .quizBox .question pre {
            background-color: transparent;
        }
        
        #username {
            width: 90%;
            margin: none;
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
                                <input id="username" type="text" name="username" placeholder="Username" required> <br>
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
                        <div class="question">
                            <!-- Easy question -->
                            <pre id="question1" style="display: none;">
&ensp;< script>
    let l = 5
    document.write(l)
&ensp;< /script>
                            </pre>
                            <pre id="question2" style="display: none;">
&ensp;< script>  
    let i = 0
    function add() {
        document.write(5 + i)
    }
    add()
&ensp;< /script>
                            </pre>
                            <pre id="question3" style="display: none;">
&ensp;< script>  
    const fruit = "banana"
    document.write(fruit)
&ensp;< /script>
                            </pre>
                            <pre id="question4" style="display: none;">
&ensp;< script>  
    const name = "Albert"
    const age = 24
    document.write(name + " age is " + age++)
&ensp;< /script>
                            </pre>

                            <!-- Normal question -->
                            <pre id="question5" style="display: none;">
&ensp;< script>  
    var x = 10;
    function test() {
        var x = 20;
    }
    document.write(test());
&ensp;< /script>
                            </pre>
                            <pre id="question6" style="display: none;">
&ensp;< script>  
    let x = 5
    if(x <= 10){
        document.write("Low number")
    }
&ensp;< /script>
                            </pre>
                            <pre id="question7" style="display: none;">
&ensp;< script>  
    let x = 10
    if(x === 10){
        document.write("High number")
    }
&ensp;< /script>
                            </pre>

                            <!-- Hard question -->
                            <pre id="question8" style="display: none;">
&ensp;< script>  
    var x = 10
    function test() {
        var x = 20
    }
    document.write(x)
&ensp;< /script>
                            </pre>
                            <pre id="question9" style="display: none;">
&ensp;< script>  
    var x = 10;
    function test() {
        var x = 20;
        document.write(x)
    }
    test()
&ensp;< /script>
                            </pre>
                            <pre id="question10" style="display: none;">
&ensp;< script>  
    var x = 10;
    function test() {
        x = 20;
        document.write(x + 10);
    }
    test();
&ensp;< /script>
                            </pre>
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
        const nextBtn = document.getElementById('nextBtn')
        const submitBtn = document.getElementById('submitBtn')
        const userAnswer = document.getElementById('userAnswer')

        const showFormBtnContainer = document.getElementById('showFormBtnContainer')
        const userAnswerContainer = document.getElementById('userAnswerBox')

        const question1 = document.getElementById('question1')
        const question2 = document.getElementById('question2')
        const question3 = document.getElementById('question3')
        const question4 = document.getElementById('question4')
        const question5 = document.getElementById('question5')
        const question6 = document.getElementById('question6')
        const question7 = document.getElementById('question7')
        const question8 = document.getElementById('question8')
        const question9 = document.getElementById('question9')
        const question10 = document.getElementById('question10')

        const displayCorrectItem = document.getElementById('correctCount')
        const displayWrongItem = document.getElementById('wrongCount')

        const resultContainer = document.getElementById('resultContainer')
        const showFormBtn = document.getElementById('showFormBtnContainer')

        const displayTimer = document.getElementById('timer')

        const medal = document.getElementById('medal')

        let correct = 0
        let wrong = 0
        let second = 15
        let totalScore

        let easyScore = 0
        let normalScore = 0
        let hardScore = 0

        let currentQuestion = 1
        let currentAnswerIndex = 0

        let answerList = [
            "5",
            "5",
            "banana",
            "Albert is 25",

            "undefined",
            "Low number",
            "High number",

            "10",
            "20",
            "30"
        ]

        //Display the initial score
        displayCorrectItem.innerHTML = correct
        displayWrongItem.innerHTML = wrong

        //This will disable the next button
        nextBtn.disabled = true
        
        //This will start the timer
        let timerStart = setInterval(counter, 1000)
        function counter() {
            displayTimer.innerHTML = "00:" + second--

            if(second === -1) {
                //This will stop the timer
                clearInterval(timerStart)

                //This will show if the user didn't submit the answer in time
                userAnswerContainer.style.backgroundColor = "#FBA1A1"
                userAnswerContainer.style.border = "solid #FF0000"

                //Prevents the user to type answer
                userAnswer.disabled = true

                //This will display the correct answer
                userAnswer.value = "Correct answer: '" + answerList[currentAnswerIndex] + "'"
                
                nextBtn.disabled = false
                submitBtn.disabled = true

                //Update  and displays the score
                wrong++
                displayWrongItem.innerHTML = wrong

            }
        }

        //This will show the first quesiton
        question1.style.display = "block"

        //This will show the next question
        function nextQuestion() {
            second = 15
            timerStart = setInterval(counter, 1000)
            function counter() {
                displayTimer.innerHTML = "00:" + second--

                if(second === -1) {
                    //This will stop the timer
                    clearInterval(timerStart)

                    //This will show if the user didn't submit the answer in time
                    userAnswerContainer.style.backgroundColor = "#FBA1A1"
                    userAnswerContainer.style.border = "solid #FF0000"

                    //Prevents the user to type answer
                    userAnswer.disabled = true

                    //This will display the correct answer
                    userAnswer.value = "Correct answer: '" + answerList[currentAnswerIndex] + "'"
                    
                    nextBtn.disabled = false
                    submitBtn.disabled = true

                    //Update  and displays the score
                    wrong++
                    displayWrongItem.innerHTML = wrong

                    let totalScore = correct + wrong
                    if(totalScore === 10) {
                        question10.style.display = "none"
                        submitBtn.style.display = "none"
                        nextBtn.style.display = "none"
                        userAnswer.style.display = "none"
                        userAnswerContainer.style.display = "none"
                        document.getElementById('userAnswerBox').style.display = "none"
                        document.getElementById('nextBtnContainer').style.display = "none"
                        document.getElementById('submitBtnContainer').style.display = "none"

                        document.getElementById('scoreText').innerHTML = "You solved " + correct + " problems!"
                        
                        resultContainer.style.display = "block"
                        showFormBtnContainer.style.display = "flex"

                        if(correct == 0 || correct == 1 || correct == 2 || correct == 3) {
                            medal.src = "bronze medal.png"
                        }
                        else if(correct == 4 || correct == 5 || correct == 6 || correct == 7) {
                            medal.src = "silver medal.png"
                        }
                        else if(correct == 8 || correct == 9 || correct == 10) {
                            medal.src = "gold medal.png"
                        }
                    }

                }
            }

            currentAnswerIndex++
            currentQuestion++

            nextBtn.disabled = true
            submitBtn.disabled = false
            userAnswer.disabled = false

            userAnswer.value = ""
            userAnswerContainer.style.backgroundColor = "transparent"
            userAnswerContainer.style.border = "3px solid black"

            if(currentQuestion === 2) {
                question1.style.display = "none"
                question2.style.display = "block"
                document.getElementById("item2").style.backgroundColor = "#548B7E"
            }
            else if(currentQuestion === 3) {
                question2.style.display = "none"
                question3.style.display = "block"
                document.getElementById("item3").style.backgroundColor = "#548B7E"
            }
            else if(currentQuestion === 4) {
                question3.style.display = "none"
                question4.style.display = "block"
                document.getElementById("item4").style.backgroundColor = "#548B7E"
            }
            else if(currentQuestion === 5) {
                question4.style.display = "none"
                question5.style.display = "block"
                document.getElementById("item5").style.backgroundColor = "#C97D5D"

            }
            else if(currentQuestion === 6) {
                question5.style.display = "none"
                question6.style.display = "block"
                document.getElementById("item6").style.backgroundColor = "#C97D5D"

            }
            else if(currentQuestion === 7) {
                question6.style.display = "none"
                question7.style.display = "block"
                document.getElementById("item7").style.backgroundColor = "#C97D5D"

            }
            else if(currentQuestion === 8) {
                question7.style.display = "none"
                question8.style.display = "block"
                document.getElementById("item8").style.backgroundColor = "#AD4848"
            }
            else if(currentQuestion === 9) {
                question8.style.display = "none"
                question9.style.display = "block"
                document.getElementById("item9").style.backgroundColor = "#AD4848"
            }
            else if(currentQuestion === 10) {
                question9.style.display = "none"
                question10.style.display = "block"
                document.getElementById("item10").style.backgroundColor = "#AD4848"
            }
        }

        //This will check the answer
        function submitAnswer() {
            clearInterval(timerStart)
            let userSubmittedAnswer = userAnswer.value.toLowerCase()
            let correctAnswer = answerList[currentAnswerIndex].toLowerCase()

            //This will run if the answer is correct
            if(userSubmittedAnswer === correctAnswer){
                userAnswerContainer.style.backgroundColor = "#9EFF9E"
                userAnswerContainer.style.border = "3px solid #008000"

                submitBtn.disabled = true
                userAnswer.disabled = true

                correct++
                displayCorrectItem.innerHTML = correct

                nextBtn.disabled = false

                if(currentQuestion === 1 || currentQuestion === 2 || currentQuestion === 3 || currentQuestion === 4) {
                    easyScore++
                    console.log("easy score: " + easyScore);
                    console.log(currentQuestion)
                }
                else if(currentQuestion === 5 || currentQuestion === 6 || currentQuestion === 7) {
                    normalScore++
                    console.log("normal score: " + normalScore);
                    console.log(currentQuestion);
                }
                else if(currentQuestion === 8 || currentQuestion === 9 || currentQuestion === 10) {
                    hardScore++
                    console.log("hard score: " + hardScore);
                    console.log(currentQuestion);
                }
            }
            else if(userSubmittedAnswer !== correctAnswer){
                userAnswerContainer.style.backgroundColor = "#FBA1A1"
                userAnswerContainer.style.border = "solid #FF0000"

                submitBtn.disabled = true
                userAnswer.disabled = true

                wrong++
                displayWrongItem.innerHTML = wrong

                nextBtn.disabled = false

                //This will display the correct answer
                userAnswer.value = "Correct answer: '" + answerList[currentAnswerIndex] + "'"
            }

            totalScore = correct + wrong

            if(totalScore === 10) {
                question10.style.display = "none"
                submitBtn.style.display = "none"
                nextBtn.style.display = "none"
                userAnswer.style.display = "none"
                userAnswerContainer.style.display = "none"
                document.getElementById('userAnswerBox').style.display = "none"
                document.getElementById('nextBtnContainer').style.display = "none"
                document.getElementById('submitBtnContainer').style.display = "none"

                document.getElementById('scoreText').innerHTML = "You solved " + correct + " problems!"
                
                resultContainer.style.display = "block"
                showFormBtnContainer.style.display = "flex"

                if(correct == 0 || correct == 1 || correct == 2 || correct == 3) {
                    medal.src = "bronze medal.png"
                }
                else if(correct == 4 || correct == 5 || correct == 6 || correct == 7) {
                    medal.src = "silver medal.png"
                }
                else if(correct == 8 || correct == 9 || correct == 10) {
                    medal.src = "gold medal.png"
                }
            }
        }

        //This will show the form button
        function showFormCon() {
            resultContainer.style.display = "none"
            showFormBtnContainer.style.display = "none"
            document.getElementById('formContainer').style.display = "flex"

            document.getElementById('gameTitle').style.display = "none"
            document.getElementById('week').style.display = "none"
            document.getElementById('easyScore').style.display = "none"
            document.getElementById('normalScore').style.display = "none"
            document.getElementById('hardScore').style.display = "none"
            document.getElementById('scoreTotal').style.display = "none"
            document.getElementById('itemTotal').style.display = "none"

            document.getElementById('gameTitle').value = "codemaster"
            document.getElementById('week').value = "2"
            document.getElementById('easyScore').value = easyScore
            document.getElementById('normalScore').value = normalScore
            document.getElementById('hardScore').value = hardScore
            document.getElementById('scoreTotal').value = hardScore + normalScore + easyScore
            document.getElementById('itemTotal').value = "10"
        }

    </script>
</body>
</html>