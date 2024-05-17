
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
    $BID = $_POST['BID'];
    $boid = $_POST['boid'];
    $mid = $_POST['mid'];
    $ob = $_POST['ob'];
    $rc = $_POST['rc'];
    $wt = $_POST['wt'];
    $sql = "INSERT INTO bowlingstats (bowling_id,bowler_id,match_id,overs_bowled,runs_conceded,wickets_taken) VALUES ('$BID' ,'$boid', '$mid','$ob','$rc','$wt')";
    if ($conn->query($sql) === TRUE) {
        echo "Bowler added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cricket Database Management - Add bowling stats</title>
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
    </style>s
</head>
<body>
    <h1>Add New Bowling Stats</h1>
    <form action="bos_insert.php" method="post">
    <label for="BID">Bowling ID:</label>
        <input type="number" id="BID" name="BID" required>
        <br>
        <label for="boid">Bowler Name:</label>
        <input type="number" id="boid" name="boid" required>
        <br>
        <label for="mid">Match Id:</label>
        <input type="number" id="mid" name="mid" required>
        <br>
        <label for="ob">Overs Bowled:</label>
        <input type="number" id="ob" name="ob" required>
        <br>
        <label for="rc">Runs Conceded:</label>
        <input type="number" id="rc" name="rc" required>
        <br>
        <label for="wt">Wickets Taken:</label>
        <input type="number" id="wt" name="wt" required>
        <br>
        <input type="submit" value="Add Bowling Stats">
    </form>
</body>
</html>