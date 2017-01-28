
<link rel="stylesheet" type="text/css" href="style.css">
<a href="/" style="text-decoration: none;"><h1 class="Facemash">Facemash</h1></a>


<?php



$conn = mysqli_connect("localhost", "root", "root", "facemash");
 if(!$conn) {
   die("db rip");
 }

$sql = "SELECT sn,score FROM stuff ORDER BY score DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

 echo '<div class = "topScore">';
 echo "<u>Top Scores</u>";
 echo '<br>';

$place = 1;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "$place. " . $row['sn'] . " with " . $row['score'] . " votes" . "<br>";	
		echo '<img src = ' . "TopScore/" . $row["sn"] . ".JPG" . ">";
		echo'<br>';
        $place++;
    }
	
} else {
    echo "db ripped";
}

mysqli_close($conn);


?>
