<!DOCTYPE html>
<html>
<head>
    <title>Batsmen Search</title>
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
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
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
    <h1>Batsmen Search</h1>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Search...">
        <input type="submit" value="Search">
    </form>
    
    <?php
    define("DB_HOST", "localhost");
    define("DB_NAME", "cricket");
    define("DB_CHARSET", "utf8mb4");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
     
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
        DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search = "%".$_POST["search"]."%";
        $stmt = $pdo->prepare("SELECT * FROM `Batsmen` WHERE `batsman_id` LIKE ? OR `batsman_name` LIKE ? OR `team_id` LIKE ? OR `age` LIKE ? OR `country` LIKE ?");
        $stmt->execute([$search, $search, $search, $search, $search]);
        $results = $stmt->fetchAll();
        
        if (count($results) > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table>";
            echo "<tr><th>Batsman ID</th><th>Batsman Name</th><th>Team ID</th><th>Age</th><th>Country</th></tr>";
            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . $row["batsman_id"] . "</td>";
                echo "<td>" . $row["batsman_name"] . "</td>";
                echo "<td>" . $row["team_id"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["country"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
    }
    ?>
</body>
</html>
