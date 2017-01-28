<?php

include("sql.php");

if(!isset($_GET['id'])) {
  die("no input");
}

$sn = $_GET['id'];

if($sn < 174420 || $sn > 440490) {
  die("Invalid student number");
}

$votes = fetch($sn);
if($votes == 0 ) {
  echo "You currently have no votes";
}
else {
echo "You have $votes votes";
}

?>
