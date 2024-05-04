<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="leaderboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: black;
            font-family: 'Patrick Hand';
        }

        .container {
            background-color: #FFFAEC;
            padding: 20px;
            width: 100%;
            height: 100dvh;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .container header {
            width: 100%;
            height: fit-content;
            display: flex;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            align-items: center;
        }
        .container header button {
            padding: 10px;
            width: fit-content;
            height: fit-content;
            background-color: white;
            border: 3px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            gap: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .container header button img {
            height: 20px;
        }
        .container header button:active {
            transform: scale(0.95);
        }
        .container header .lbText {
            padding: 20px;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .container .tableContainer {
            width: 100%;
            padding: 30px;
        }

        .container .tableContainer table {
            width: fit-content;
            height: fit-content;
            text-align: left;
            border-spacing: 20px;
        }

        td:first-child {
            width: fit-content;
            height: fit-content;
            border: 3px solid black;
            border-radius: 10px;
            padding: 20px;
            font-size: 25px;
            background-color: white;
        }

        td:nth-child(2), td:nth-child(3) {
            width: 90%;
            background-color: white;
            border: 3px solid black;
            padding: 20px;
            font-size: 25px;
            border-radius: 10px;
        }

        td:nth-child(3) {
            text-align: center;
        }

        @media screen and (max-width: 430px) {
            .container .tableContainer {
                padding: 0;
            }
            td:first-child {
                font-size: 20px;
            }
            td:nth-child(2), td:nth-child(3) {
                font-size: 20px;
            }
            .container header .lbText {
                font-size: 30px;
            }
        }


    </style>
    <title>GameLeaderboards</title>
</head>
<body>
    <div class="container">
        <header>
            <button onclick="goHome()">
                <img src="back-arrow.png" >
            </button>
            <p class="lbText">Game Leaderboards</p>
        </header>
        <div class="tableContainer">
            <?php
                // Database connection parameters
                $host = "sql311.infinityfree.com";
                $username = "if0_35952509";
                $password = "h6fBnp52bcD";
                $database = "if0_35952509_studentDB";

                // Create connection
                $conn = new mysqli($host, $username, $password, $database);

                // Query to select rows with the same username and add their scores
                $sql = "SELECT user, SUM(scoreTotal) AS scoreTotal FROM studentinfo GROUP BY user ORDER BY scoreTotal DESC";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";

                    $id = 1;

                    // Fetch each row and display it
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $id++ . "</td>";
                        echo "<td>" . $row['user'] . "</td>";
                        echo "<td>" . $row['scoreTotal'] . " points" . "</td>";
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

     <script>
        function goHome() {
            window.location.href = "homepage.php"
        }
    </script>
</body>
</html> 