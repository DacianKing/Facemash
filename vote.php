<html>
<title>Facemash</title>
<head>
<a href="/" style="text-decoration: none;"><h1 class="Facemash">Facemash</h1></a>
</head>
<body>


<style>
button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    border-radius: 10px;
    width: 300px;
}

div {
  text-align: center;
}

.center {
  text-align: center;
}
/*
.img1 {
  background-color: white;
  display: inline-block;
  position: absolute;
  right: 50%;
  border: 3px solid #990000;
  padding: 0px;
}

.img2 {
  background-color: white;
  display: inline-block;
  position: absolute;
  right: 0%;
  border: 3px solid #990000;
  padding: 0px;
}
*/
 img:hover {
    opacity: .5;
}

.Facemash {
	border: 15px solid #990000;
	border-radius: 10px;
	background-color: #990000;
	color: white;
	text-align: center;
	font-size: 50;
	font-family: "Rockwell";
}
</style>

<script type="text/javascript">

function send(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
function spic1() {
    var location = window.location.origin;
    var get = location.concat('/send.php?id=');
    var url = get.concat(document.getElementById("picture1").alt);
    send(url);
    window.location = self.location;
    location.reload(true);
}

function spic2() {
  var location = window.location.origin;
  var get = location.concat('/send.php?id=');
    var url = get.concat(document.getElementById("picture2").alt);
    send(url);
    window.location = self.location;
    location.reload(true);
}

function checkvotes() {
	
  var num = document.getElementById('box').value;
  if(isNaN(num) || num < 132942 && num > 440490) {
    document.getElementById('checkurvotes').innerHTML = "Invalid student number";
  }
  else {
    var url = window.location.origin;
    var loc = url.concat("/score.php?id=");
    var actual = loc.concat(num);
    var votes = send(actual);
    document.getElementById('checkurvotes').innerHTML = votes;
  }
  
  if(num == 406964){
	  alert("SUP WARSAME YOU SKID");
  }
}

</script>

<h2 class="center">Click on the image to vote</h2>

<br>
<?php

include('sql.php');

if(!isset($_GET['gender'])) {
  die("Invalid get request you commie swine.");
}


if($_GET['gender'] == "boys") {
$images = glob("Boys/*");
}

if($_GET['gender'] == "girls") {
  $images = glob("Girls/*");
}

shuffle($images);

$randomImage=array_pop($images);
$randomImage2=array_pop($images);

$alt = parse($randomImage);
$alt2 = parse($randomImage2);

echo '<img src ="' . $randomImage. '" alt= "' . $alt. '" align="middle" onclick="spic1();" class="img1" id="picture1"></a>';
echo '<img src ="' . $randomImage2. '" alt= "' . $alt2. '" align="middle" onclick="spic2();" class="img2" id="picture2"></a>';

$pic1votes = fetch($alt);
$pic2votes = fetch($alt2);
echo "<div>";
echo "<p>$pic1votes votes  :  $pic2votes votes</p>";
?>
<br>

<p id="checkurvotes">Check your votes!</p>

<input type="text" id="box" placeholder="Enter your student number"></input>

<br>
<button onclick="checkvotes();">Check</button>

</div>
</body>
</html>
