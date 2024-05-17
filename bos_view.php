<!DOCTYPE html>
<html>
<head>
    <title>Bowling Stats View</title>
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

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h1>Bowling Stats View</h1>
    <table>
        <tr>
            <th>Bowling ID</th>
            <th>Bowler ID</th>
            <th>Match ID</th>
            <th>Overs Bowled</th>
            <th>Runs Conceded</th>
            <th>Wickets Taken</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cricket";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM bowlingstats";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["bowling_id"] . "</td>";
                echo "<td>" . $row["bowler_id"] . "</td>";
                echo "<td>" . $row["match_id"] . "</td>";
                echo "<td>" . $row["overs_bowled"] . "</td>";
                echo "<td>" . $row["runs_conceded"] . "</td>";
                echo "<td>" . $row["wickets_taken"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
