<?php
    include('databaseConnection.php');

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
    <link rel="stylesheet" href="loginAndSignup.css">
    <title>QuizMos Signup Page</title>

    <style>
        .container .fillUpFormContainer .form form .errorMsg {
            width: 50%;
            height: fit-content;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            color: #FF4545;
            background-color: #FFBCBC;
            border: 2px solid #FF8787;
            border-radius: 5px;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 768px) {
            .container .fillUpFormContainer .form {
                width: 70%;
            }
        }

        @media screen and (max-width: 430px) {
            .container .fillUpFormContainer .form form .errorMsg {
                font-size: 15px;
                width: 90%;
            }

            .container .fillUpFormContainer .form form .welcomeText {
                font-size: 25px;
            }
            .container .fillUpFormContainer .form form input {
                font-size: 20px;
            }
            .container .fillUpFormContainer .form form .submit {
                width: 90%;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="fillUpFormContainer">
            <div class="logo">
                <img src="Logo Pic.png" alt="">
            </div>
            <div class="form">
                <form action="login.php" method="post">
                    <p class="welcomeText">Welcome to QuizMos!</p>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST") {

                            $username = $_POST['username'];
                            $pass = $_POST['pwd'];
                            
                            $_SESSION["user"] = $username;

                            $sql = "SELECT * FROM studenAccount WHERE username = '$username' AND pwd = '$pass' ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                if($username === 'admin') {

                                    header("Location: adminPage.php");
                                }
                                else {
                                    header("Location: homepage.php");
                                
                                }
                            }
                            else {
                                $className = "errorMsg";
                                $id = "errorMsg";

                                echo "<div class='$className' id='$id'> The details you entered is invalid! <br> You may mispelled your inputs.</div>";
                            }
                        }

                        mysqli_close($conn);
                    ?>
                    <input type="text" class="username" name="username" placeholder="Username here... " required> <br>
                    <input type="password" class="pwd" name="pwd" placeholder="Password here..." required> <br>
                    <input type="submit" class="submit" name="submit" value="Login" style="color: black;">
                    <p style="font-size: 20px;">Don't have an account? <a href="signup.php">Sign up here!</a></p>
                </form>
            </div>
        </div>

        <div class="image">
            <img src="Group 220.png" alt="">
        </div>
    </div>

    <script>
        let seconds = 3;

        function updateTimer() {
            seconds--;
            
            if (seconds === 0) {
                clearInterval(timerInterval);
                document.getElementById('errorMsg').style.display = "none"
            }
        }

        let timerInterval = setInterval(updateTimer, 1000);
    </script>
</body>
</html>

