
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
    $BatID = $_POST['BatID'];
    $name = $_POST['name'];
    $team = $_POST['team'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $sql = "INSERT INTO Batsmen (batsman_id,batsman_name,team_id,age,country) VALUES ('$BatID' ,'$name', '$team','$age','$country')";
    if ($conn->query($sql) === TRUE) {
        echo "Batsman added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cricket Database Management - Add Batsman</title>
</head>
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
<body>
    <h1>Add a New Batsman</h1>
    <form action="b_insert.php" method="post">
    <label for="BatID">Bat ID:</label>
        <input type="number" id="BatID" name="BatID" required>
        <br>
        <label for="name">Batsman Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="team">Team Id:</label>
        <input type="number" id="team" name="team" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>
        <br>
        <input type="submit" value="Add Batsman">
    </form>
</body>
</html>