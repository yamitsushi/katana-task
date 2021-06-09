<?php
include "includes/secret.php";

$type = $_GET["type"] ?? die("Type is not defined");
if($type == null) die("Type is invalid");


$conn = new mysqli($db_host, $db_username, $db_password, $db_table);
if($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
};


$results = $conn->query("SELECT `image_url` FROM `Logos` WHERE `type` = " . $type);

if($results->num_rows > 0) {
  $png_counter = 0;

  while($item = $results->fetch_assoc()) {
     echo $item['image_url'] . "<br>";

     if(pathinfo($item['image_url'], PATHINFO_EXTENSION) == "png") $png_counter++;
  };

  echo "<br><br> Total file with PNG as extension: " . $png_counter;
} else {
  echo "0 results";
};


$conn->close();