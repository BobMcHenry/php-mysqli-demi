<?php
  require('credentials.php');
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  //Make a SELECT query
  $searchFor = "'McHenry'";
  $selectQuery = "SELECT * FROM actor
            WHERE last_name LIKE " . $searchFor;

  //INSERT INTO table_name (column1, column2, column3, ...)
  //VALUES (value1, value2, value3, ...);
  // $insertQuery = "INSERT INTO actor (first_name, last_name)
  //   VALUES ('Bob', 'McHenry')";
  //
  // if ($conn->query($insertQuery) === TRUE) {
  //   echo "New stuff created successfully";
  // } else {
  //   echo "Error: " . $insertQuery . "<br>" . $conn->error;
  // }
  $result = $conn->query($selectQuery);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo
            "actor_id: "
            . $row["actor_id"]
            . " - Name: "
            . $row["first_name"]
            . " "
            . $row["last_name"]
            . "<br>";
      }
  }
?>
