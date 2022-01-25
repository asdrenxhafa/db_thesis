<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

for($i=0;$i<1000000;$i++){
    $sql = "INSERT INTO m (i)
    VALUES ('$i')";

if ($conn->query($sql) === TRUE) {
    echo $i . ' ';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>