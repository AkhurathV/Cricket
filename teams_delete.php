<html>
   
   <head>
      <title>Delete a Team from Cricket</title>
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
             $teamID = $_POST['teamID'];
             $sql = "DELETE FROM Teams WHERE team_id = $teamID";
             if ($conn->query($sql) === TRUE) {
                 echo "Team deleted successfully!";
             } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
             }
         }
         
         $conn->close();
    
            ?>
               <form action="teams_delete.php" method="post">
    <label for="teamID">Team ID:</label>
        <input type="number" id="teamID" name="teamID" required>
        <br>
        <input type="submit" value="Delete Team">
    </form>
   </body>
</html>