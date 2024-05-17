
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
    $baID = $_POST['baID'];
    $batID = $_POST['batID'];
    $mID = $_POST['mID'];
    $run = $_POST['run'];
    $ball = $_POST['ball'];
    $fours = $_POST['fours'];
    $six = $_POST['six'];
    $sql = "INSERT INTO battingstats (batting_id,batsman_id,match_id,runs_scored,balls_faced,fours,sixes) VALUES ('$baID' ,'$batID', '$mID','$run','$ball','$fours','$six')";
    if ($conn->query($sql) === TRUE) {
        echo "Batting Stats added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cricket Database Management - Add Batting Stats</title>
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
    <form action="bs_insert.php" method="post">
    <label for="baID">Batting ID:</label>
        <input type="number" id="baID" name="baID" required>
        <br>
        <label for="batID">Batsman ID:</label>
        <input type="number" id="batID" name="batID" required>
        <br>
        <label for="mID">Match ID:</label>
        <input type="number" id="mID" name="mID" required>
        <br>
        <label for="run">Runs Scored:</label>
        <input type="number" id="run" name="run" required>
        <br>
        <label for="ball">Balls Faced:</label>
        <input type="number" id="ball" name="ball" required>
        <br>
        <label for="fours">Fours:</label>
        <input type="number" id="fours" name="fours" required>
        <br>
        <label for="six">Sixes:</label>
        <input type="number" id="six" name="six" required>
        <br>
        <input type="submit" value="Add Batting Stats">
    </form>
</body>
</html>