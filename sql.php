<?php

function fetch($sn) {

  $ret = "";
  // Create connection
  $conn = mysqli_connect("localhost", "root", "root", "facemash");

  if (!$conn) {
     die("Connection failed");
  }

  $sql = "SELECT score FROM stuff WHERE sn=$sn" ;
  $data = mysqli_query($conn,$sql);
  $rowcount = mysqli_num_rows($data);

  if($rowcount < 0) {
    mysqli_close($conn);
    die("Invalid student number");
  }

  if($rowcount > 0) {
    while($row = mysqli_fetch_assoc($data)) {
      ret = $row['score'];
  }
}
    mysqli_close($conn);

}

function timefetch($sn) {

  $t=time();

  $conn = mysqli_connect("localhost", "root", "root", "facemash");

  if (!$conn) {
     die("Connection failed");
  }

  $sql = "SELECT time FROM stuff WHERE sn=$sn";
  $data = mysqli_query($conn,$sql);
  $rowcount = mysqli_num_rows($data);

  if($rowcount < 0) {
    die("No record found");
  }
  if($rowcount > 0) {
    while($row = mysqli_fetch_assoc($data)) {
      $score = $row['time'];
      if($score == NULL || score == 0) {
        $timesql = "UPDATE stuff set time=$t where sn=$sn";
        mysqli_query($conn,$timesql);
        return 1;
      }
      if($score - $t != 75) {
        die("$score and $t");
        return 0;
      }
      $ret = $score;
  }
  }
  mysqli_close($conn);
}



function vote($sn) {

  $t=time();
  echo($t . "<br>");

  // Create connection
  $conn = mysqli_connect("localhost", "root", "root", "facemash");

  if (!$conn) {
     die("Connection failed");
  }

  $current = fetch($sn);
  $current += 1;

  if(timefetch($sn) == 0) {
    die("check");
  }


  $sql = "UPDATE stuff SET score=$current WHERE sn=$sn";
  $data = mysqli_query($conn,$sql);
  mysqli_close($conn);
}

function parse($string) {
  $niglet = substr($string,-10);
  $newstr = chop($niglet,".JPG");
  return $newstr;
}


?>
