<?php
session_start();
include '../functions.php';
//Database Connection
$conn = new conn;
$connect = $conn->connectDatabase();

if(isset($_POST["city"])){
  $city = $_POST["city"];
  $_SESSION["currentCity"] = $city;

  //Procedure call to fetch movies
  $query = "CALL moviesByCity(?)";
  $stmt = $connect->prepare($query);
  $stmt->bind_param('s', $city);
  $stmt->execute();
  $result = $stmt->get_result();
  echo "<h4>Select Movie</h4>";
  echo "<select id='movies' name='movies' onChange='movieChanged(this);'>";
  echo "<option value=''>--</option>";
  while ($row = $result->fetch_assoc()){
    echo "<option value=".$row['title'].">".$row['title']."</option>";
  }
  echo "</select>";
}
 ?>
