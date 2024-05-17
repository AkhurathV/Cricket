
<?php
$servername = 'localhost';
$username = 'root';  // Use your MySQL username
$password = '';      // Use your MySQL password
$dbname = 'cricket'; // Use the name of your cricket database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matchID = $_POST['matchID'];
    $da = $_POST['da'];
    $location = $_POST['location'];
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $winner = $_POST['winner'];
    $sql = "INSERT INTO Matches (match_id,date,location,team1_id,team2_id,winner_id) VALUES ('$matchID' ,'$da', '$location','$team1','$team2','$winner')";
    if ($conn->query($sql) === TRUE) {
        echo "Match added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cricket Database Management - Add Match</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Add a New Match</h1>
    <form action="matches_insert.php" method="post">
    <label for="matchID">Match ID:</label>
        <input type="number" id="matchID" name="matchID" required>
        <br>
        <label for="da">Match Date:</label>
        <input type="date" id="da" name="da" required>
        <br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <br>
        <label for="team1">Team1 Id:</label>
        <input type="number" id="team1" name="team1" required>
        <br>
        <label for="team2">Team2 ID::</label>
        <input type="number" id="team2" name="team2" required>
        <br>
        <label for="winner">Winner ID:</label>
        <input type="number" id="winner" name="winner" required>
        <br>
        <input type="submit" value="Add Match">
    </form>
</body>
</html>