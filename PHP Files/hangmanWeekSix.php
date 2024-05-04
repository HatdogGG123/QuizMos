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
            
            header("Location: hangman.html");
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
    <link rel="stylesheet" href="hangmanMainGame.css">
    <title>Hangman Week 6</title>

    <style>
        iframe {
            visibility: hidden;
            position: absolute;
        }

        @media screen and (max-width: 430px) {
            .container .notepadContainer .notepad .mainContent .quizBox .hangmanImageContainer .hangmanImage img {
                height: 150px;
            }
            
            .container .notepadContainer .notepad .mainContent .quizBox .itemContainer {
                transform: scale(0.95);
            }

            .container .notepadContainer .notepad .mainContent .quizBox #alphabet-container button {
                font-size: 23px;
            }
        }
        @media screen and (max-width: 320px) {
            .container .notepadContainer .notepad .mainContent .quizBox .itemContainer {
                transform: scale(0.7);
            }
            .container .notepadContainer .notepad .mainContent .quizBox .hangmanImageContainer {
                height: fit-content;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="backBtn" id="backBtn">
            <a href="hangman.html">
                <button>
                    <img src="back-arrow.png" alt="">
                </button>
            </a>
        </div>

        <iframe width="841" height="473" src="https://www.youtube.com/embed/GNDWNW3IKwU?autoplay=1&loop=1" title="Cute Background Music No Copyright / Funny Background Music" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <div class="notepadContainer">
            <div class="notepad">
                <div class="hole">
                    <div class="hole1"></div>
                    <div class="hole2"></div>
                </div>
                <div class="metal">
                    <div class="metal1"></div>
                    <div class="metal2"></div>
                </div>
                <div class="shine">
                    <div class="shine1"></div>
                    <div class="shine2"></div>
                </div>

                <div class="mainContent">
                    <div class="startBox" id="startBox">
                        <button id="startBtn" onclick="startGame()">Start</button>
                    </div>
                    
                    <div class="quizBox" id="quizBox">
                        <div class="itemContainer">
                            <p class="diffText diffText-easy">Easy</p>
                            <div id="item1"></div>
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
                        <div id="questionContainer">Question here</div>
                        <div class="hangmanImageContainer">
                            <div class="hangmanImage" id="hangmanImage">
                                <img src="hangman image 1.png" id="hangmanImg1">
                                <img src="hangman image 2.png" id="hangmanImg2" style="display: none;">
                                <img src="hangman image 3.png" id="hangmanImg3" style="display: none;">
                                <img src="hangman image 4.png" id="hangmanImg4" style="display: none;">
                                <img src="hangman image 5.png" id="hangmanImg5" style="display: none;">
                                <img src="hangman image 6.png" id="hangmanImg6" style="display: none;">
                                <img src="hangman image 7.png" id="hangmanImg7" style="display: none;">
                                <img src="hangman image 8.png" id="hangmanImg8" style="display: none;">
                                <img src="hangman image 9.png" id="hangmanImg9" style="display: none;">
                                <img src="hangman image 10.png" id="hangmanImg10" style="display: none;">
                            </div>
                        </div>
                        <div id="word-container"></div>
                        <div id="guessContainer"></div>
                        <div id="alphabet-container"></div>
                    </div>
    
                    <div class="resultBox1" id="resultBox1">
                        <div id="text">Congratulations! You win!</div>
                        <div class="image">
                            <img src="DancingStickman.gif" id="correctAnsImg">
                            <img src="grave.png" id="wrongAnsImg" style="display: none;">
                        </div>
                        <div class="nextAndExitBtn">
                            <button class="nextBtn" onclick="resetGame()">Next</button> 
                        </div>
                    </div>
    
                    <div class="resultBox2" id="resultBox2">
                        <div class="congratsTxt">Congratulations!</div>
                        <div class="medalBox3" id="bronzeMedal">
                            <img src="bronze medal.png" alt="">
                        </div>
                        <div class="medalBox2" id="silverMedal" style="display: none;">
                            <img src="silver medal.png" alt="">
                        </div>
                        <div class="medalBox1" id="goldMedal" style="display: none;">
                            <img src="gold medal.png" alt="">
                        </div>
                        <div class="correctAndWrongBox">
                            <div class="correctBox">
                                <img src="check.png" alt="">
                                <p id="correctAnswerCount">0</p>
                            </div>
                            <div class="wrongBox">
                                <img src="wrong.png" alt="">
                                <p id="wrongAnswerCount">0</p>
                            </div>
                        </div>  
                        <div class="formBtn">
                            <button onclick="showForm()">Tell us what you got!</button>
                        </div>                  
                    </div>
    
                    <div class="form" id="form">
                        <form action="" method="post">
                            <input type="text" name="username" placeholder="Username" required> <br>
                            <input id="gameTitle" type="text" name="gameTitle" placeholder="Game title" required> <br>
                            <input id="week" type="text" name="week" placeholder="week" required> <br>
                            <input id="difficultyLevel" type="text" name="difficultyLevel" placeholder="Difficulty level" required> <br>
                            <input id="score" type="text" name="score" placeholder="Score" required> <br>
                            <input id="easyScore" type="text" name="easyScore" placeholder="Easy Score" required> <br>
                            <input id="normalScore" type="text" name="normalScore" placeholder="Normal Score" required> <br>
                            <input id="hardScore" type="text" name="hardScore" placeholder="Hard Score" required> <br>
                            <input id="scoreTotal" type="text" name="scoreTotal" placeholder="Total Score" required> <br>
                            <input id="itemTotal" type="text" name="itemTotal" placeholder="Total Score" required> <br>
                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // Array of words and questions
    const words = ['amp', 'xampp', 'wamp', 'lamp', 'php', 'semi colon', 'web browser', 'nineth', 'seventh', 'fourth'];
    const question = [
        "To run PHP codes, it is suggested to install ___ software stack.",
        "What AMP stack is used for cross platform?",
        "What AMP stack is used for windows?",
        "What AMP stack is used for linux?",
        
        "In what tags does the PHP code should be written?",
        "All PHP code or line should end with _________",
        "PHP code runs in different ___ _______",
        
        "Start the appache server and MySQL and open your php file. (Answer should be written in ordinal number ex. first, second, third)",
        "A finish window will display after installation. Click on the finish button. (Answer should be written in ordinal number ex. first, second, third)",
        "Choose a folder where you want to install XAMPP. (Answer should be written in ordinal number ex. first, second, third)"
    ]
    
    const hangmanImgOne = document.getElementById('hangmanImg1')
    const hangmanImgTwo = document.getElementById('hangmanImg2')
    const hangmanImgThree = document.getElementById('hangmanImg3')
    const hangmanImgFour = document.getElementById('hangmanImg4')
    const hangmanImgFive = document.getElementById('hangmanImg5')
    const hangmanImgSix = document.getElementById('hangmanImg6')
    const hangmanImgSeven = document.getElementById('hangmanImg7')
    const hangmanImgEight = document.getElementById('hangmanImg8')
    const hangmanImgNine = document.getElementById('hangmanImg9')
    const hangmanImgTen = document.getElementById('hangmanImg10')

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
    
    const questionContainer = document.getElementById('questionContainer')
    const wordContainer = document.getElementById('word-container')
    const remainingGuessCounter = document.getElementById('guessContainer')

    const startContainer = document.getElementById('startBox')
    const quizContainer = document.getElementById('quizBox')
    const resultContainer1 = document.getElementById('resultBox1')
    const resultContainer2 = document.getElementById('resultBox2')
    const formContainer = document.getElementById('form')
    const backBtnContainer = document.getElementById('backBtn')

    const bronzeMedal = document.getElementById('bronzeMedal')
    const silverMedal = document.getElementById('silverMedal')
    const goldMedal = document.getElementById('goldMedal')

    const input = document.querySelectorAll('#input')
    
    let chosenWord = '';
    let guessedLetters = [];
    let remainingGuesses = 10;
    let questionCount = 0
    let correctAnswerCount = 0
    let wrongAnswerCount = 0
    let currentIndex = 0

    let easyScore = 0
    let normalScore = 0
    let hardScore = 0
    

    selectRandomWord();
    displayWord();
    displayAlphabetButtons();
    displayQuestion();
    remainingGuessCounter.innerHTML = "Remaining guess: " + remainingGuesses
    
    //Starts the game
    function startGame() {
        selectRandomWord();
        displayWord();
        displayAlphabetButtons();
        displayQuestion();
        remainingGuessCounter.innerHTML = "Remaining guess: " + remainingGuesses

        backBtnContainer.style.visibility = "hidden"
        startContainer.style.display = "none"
        quizContainer.style.display = "flex"
    }
    
    //Function to select a word from the array
    function selectRandomWord() {
        chosenWord = words[currentIndex];
    }
    
    //Function to display the Question
    function displayQuestion() {
        questionContainer.innerHTML = question[currentIndex]
    }
    
    // Function to display the word with hidden letters
    function displayWord() {
        wordContainer.innerHTML = '';
        for (let letter of chosenWord) {
            if (guessedLetters.includes(letter) || !(/[a-zA-Z]/).test(letter)) {
                wordContainer.innerHTML += letter + ' ';
            } else {
                wordContainer.innerHTML += '_ ';
            }
        }
    }
    
    // Function to display the alphabet buttons
    function displayAlphabetButtons() {
        const alphabetContainer = document.getElementById('alphabet-container');
        alphabetContainer.innerHTML = '';
        for (let i = 65; i <= 90; i++) {
            const letter = String.fromCharCode(i);
            alphabetContainer.innerHTML += `<button id="letterBtn" onclick="guessLetter('${letter}')">${letter}</button>`;
        }
    }
    
    // Function to handle letter guesses
    function guessLetter(letter) {
        letter = letter.toLowerCase(); // Convert letter to lowercase for case-insensitive comparison
        if (!guessedLetters.includes(letter)) {
            guessedLetters.push(letter);
            if (!chosenWord.includes(letter)) {
                remainingGuesses--;

                remainingGuessCounter.innerHTML = "Remaining guess: " + remainingGuesses 
                
                if(remainingGuesses === 9) {
                    hangmanImgOne.style.display = "none"
                    hangmanImgTwo.style.display = "block"
                }
                else if(remainingGuesses === 8) {
                    hangmanImgTwo.style.display = "none"
                    hangmanImgThree.style.display = "block"
                }
                else if(remainingGuesses === 7) {
                    hangmanImgThree.style.display = "none"
                    hangmanImgFour.style.display = "block"
                }
                else if(remainingGuesses === 6) {
                    hangmanImgFour.style.display = "none"
                    hangmanImgFive.style.display = "block"
                }
                else if(remainingGuesses === 5) {
                    hangmanImgFive.style.display = "none"
                    hangmanImgSix.style.display = "block"
                }
                else if(remainingGuesses === 4) {
                    hangmanImgSix.style.display = "none"
                    hangmanImgSeven.style.display = "block"
                }
                else if(remainingGuesses === 3) {
                    hangmanImgSeven.style.display = "none"
                    hangmanImgEight.style.display = "block"
                }
                else if(remainingGuesses === 2) {
                    hangmanImgEight.style.display = "none"
                    hangmanImgNine.style.display = "block"
                }
                else if(remainingGuesses === 1) {
                    hangmanImgNine.style.display = "none"
                    hangmanImgTen.style.display = "block"
                }
                else if(remainingGuesses === 0) {
                    
                    quizContainer.style.display = "none"
                }
            }
            displayWord();
            displayAlphabetButtons();
            checkGameStatus();
        }
    }
    
    // Function to check the game status (win/lose)
    function checkGameStatus() {
        if (remainingGuesses === 0) {
            document.getElementById('text').innerHTML = 'You lose! The word was: ' + chosenWord.toLocaleUpperCase()
            wrongAnswerCount++
            document.getElementById('wrongAnswerCount').innerHTML = wrongAnswerCount

            //diplays the result box
            resultContainer1.style.display = "flex"
            document.getElementById('wrongAnsImg').style.display = "flex"
            document.getElementById('correctAnsImg').style.display = "none"
        } 
        
        else if (!document.getElementById('word-container').innerText.includes('_')) {
            document.getElementById('text').innerHTML = 'Congratulations! You win!'
            correctAnswerCount++
            document.getElementById('correctAnswerCount').innerHTML = correctAnswerCount

            //displays the result box
            quizContainer.style.display = "none"
            resultContainer1.style.display = "flex"
            document.getElementById('correctAnsImg').style.display = "flex"
            document.getElementById('wrongAnsImg').style.display = "none"

            if(currentIndex === 0 || currentIndex === 1 || currentIndex === 2 || currentIndex === 3){
                easyScore++
                console.log("easy score = " + easyScore);
            }
            else if(currentIndex === 4 || currentIndex === 5 || currentIndex === 6){
                normalScore++
                console.log("normal score = " + normalScore);
            }
            else if(currentIndex === 7 || currentIndex === 8 || currentIndex === 9) {
                hardScore++
                console.log("hard score = " + hardScore);
            }
            
        }
    }
    
    // Function to reset the game
    function resetGame() {
        guessedLetters = [];
        remainingGuesses = 10;
        
        //Hides the other parts of hangman image
        hangmanImgOne.style.display = "none"
        hangmanImgTwo.style.display = "none"
        hangmanImgThree.style.display = "none"
        hangmanImgFour.style.display = "none"
        hangmanImgFive.style.display = "none"
        hangmanImgSix.style.display = "none"
        hangmanImgSeven.style.display = "none"
        hangmanImgEight.style.display = "none"
        hangmanImgNine.style.display = "none"
        hangmanImgTen.style.display = "none"

        //show parts of the hangman image every wrong letter guess
        if(remainingGuesses === 10) {
            hangmanImgOne.style.display = "block"
        }
        else if(remainingGuesses === 9) {
            hangmanImgOne.style.display = "none"
            hangmanImgTwo.style.display = "block"
        }
        else if(remainingGuesses === 8) {
            hangmanImgTwo.style.display = "none"
            hangmanImgThree.style.display = "block"
        }
        else if(remainingGuesses === 7) {
            hangmanImgThree.style.display = "none"
            hangmanImgFour.style.display = "block"
        }
        else if(remainingGuesses === 6) {
            hangmanImgFour.style.display = "none"
            hangmanImgFive.style.display = "block"
        }
        else if(remainingGuesses === 5) {
            hangmanImgFive.style.display = "none"
            hangmanImgSix.style.display = "block"
        }
        else if(remainingGuesses === 4) {
            hangmanImgSix.style.display = "none"
            hangmanImgSeven.style.display = "block"
        }
        else if(remainingGuesses === 3) {
            hangmanImgSeven.style.display = "none"
            hangmanImgEight.style.display = "block"
        }
        else if(remainingGuesses === 2) {
            hangmanImgEight.style.display = "none"
            hangmanImgNine.style.display = "block"
        }
        else if(remainingGuesses === 1) {
            hangmanImgNine.style.display = "none"
            hangmanImgTen.style.display = "block"
        }
        else if(remainingGuesses === 0) {
            
            quizContainer.style.display = "none"
        }

        //hides the result box and show the quiz box again
        quizContainer.style.display = "flex"
        resultContainer1.style.display = "none"

        document.getElementById('wrongAnsImg').style.display = "none"
        document.getElementById('correctAnsImg').style.display = "none"
    
        remainingGuessCounter.innerHTML = "Remaining guess: " + remainingGuesses
        currentIndex++
        questionCount++
        questionContainer.innerHTML = question[currentIndex]

        //This will end the game if the question is answered, wrong or correct
        if(questionCount === question.length){
            //This will hide the question container
            questionContainer.style.visibility = "hidden"
            showResults()
        }

        switch (currentIndex) {
            case 1:
                item1.style.backgroundColor = "#548B7E"
                break;
            case 2:
                item2.style.backgroundColor = "#548B7E"
                break;
            case 3:
                item3.style.backgroundColor = "#548B7E"
                break;
            case 4:
                item4.style.backgroundColor = "#548B7E"
                break;
            case 5:
                item5.style.backgroundColor = "#B97C7C"
                break;
            case 6:
                item6.style.backgroundColor = "#B97C7C"
                break;
            case 7:
                item7.style.backgroundColor = "#B97C7C"
                break;
            case 8:
                item8.style.backgroundColor = "#AD4848"
                break;
            case 9:
                item9.style.backgroundColor = "#AD4848"
                break;
            case 10:
                item10.style.backgroundColor = "#AD4848"
                break;
        
            default:
                break;
        }
        selectRandomWord();
        displayWord();
        displayAlphabetButtons();
        checkGameStatus()
    }
    
    function nextWord() {
        resetGame()
    }
    
    // Function to show the overall result
    function showResults() {
        document.getElementById('wrongAnswerCount').innerHTML = wrongAnswerCount
        document.getElementById('correctAnswerCount').innerHTML = correctAnswerCount

        if(correctAnswerCount === 0 || correctAnswerCount === 2 || correctAnswerCount === 3) {
            bronzeMedal.style.display = "block"
            silverMedal.style.display = "none"
            goldMedal.style.display = "none"
        }
        else if(correctAnswerCount === 4 || correctAnswerCount === 5 || correctAnswerCount === 6 || correctAnswerCount === 7) {
            bronzeMedal.style.display = "none"
            silverMedal.style.display = "block"
            goldMedal.style.display = "none"
        }
        else if(correctAnswerCount === 8|| correctAnswerCount === 9 || correctAnswerCount === 10) {
            bronzeMedal.style.display = "none"
            silverMedal.style.display = "none"
            goldMedal.style.display = "block"
        }

        resultContainer1.style.display = "none"
        resultContainer2.style.display = "flex"
        quizContainer.style.display = "none"

    }

    //Function to show the form
    function showForm() {
        formContainer.style.display = "block"
        resultContainer2.style.display = "none"

        document.getElementById('gameTitle').style.display = "none"
        document.getElementById('difficultyLevel').style.display = "none"
        document.getElementById('week').style.display = "none"
        document.getElementById('score').style.display = "none"
        document.getElementById('easyScore').style.display = "none"
        document.getElementById('normalScore').style.display = "none"
        document.getElementById('hardScore').style.display = "none"
        document.getElementById('scoreTotal').style.display = "none"
        document.getElementById('itemTotal').style.display = "none"

        document.getElementById('gameTitle').value = "hangman"
        document.getElementById('difficultyLevel').value = "easy"
        document.getElementById('week').value = "6"
        document.getElementById('score').value = correctAnswerCount
        document.getElementById('easyScore').value = easyScore
        document.getElementById('normalScore').value = normalScore
        document.getElementById('hardScore').value = hardScore
        document.getElementById('scoreTotal').value = hardScore + normalScore + easyScore
        document.getElementById('itemTotal').value = "10"
    }
</script>
</html>