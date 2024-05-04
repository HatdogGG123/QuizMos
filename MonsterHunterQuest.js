//================================================
//FUNCTIONS FOR CHOOSING CHARACTER
//================================================
const questionLList = [
    {
        question: 'Inside which HTML element do we put the JavaScript?',
        a: '<scripting>',
        b: '<js>',
        c: '<javascript>',
        d: '<script>',
        answer: '<script>'
    },
    {
        question: 'What is the correct JavaScript syntax to change the content of the HTML element in the example? <p id="demo">This is a demonstration.</p>',
        a: 'document.getElementById("demo").innerHTML = "Hello World!";',
        b: '#demo.innerHTML = "Hello World!";',
        c: 'document.getElement("p").innerHTML = "Hello World!";',
        d: 'document.getElementByName("p").innerHTML = "Hello World!";',
        answer: 'document.getElementById("demo").innerHTML = "Hello World!";'
    },
    {
        question: 'Where is the correct place to insert a JavaScript?',
        a: 'Both the <head> section and the <body> section are correct',
        b: 'The <body> section',
        c: 'The <head> section',
        d: ' ',
        answer: 'Both the <head> section and the <body> section are correct'
    },
    {
        question: 'What is the correct syntax for referring to an external script called "xxx.js"?',
        a: '<script href="xxx.js">',
        b: '<script src="xxx.js">',
        c: 'function myFunction()',
        d: ' ',
        answer: '<script src="xxx.js">'
    },
    {
        question: 'The external JavaScript file must contain the <script> tag.',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'False'
    },
    {
        question: 'How do you write "Hello World" in an alert box?',
        a: 'msgBox("Hello World");',
        b: 'msg("Hello World");',
        c: 'alert("Hello World");',
        d: 'alertBox("Hello World");',
        answer: 'alert("Hello World");'
    },
    {
        question: 'How do you create a function in JavaScript?',
        a: 'function = myFunction()',
        b: 'function myFunction()',
        c: 'function:myFunction()',
        d: ' ',
        answer: 'function myFunction()'
    },
    {
        question: 'How do you call a function named "myFunction"?',
        a: 'call function myFunction()',
        b: 'myFunction()',
        c: 'while 1 = 1 to 10',
        d: ' ',
        answer: 'myFunction()'
    },
    {
        question: 'How to write an IF statement in JavaScript?',
        a: 'if i = 5',
        b: 'if (i == 5)',
        c: 'if i == 5 then',
        d: 'if i = 5 then',
        answer: 'if (i == 5)'
    },
    {
        question: 'How to write an IF statement for executing some code if "i" is NOT equal to 5?',
        a: 'if (i != 5)',
        b: 'if i <> 5',
        c: 'if (i <> 5)',
        d: 'if i =! 5 then',
        answer: 'if (i != 5)'
    },
    {
        question: 'How does a WHILE loop start?',
        a: 'while i = 1 to 10',
        b: 'while (i <= 10; i++)',
        c: 'while (i <= 10)',
        d: ' ',
        answer: 'while (i <= 10)'
    },
    {
        question: 'How does a FOR loop start?',
        a: 'for (i = 0; i <= 5)',
        b: 'for (i <= 5; i++)',
        c: 'for (i = 0; i <= 5; i++)',
        d: 'for i = 1 to 5',
        answer: 'for (i = 0; i <= 5; i++)'
    },
    {
        question: 'How can you add a comment in a JavaScript?',
        a: '//This is a comment',
        b: '<!--This is a comment-->',
        c: "'This is a comment",
        d: ' ',
        answer: '//This is a comment'
    },
    {
        question: 'How to insert a comment that has more than one line?',
        a: '//This comment has more than one line//',
        b: '/*This comment has more than one line*/',
        c: '<!--This comment has more than one line-->',
        d: ' ',
        answer: '/*This comment has more than one line*/'
    },
    {
        question: 'What is the correct way to write a JavaScript array?',
        a: 'var colors = ["red", "green", "blue"]',
        b: 'var colors = 1 = ("red"), 2 = ("green"), 3 = ("blue")',
        c: 'var colors = "red", "green", "blue"',
        d: 'var colors = (1:"red", 2:"green", 3:"blue")',
        answer: 'var colors = ["red", "green", "blue"]'
    },
    {
        question: 'How do you round the number 7.25, to the nearest integer?',
        a: 'Math.round(7.25)',
        b: 'round(7.25)',
        c: 'Math.rnd(7.25)',
        d: 'rnd(7.25)',
        answer: 'Math.round(7.25)'
    },
    {
        question: 'How do you find the number with the highest value of x and y?',
        a: 'ceil(x, y)',
        b: 'Math.ceil(x, y)',
        c: 'Math.max(x, y)',
        d: 'top(x, y)',
        answer: 'Math.max(x, y)'
    },
    {
        question: 'What is the correct JavaScript syntax for opening a new window called "w2" ?',
        a: 'w2 = window.open("http://www.w3schools.com");',
        b: 'w2 = window.new("http://www.w3schools.com");',
        c: ' ',
        d: ' ',
        answer: 'w2 = window.open("http://www.w3schools.com");'
    },
    {
        question: 'JavaScript is the same as Java.',
        a: 'False',
        b: 'True',
        c: ' ',
        d: ' ',
        answer: 'False'
    },
    {
        question: 'How can you detect the client browser name?',
        a: 'client.navName',
        b: 'navigator.appName',
        c: 'browser.name',
        d: ' ',
        answer: 'navigator.appName'
    },
    {
        question: 'Which event occurs when the user clicks on an HTML element?',
        a: 'onchange',
        b: 'onclick',
        c: 'onmouseclick',
        d: 'onmouseover',
        answer: 'onclick'
    },
    {
        question: 'How do you declare a JavaScript variable?',
        a: 'variable carName;',
        b: 'var carName;',
        c: 'v carName;',
        d: ' ',
        answer: 'var carName;'
    },
    {
        question: 'Which operator is used to assign a value to a variable?',
        a: '-',
        b: '=',
        c: 'x',
        d: '*',
        answer: '='
    },
    {
        question: 'What will the following code return: Boolean(10 > 9)',
        a: 'false',
        b: 'true',
        c: 'NaN',
        d: ' ',
        answer: 'true'
    },
    {
        question: 'Is JavaScript case-sensitive?',
        a: 'Yes',
        b: 'No',
        c: ' ',
        d: ' ',
        answer: 'Yes'
    },
    {
        question: 'What does PHP stand for?',
        a: 'Personal Hypertext Processor',
        b: 'PHP: Hypertext Preprocessor',
        c: 'Private Home Page',
        d: ' ',
        answer: 'PHP: Hypertext Preprocessor'
    },
    {
        question: 'PHP server scripts are surrounded by delimiters, which?',
        a: '<?php...?>',
        b: '<&>...</&>',
        c: '<?php>...</?>',
        d: '<script>...</script>',
        answer: '<?php...?>'
    },
    {
        question: 'How do you write "Hello World" in PHP',
        a: 'Document.Write("Hello World");',
        b: 'echo "Hello World";',
        c: '"Hello World";',
        d: ' ',
        answer: 'echo "Hello World";'
    },
    {
        question: 'All variables in PHP start with which symbol?',
        a: '&',
        b: '!',
        c: '$',
        d: ' ',
        answer: '$'
    },
    {
        question: 'What is the correct way to end a PHP statement?',
        a: '</php> ',
        b: '.',
        c: 'New line',
        d: ';',
        answer: ';'
    },
    {
        question: 'The PHP syntax is most similar to:',
        a: 'JavaScript',
        b: 'Perl and C',
        c: 'VBScript',
        d: ' ',
        answer: 'Perl and C'
    },
    {
        question: 'How do you get information from a form that is submitted using the "get" method?',
        a: 'Request.QueryString;',
        b: 'Request.Form;',
        c: '$_GET[];',
        d: ' ',
        answer: '$_GET[];'
    },
    {
        question: 'When using the POST method, variables are displayed in the URL:',
        a: 'False',
        b: 'True',
        c: ' ',
        d: ' ',
        answer: 'False'
    },
    {
        question: 'In PHP you can use both single quotes and double quotes for strings:',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'True'
    },
    {
        question: 'Include files must have the file extension ".inc"',
        a: 'False',
        b: 'True',
        c: ' ',
        d: ' ',
        answer: 'False'
    },
    {
        question: 'What is the correct way to include the file "time.inc" ?',
        a: '<!-- include file="time.inc" -->',
        b: '<?php include "time.inc"; ?>',
        c: '<?php include file="time.inc"; ?>',
        d: '<?php include:"time.inc"; ?>',
        answer: '<?php include "time.inc"; ?>'
    },
    {
        question: 'What is the correct way to create a function in PHP?',
        a: 'function myFunction()',
        b: 'create myFunction()',
        c: 'new_function myFunction()',
        d: ' ',
        answer: 'function myFunction()'
    },
    {
        question: 'What is the correct way to open the file "time.txt" as readable?',
        a: 'fopen("time.txt","r");',
        b: 'fopen("time.txt","r+");',
        c: 'open("time.txt","read");',
        d: 'open("time.txt");',
        answer: 'fopen("time.txt","r");'
    },
    {
        question: 'PHP allows you to send emails directly from a script',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'True'
    },
    {
        question: 'Which superglobal variable holds information about headers, paths, and script locations?',
        a: '$_SERVER',
        b: '$_SESSION',
        c: '$_GET',
        d: '$GLOBALS',
        answer: '$_SERVER'
    },
    {
        question: 'What is the correct way to add 1 to the $count variable?',
        a: '$count++;',
        b: '$count =+1',
        c: '++count',
        d: 'count++;',
        answer: '$count++;'
    },
    {
        question: 'What is a correct way to add a comment in PHP?',
        a: '/*...*/',
        b: '<!--...-->',
        c: '<comment>...</comment>',
        d: '*\...\*',
        answer: '/*...*/'
    },
    {
        question: 'PHP can be run on Microsoft Windows IIS(Internet Information Server):',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'True'
    },
    {
        question: 'The die() and exit() functions do the exact same thing.',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'True'
    },
    {
        question: 'Which one of these variables has an illegal name?',
        a: '$myVar',
        b: '$my-Var',
        c: '$my_Var',
        d: ' ',
        answer: '$my-Var'
    },
    {
        question: 'How do you create a cookie in PHP?',
        a: 'setcookie()',
        b: 'createcookie',
        c: 'makecookie()',
        d: ' ',
        answer: 'setcookie()'
    },
    {
        question: 'In PHP, the only way to output text is with echo.',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'False'
    },
    {
        question: 'How do you create an array in PHP?',
        a: '$cars = array("Volvo", "BMW", "Toyota");',
        b: '$cars = "Volvo", "BMW", "Toyota";',
        c: '$cars = array["Volvo", "BMW", "Toyota"];',
        d: ' ',
        answer: '$cars = array("Volvo", "BMW", "Toyota");'
    },
    {
        question: 'The if statement is used to execute some code only if a specified condition is trues',
        a: 'True',
        b: 'False',
        c: ' ',
        d: ' ',
        answer: 'True'
    },
    {
        question: 'Which operator is used to check if two values are equal and of same data type?',
        a: '===',
        b: '=',
        c: '==',
        d: '!=',
        answer: '==='
    }
]

//================================================
//FUNCTIONS FOR CHOOSING CHARACTER
//================================================
let spriteImg = document.getElementById('sprite-img')
const charName = document.getElementById('char-name')
const startBtnCon = document.getElementById('start-btn-con')
const gameMechCon = document.getElementById('gameMechCon')

let spriteCount
function showChar() {
    spriteImg.style.display = "block"
    startBtnCon.style.visibility = "visible"
}

function char1() {
    showChar()
    spriteImg.src = "sprite_char - idle.png" 
    spriteImg.classList.add('char1-idle')  

    spriteImg.classList.remove('char2-idle')  
    spriteImg.classList.remove('char3-idle')  
    spriteImg.classList.remove('char4-idle')  
    spriteImg.classList.remove('char5-idle')  

    spriteCount = 1

    charName.innerHTML = "Oringaru"
}

function char2() {
    showChar()
    spriteImg.src = "sprite_char2 - idle.png" 
    spriteImg.classList.add('char2-idle')   

    spriteImg.classList.remove('char1-idle')  
    spriteImg.classList.remove('char3-idle')  
    spriteImg.classList.remove('char4-idle')  
    spriteImg.classList.remove('char5-idle') 
    
    spriteCount = 2

    charName.innerHTML = "Sentinel"
}

function char3() {
    showChar()
    spriteImg.src = "sprite_char3 - idle.png" 
    spriteImg.classList.add('char3-idle')   
    
    spriteImg.classList.remove('char1-idle')  
    spriteImg.classList.remove('char2-idle')  
    spriteImg.classList.remove('char4-idle')  
    spriteImg.classList.remove('char5-idle') 

    spriteCount = 3

    charName.innerHTML = "Vesper"
}

function char4() {
    showChar()
    spriteImg.src = "sprite_char4 - idle.png" 
    spriteImg.classList.add('char4-idle')  
    
    spriteImg.classList.remove('char1-idle')  
    spriteImg.classList.remove('char2-idle')  
    spriteImg.classList.remove('char3-idle')  
    spriteImg.classList.remove('char5-idle') 

    spriteCount = 4

    charName.innerHTML = "Donovan"
}

function char5() {
    showChar()
    spriteImg.src = "sprite_char5 - idle.png" 
    spriteImg.classList.add('char5-idle')  
    
    spriteImg.classList.remove('char1-idle')  
    spriteImg.classList.remove('char2-idle')  
    spriteImg.classList.remove('char3-idle')  
    spriteImg.classList.remove('char4-idle') 

    spriteCount = 5

    charName.innerHTML = "Ryu"
}

//================================================
//FUNCTION FOR SHOWING THE SELECTED CHARACTER
//================================================
const selectedCharCon = document.getElementById('character-sprite-image-con')
const selectedChar = document.getElementById('selected-char-sprite')
const selectedCharAvatar = document.getElementById('selected-char-avatar')

function showSelectedChar() {
    switch (spriteCount) {
        case 1: 
            selectedCharAvatar.src = "sprite_char - idle 2.png"
            selectedChar.src = "sprite_char - idle.png"
            selectedChar.classList.add('char1-idle')
            break;
        case 2: 
            selectedCharAvatar.src = "sprite_char - idle 3.png"
            selectedChar.src = "sprite_char2 - idle.png"
            selectedChar.classList.add('char2-idle')
            break;
        case 3: 
            selectedCharAvatar.src = "sprite_char - idle 4.png"
            selectedChar.src = "sprite_char3 - idle.png"
            selectedChar.classList.add('char3-idle')
            break;
        case 4: 
            selectedCharAvatar.src = "sprite_char - idle 5.png"
            selectedChar.src = "sprite_char4 - idle.png"
            selectedChar.classList.add('char4-idle')
            break;
        case 5: 
            selectedCharAvatar.src = "sprite_char - idle 1.png"
            selectedChar.src = "sprite_char5 - idle.png"
            selectedChar.classList.add('char5-idle')
            break;
    }
}

//================================================
//FUNCTION FOR SELECTING RANDOM ENEMY
//================================================
const enemySpriteImg = document.getElementById('enemy-sprite-img')
const enemyAvatar = document.getElementById('enemy-avatar')
let rndmEnemyPicker = Math.floor(Math.random() * 4) + 1

function randomEnemy(){
    if(rndmEnemyPicker === 1) {
        enemyAvatar.src = "sprite_enemy1 - idle .png"
        enemySpriteImg.src = "sprite_enemy1 - idle.png"
        enemySpriteImg.classList.add('enemy1-idle')
    }
    else if(rndmEnemyPicker === 2) {
        enemyAvatar.src = "sprite_enemy2 - idle .png"
        enemySpriteImg.src = "sprite_enemy2 - idle.png"
        enemySpriteImg.classList.add('enemy2-idle')
    }
    else if(rndmEnemyPicker === 3) {
        enemyAvatar.src = "sprite_enemy3 - idle .png"
        enemySpriteImg.src = "sprite_enemy3 - idle.png"
        enemySpriteImg.classList.add('enemy3-idle')
    }
    else if(rndmEnemyPicker === 4) {
        enemyAvatar.src = "sprite_enemy4 - idle .png"
        enemySpriteImg.src = "sprite_enemy4 - idle.png"
        enemySpriteImg.classList.add('enemy4-idle')
    }
}




function goBack() {
    window.location.href = "homepage.php"
}
function goToLB() {
    window.location.href = "leaderboard.php"
}
function showMech() {
    gameMechCon.style.display = "block"
}
function hideMech() {
    gameMechCon.style.display = "none"
}

//================================================
//FUNCTIONALITIES FOR STARTING THE GAME
//================================================
const mainGameCon = document.getElementById('main-game-con')
const characterCon = document.getElementById('character-con')
const charChoiceCon = document.getElementById('character-choice-con')
const headerCon = document.getElementById('header-con')

const displayQue = document.getElementById('question-con')
const displayChoiceA = document.getElementById('a')
const displayChoiceB = document.getElementById('b')
const displayChoiceC = document.getElementById('c')
const displayChoiceD = document.getElementById('d')

function gameStart() {
    mainGameCon.style.display = "block"

    characterCon.style.display = "none"
    charChoiceCon.style.display = "none"
    headerCon.style.display = "none"

    changeQuestion()
    showSelectedChar()
    randomEnemy()
}

//===================================================================
//FUNCTIONALITIES FOR CLICKING AND CHECKING THE ANSWER
//===================================================================
const userChoiceBtn = document.querySelectorAll('.letterChoice')

const enemyHP_bar = document.getElementById('enemy-hp-bar')
const charHP_bar = document.getElementById('char-hp-bar')

let charHP = 100
let enemyHP = 100

let correctAns = 0
let wrongAns = 0

export {correctAns, wrongAns}

userChoiceBtn.forEach(bt => {
    bt.addEventListener('click', (e)=>{
        let userAnswer = e.target.innerHTML

        if(userAnswer === questionLList[rndmIndx].answer) {
            disableChoices()
            correctAns += 1
            console.log("Correct: " + correctAns)

            e.target.style.border = "3px solid green"
            e.target.style.backgroundColor = "lightgreen"
            e.target.style.color = "green"
            
            let timer = setInterval(counter, 1000)
            let second = 0

            function counter() {
                second++
                if(second === 1) {
                    clearInterval(timer)

                    e.target.style.border = "3px solid black"
                    e.target.style.backgroundColor = "white"
                    e.target.style.color = "black"

                    changeQuestion()
                    enableChoices()
                    
                }
            }

            enemyHP-=10
            //IF YOUR CHARACTER CLEARS HIS LIFE, THIS CODE WILL RUN (DEAD)
            if(enemyHP === 10 && rndmEnemyPicker === 1) {
                enemySpriteImg.src = "sprite_enemy1 - dead.png"
                enemySpriteImg.classList.add('enemy1-dead')
                enemySpriteImg.classList.remove('enemy1-attack1')
                enemySpriteImg.classList.remove('enemy1-idle')

                endGame()
            }
            if(enemyHP === 10 && rndmEnemyPicker === 2) {
                enemySpriteImg.src = "sprite_enemy2 - dead.png"
                enemySpriteImg.classList.add('enemy2-dead')
                enemySpriteImg.classList.remove('enemy2-attack1')
                enemySpriteImg.classList.remove('enemy2-idle')

                endGame()
            }
            if(enemyHP === 10 && rndmEnemyPicker === 3) {
                enemySpriteImg.src = "sprite_enemy3 - dead.png"
                enemySpriteImg.classList.add('enemy3-dead')
                enemySpriteImg.classList.remove('enemy3-attack1')
                enemySpriteImg.classList.remove('enemy3-idle')

                endGame()
            }
            if(enemyHP === 10 && rndmEnemyPicker === 4) {
                enemySpriteImg.src = "sprite_enemy4 - dead.png"
                enemySpriteImg.classList.add('enemy4-dead')
                enemySpriteImg.classList.remove('enemy4-attack1')
                enemySpriteImg.classList.remove('enemy4-idle')

                endGame()
            }

            enemyHP_bar.style.width = enemyHP + "%"

            addCharAnimation()
            
        }
        else {
            disableChoices()
            wrongAns += 1
            console.log("Wrong: " + wrongAns)
            let timer = setInterval(counter, 1000)
            let second = 0

            e.target.style.border = "3px solid red"
            e.target.style.backgroundColor = "lightcoral"
            e.target.style.color = "red"

            function counter() {
                second++
                if(second === 1) {
                    clearInterval(timer)
                    e.target.style.border = "3px solid black"
                    e.target.style.backgroundColor = "white"
                    e.target.style.color = "black"

                    changeQuestion()
                    enableChoices()
                    
                }
            }

            addEnemyAnimation()

            charHP-=10

            //IF YOUR CHARACTER CLEARS HIS LIFE, THIS CODE WILL RUN (DEAD)
            if(charHP === 10 && spriteCount === 1) {
                selectedChar.src = "sprite_char - dead.png"
                selectedChar.classList.add('char1-dead')
                selectedChar.classList.remove('char1-attack1')
                selectedChar.classList.remove('char1-idle')

                endGame()
            }
            if(charHP === 10 && spriteCount === 2) {
                selectedChar.src = "sprite_char2 - dead.png"
                selectedChar.classList.add('char2-dead')
                selectedChar.classList.remove('char2-attack1')
                selectedChar.classList.remove('char2-idle')

                endGame()
            }
            if(charHP === 10 && spriteCount === 3) {
                selectedChar.src = "sprite_char3 - dead.png"
                selectedChar.classList.add('char3-dead')
                selectedChar.classList.remove('char3-attack1')
                selectedChar.classList.remove('char3-idle')

                endGame()
            }
            if(charHP === 10 && spriteCount === 4) {
                selectedChar.src = "sprite_char4 - dead.png"
                selectedChar.classList.add('char4-dead')
                selectedChar.classList.remove('char4-attack1')
                selectedChar.classList.remove('char4-idle')

                endGame()
            }
            if(charHP === 10 && spriteCount === 5) {
                selectedChar.src = "sprite_char5 - dead.png"
                selectedChar.classList.add('char5-dead')
                selectedChar.classList.remove('char5-attack1')
                selectedChar.classList.remove('char5-idle')

                endGame()
            }
            

            charHP_bar.style.width = charHP + "%"
        }

        
    })
})

//================================================
//FUNCTION FOR DISABLING CHOICES BUTTON
//================================================
function disableChoices() {
    displayChoiceA.disabled = true
    displayChoiceB.disabled = true
    displayChoiceC.disabled = true
    displayChoiceD.disabled = true
}

//================================================
//FUNCTION FOR ENABLING CHOICES BUTTON
//================================================
function enableChoices() {
    displayChoiceA.disabled = false
    displayChoiceB.disabled = false
    displayChoiceC.disabled = false
    displayChoiceD.disabled = false
}

//================================================
//ANIMATIONS FOR CHARACTERS
//================================================
function addCharAnimation() {
    if(spriteCount === 1) {
        selectedChar.src = "sprite_char - attack1.png"
        selectedChar.classList.add('char1-attack1')
        selectedChar.classList.remove('char1-idle')
        selectedChar.classList.remove('char1-dead')

        selectedCharCon.classList.add('moveCloserToEnemy')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                selectedChar.src = "sprite_char - idle.png"
                selectedChar.classList.add('char1-idle')
                selectedChar.classList.remove('char1-dead')
                selectedChar.classList.remove('char1-attack1')

                selectedCharCon.classList.remove('moveCloserToEnemy')
            }
        }
    }
    else if(spriteCount === 2) {
        selectedChar.src = "sprite_char2 - attack1.png"
        selectedChar.classList.add('char2-attack1')
        selectedChar.classList.remove('char2-idle')
        selectedChar.classList.remove('char2-dead')

        selectedCharCon.classList.add('moveCloserToEnemy')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                selectedChar.src = "sprite_char2 - idle.png"
                selectedChar.classList.add('char2-idle')
                selectedChar.classList.remove('char2-dead')
                selectedChar.classList.remove('char2-attack1')

                selectedCharCon.classList.remove('moveCloserToEnemy')
            }
        }
    }
    else if(spriteCount === 3) {
        selectedChar.src = "sprite_char3 - attack1.png"
        selectedChar.classList.add('char3-attack1')
        selectedChar.classList.remove('char3-idle')
        selectedChar.classList.remove('char3-dead')

        selectedCharCon.classList.add('moveCloserToEnemy')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                selectedChar.src = "sprite_char3 - idle.png"
                selectedChar.classList.add('char3-idle')
                selectedChar.classList.remove('char3-dead')
                selectedChar.classList.remove('char3-attack1')
                
                selectedCharCon.classList.remove('moveCloserToEnemy')
            }
        }
    }
    else if(spriteCount === 4) {
        selectedChar.src = "sprite_char4 - attack1.png"
        selectedChar.classList.add('char4-attack1')
        selectedChar.classList.remove('char4-idle')
        selectedChar.classList.remove('char4-dead')

        selectedCharCon.classList.add('moveCloserToEnemy')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                selectedChar.src = "sprite_char4 - idle.png"
                selectedChar.classList.add('char4-idle')
                selectedChar.classList.remove('char4-dead')
                selectedChar.classList.remove('char4-attack1')

                selectedCharCon.classList.remove('moveCloserToEnemy')
            }
        }
    }
    else if(spriteCount === 5) {
        selectedChar.src = "sprite_char5 - attack1.png"
        selectedChar.classList.add('char5-attack1')
        selectedChar.classList.remove('char5-idle')
        selectedChar.classList.remove('char5-dead')

        selectedCharCon.classList.add('moveCloserToEnemy')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                selectedChar.src = "sprite_char5 - idle.png"
                selectedChar.classList.add('char5-idle')
                selectedChar.classList.remove('char5-dead')
                selectedChar.classList.remove('char5-attack1')

                selectedCharCon.classList.remove('moveCloserToEnemy')
            }
        }
    }
}

//================================================
//ANIMATIONS FOR ENEMY
//================================================
const enemySpriteImgCon = document.getElementById('enemy-sprite-image')

function addEnemyAnimation() {
    if(rndmEnemyPicker === 1) {
        enemySpriteImg.src = "sprite_enemy1 - attack2.png"
        enemySpriteImg.classList.add('enemy1-attack1')
        enemySpriteImg.classList.remove('char5-dead')
        enemySpriteImg.classList.remove('enemy1-idle')

        enemySpriteImgCon.classList.add('moveCloserToChar')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                enemySpriteImg.src = "sprite_enemy1 - idle.png"
                enemySpriteImg.classList.add('enemy1-idle')
                enemySpriteImg.classList.remove('enemy1-dead')
                enemySpriteImg.classList.remove('enemy1-attack1')

                enemySpriteImgCon.classList.remove('moveCloserToChar')
                
            }
        }
    }
    else if(rndmEnemyPicker === 2) {
        enemySpriteImg.src = "sprite_enemy2 - attack2.png"
        enemySpriteImg.classList.add('enemy2-attack1')
        enemySpriteImg.classList.remove('char5-dead')
        enemySpriteImg.classList.remove('enemy2-idle')

        enemySpriteImgCon.classList.add('moveCloserToChar')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                enemySpriteImg.src = "sprite_enemy2 - idle.png"
                enemySpriteImg.classList.add('enemy2-idle')
                enemySpriteImg.classList.remove('enemy2-dead')
                enemySpriteImg.classList.remove('enemy2-attack1')

                enemySpriteImgCon.classList.remove('moveCloserToChar')
                
            }
        }
    }
    else if(rndmEnemyPicker === 3) {
        enemySpriteImg.src = "sprite_enemy3 - attack 1.png"
        enemySpriteImg.classList.add('enemy3-attack1')
        enemySpriteImg.classList.remove('char5-dead')
        enemySpriteImg.classList.remove('enemy3-idle')

        enemySpriteImgCon.classList.add('moveCloserToChar')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                enemySpriteImg.src = "sprite_enemy3 - idle.png"
                enemySpriteImg.classList.add('enemy3-idle')
                enemySpriteImg.classList.remove('enemy3-dead')
                enemySpriteImg.classList.remove('enemy3-attack1')

                enemySpriteImgCon.classList.remove('moveCloserToChar')
                
            }
        }
    }
    else if(rndmEnemyPicker === 4) {
        enemySpriteImg.src = "sprite_enemy4 - attack1.png"
        enemySpriteImg.classList.add('enemy4-attack1')
        enemySpriteImg.classList.remove('enemy4-dead')
        enemySpriteImg.classList.remove('enemy4-idle')

        enemySpriteImgCon.classList.add('moveCloserToChar')

        let timer = setInterval(counter, 1000)
        let second = 0

        function counter() {
            second++
            if(second === 1){
                clearInterval(timer)
                enemySpriteImg.src = "sprite_enemy4 - idle.png"
                enemySpriteImg.classList.add('enemy4-idle')
                enemySpriteImg.classList.remove('enemy4-dead')
                enemySpriteImg.classList.remove('enemy4-attack1')

                enemySpriteImgCon.classList.remove('moveCloserToChar')
                
            }
        }
    }
}

//================================================
//FUNCTIONALITIES FOR CLICKING THE NEXT QUESTION
//================================================
let rndmIndx

function changeQuestion() {
    rndmIndx = Math.floor(Math.random() * questionLList.length) 

    displayQue.innerText = questionLList[rndmIndx].question
    displayChoiceA.innerText = questionLList[rndmIndx].a
    displayChoiceB.innerText = questionLList[rndmIndx].b
    displayChoiceC.innerText = questionLList[rndmIndx].c
    displayChoiceD.innerText = questionLList[rndmIndx].d

    if(questionLList[rndmIndx].c === " ") {
        displayChoiceC.style.display = "none"
    }
    else{
        displayChoiceC.style.display = "block"
        displayChoiceC.innerText = questionLList[rndmIndx].c
    }

    if(questionLList[rndmIndx].d === " ") {
        displayChoiceD.style.display = "none"
    }
    else{
        displayChoiceD.style.display = "block"
        displayChoiceD.innerText = questionLList[rndmIndx].d
    }
}

//================================================
//FUNCTION FOR SHOWING THE GAME RESULT
//================================================
function endGame() {
    if(charHP === 10) {
        document.getElementById('result-con').style.display = "block"
        document.getElementById('gameResult').innerText = "DEFEAT"

        document.getElementById('correct-answer').innerText = correctAns
        document.getElementById('wrong-answer').innerText = wrongAns

        mainGameCon.style.filter = "blur(10px)"

    }
    else if(enemyHP === 10) {
        document.getElementById('result-con').style.display = "block"
        document.getElementById('gameResult').innerText = "VICTORY"

        document.getElementById('correct-answer').innerText = correctAns
        document.getElementById('wrong-answer').innerText = wrongAns
        
        mainGameCon.style.filter = "blur(10px)"
    }
}

//================================================
//FUNCTION FOR EXITING THE GAME
//================================================
function exitGame() {
    window.location.href = "homepage.php"
}