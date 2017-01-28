<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "facemash";

die('check code');

function parse($string) {
  $niglet = substr($string,-10);

  $newstr = chop($niglet,".JPG");
  return $newstr;
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . $conn->connect_error);
}

foreach(glob('/var/www/html/photos/'.'*.JPG') as $file) {
  $sn = parse($file);

  $sql = "INSERT INTO stuff (sn,score)
  VALUES ($sn, 0) ON DUPLICATE KEY UPDATE";
  if(!mysqli_query($conn,$sql)) {
    die("failed");
  }
}

/*
$sql = "INSERT INTO stuff (sn,score)
VALUES ($sn, 0)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
*/
?>
