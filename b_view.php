<!DOCTYPE html>
<html>
<head>
    <title>Batsmen View</title>
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
    <h1>Batsmen View</h1>
    <table>
        <tr>
            <th>Batsman ID</th>
            <th>Batsman Name</th>
            <th>Team ID</th>
            <th>Age</th>
            <th>Country</th>
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

        $sql = "SELECT * FROM Batsmen";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["batsman_id"] . "</td>";
                echo "<td>" . $row["batsman_name"] . "</td>";
                echo "<td>" . $row["team_id"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["country"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
