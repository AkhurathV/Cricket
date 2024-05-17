<html>
   
   <head>
      <title>Delete Batting Stat from Cricket</title>
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
             $sql = "DELETE FROM battingstats WHERE batting_id = $BID";
             if ($conn->query($sql) === TRUE) {
                 echo "Batting Stat deleted successfully!";
             } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
             }
         }
         
         $conn->close();
    
            ?>
               <form action="bs_delete.php" method="post">
    <label for="BID">Batting ID:</label>
        <input type="number" id="BID" name="BID" required>
        <br>
        <input type="submit" value="Delete Batsman">
    </form>
   </body>
</html>