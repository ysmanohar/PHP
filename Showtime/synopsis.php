<?php
include '../functions.php';
$connect = connectDatabase();
$getQuery = "SELECT * FROM `movie` WHERE title='Spectre'";
$resultSet = mysql_query($getQuery);
echo $resultSet;

?>