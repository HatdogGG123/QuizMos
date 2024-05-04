<?php
    include('databaseConnection.php');
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
        .container .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .container .mainContent .moduleSection .moduleList .buttonContainer {
            width: 100%;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .container .mainContent .moduleSection .moduleList .buttonContainer button {
            padding: 20px;
            font-size: 30px;
            background-color: white;
            border-radius: 20px;
            height: fit-content;
            width: 100%;
            text-align: center;
            cursor: pointer;
            border: 3px solid black;
        }
        .container .mainContent .moduleSection .moduleList .buttonContainer button:active {
            transform: scale(0.95);
        }

        .container .mainContent .moduleSection .moduleList .moduleCard {
            width: 100%;
        }

        .container .mainContent .moduleSection .moduleList {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .container .mainContent .moduleSection .moduleList .moduleCard .imgBox {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .container .mainContent .moduleSection .moduleList .moduleCard .imgBox p {
            font-size: 50px;
        }
        .container .mainContent .moduleSection .moduleList .moduleCard .imgBox img {
            aspect-ratio: 1;
            width: 100px;
            height: 100px;
        }

        .container .tableOne, .container .tableTwo {
            width: 100%;
            height: 500px;
            padding: 30px;
            overflow-y: scroll;
        }
        ::-webkit-scrollbar {
            display: none;
        }

        .container .mainContent {
            overflow: hidden;
        }

        .container .tableContainer table {
            width: fit-content;
            text-align: left;
            border-spacing: 20px;
        }

        td:first-child {
            width: 100%;
            height: fit-content;
            border: 3px solid black;
            border-radius: 10px;
            padding: 20px;
            font-size: 25px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        td:nth-child(2), td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6), td:nth-child(7), td:nth-child(8), td:nth-child(9) {
            width: 100%;
            background-color: white;
            border: 3px solid black;
            padding: 20px;
            font-size: 25px;
            border-radius: 10px;
        }

        td:nth-child(3) {
            text-align: center;
        }

        th {
            font-size: 20px;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 1024px) {
            .container .mainContent .moduleSection .moduleList .moduleCard .imgBox {
                height: 120px;
            }
            .container .mainContent .moduleSection .moduleList .buttonContainer {
                height: 150px;
            }
            .container .mainContent .moduleSection .moduleList .moduleCard .imgBox p {
                font-size: 30px;
            }
            .container .mainContent .moduleSection .moduleList .moduleCard .infoBox .title {
                font-size: 20px;
            }
            .container .mainContent .moduleSection .moduleList .moduleCard .imgBox img {
                height: 80px;
                width: 80px;
            }

            .container .mainContent .moduleSection .moduleList .buttonContainer button {
                font-size: 20px;
                border-radius: 15px;
            }   
        }

        @media screen and (max-width: 768px) {
            .container .mainContent .moduleSection .moduleList .buttonContainer button {
                font-size: 18px;
                padding: 10px;
                border-radius: 15px;
            }   
        }

        @media screen and (max-width: 430px) {

            .container .sidebar {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .container .sidebar .logoutBox {
                width: fit-content;
            }

            .container .sidebar .logoutBox button {
                background-color: transparent;
                width: fit-content;
            }

            .container .tableContainer {
                padding: 0;
            }
            .container .tableOne, .container .tableTwo {
                height: 290px;
            }
            td:first-child {
                font-size: 16px;
            }
            td:nth-child(2), td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6), td:nth-child(7), td:nth-child(8), td:nth-child(9) {
                font-size: 16px;
            }
            th {
                font-size: 18px;
            }
            .container header .lbText {
                font-size: 30px;
            }

            .container .tableOne, .container .tableTwo {
                padding: 0;
            }

            .container .mainContent .moduleSection .moduleList .moduleCard .imgBox img {
                height: 50px;
                width: 50px;
            }
            .container .mainContent .moduleSection .moduleList .moduleCard .imgBox p {
                font-size: 20px;
            }

            .container .mainContent .moduleSection .moduleList .buttonContainer button {
                font-size: 15px;
                padding: 10px;
                border-radius: 10px;
                margin-bottom: 10px;
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
                height: 20px;
            }
            .container .sidebar .navigation .navItem a:nth-child(2) {
                display: none;
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

            <!-- Module Section -->
            <div class="moduleSection" id="module">
                <div class="moduleList">
                    <!-- Module card for week #1 -->
                    <div class="moduleCard">
                        <div class="imgBox">
                            <?php
                                // Query to retrieve data
                                $sql = "SELECT * FROM studenAccount";
                                $result = $conn->query($sql);

                                // Check if rows are found
                                if ($result->num_rows > 0) {
                                    $rowCount = mysqli_num_rows($result);
                                    echo "<p> $rowCount </p>";
                                } 

                                // Close connection
                                $conn->close();
                            ?>
                            <img src="user (1).png">
                        </div>
                        <div class="infoBox">
                            <p class="title">Users</p>
                        </div>
                    </div>
                    <div class="moduleCard">
                        <div class="imgBox">
                            <?php
                                include('databaseConnection.php');

                                // Query to retrieve data
                                $sql = "SELECT * FROM studentinfo";
                                $result = $conn->query($sql);

                                // Check if rows are found
                                if ($result->num_rows > 0) {
                                    $rowCount = mysqli_num_rows($result);
                                    echo "<p> $rowCount </p>";
                                } 

                                // Close connection
                                $conn->close();
                            ?>
                     <img src="games.png">
                        </div>
                        <div class="infoBox">
                            <p class="title">Game logs</p>
                        </div>
                    </div>
                    <div class="buttonContainer">
                            <button onclick="showTableOne()"> Show users table </button>
                            <button onclick="showTableTwo()"> Show game logs table </button>
                    </div>
                </div>

                <div class="tableOne" id="tableOne">
                    <?php
                        include('databaseConnection.php');

                        // Query to select rows with the same username and add their scores
                        $sql = "SELECT * FROM studenAccount";

                        // Execute the query
                        $result = mysqli_query($conn, $sql);

                        // Check if there are any rows returned
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table>";
                            $id = 1;
                            echo "<th> ID </th> <th> Username </th> <th> Password </th>";
                            // Fetch each row and display it
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $id++ . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['pwd'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results found.";
                        }

                        // Close the connection
                        mysqli_close($conn);
                    ?>
                </div>

                <div class="tableTwo" id="tableTwo" style="display: none;">
                    <?php
                        include('databaseConnection.php');

                        // Query to select rows with the same username and add their scores
                        $sql = "SELECT * FROM studentinfo";

                        // Execute the query
                        $result = mysqli_query($conn, $sql);

                        // Check if there are any rows returned
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table>";
                            $id = 1;
                            
                            echo "<th> ID </th> <th> Username </th> <th> Game Title </th> <th> Week </th> <th> Total # of Items </th> <th> Total score </th> <th> Easy score </th> <th> Normal score </th> <th> Hard score </th>";
                            // Fetch each row and display it
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $id++ . "</td>";
                                echo "<td>" . $row['user'] . "</td>";
                                echo "<td>" . $row['gameTitle'] . "</td>";
                                echo "<td>" . $row['week'] . "</td>";
                                echo "<td>" . $row['itemTotal'] . "</td>";
                                echo "<td>" . $row['scoreTotal'] . "</td>";
                                echo "<td>" . $row['easy'] . "</td>";
                                echo "<td>" . $row['normal'] . "</td>";
                                echo "<td>" . $row['hard'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results found.";
                        }

                        // Close the connection
                        mysqli_close($conn);
                    ?>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        function showTableOne() {
            document.getElementById('tableOne').style.display = "block"
            document.getElementById('tableTwo').style.display = "none"
        }
        function showTableTwo() {
            document.getElementById('tableOne').style.display = "none"
            document.getElementById('tableTwo').style.display = "block"
        }
        function goHome() {
            window.location.href = "index.html"
        }
    </script>
</body>
</html>