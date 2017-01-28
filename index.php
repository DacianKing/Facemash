<html>
<title> Facemash</title>

<head>
<a href="/" style="text-decoration: none;"><h1 class="Facemash">Facemash</h1></a>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center>
<h1> Click Girls or Boys to play or click Top Scores to see the top 5 scores</h1>

<script src="https/ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</center>


<body>
<br>

<script type="text/javascript">

function girl(){
	window.location.replace("vote.php?gender=girls");
}
function boys(){
	window.location.replace("vote.php?gender=boys");
}
function topscore(){
	window.location.replace("topscore.php");
}


</script>

<div class="girls">
<button onclick="girl();">Girls</button>
</div>

<br>

<div class="boys">
<button onclick="boys();">Boys</button>
</div>

<div class = "topscoretest">
<button onclick="topscore();">Top Score</button>
</div>



<div class="Jason"></div>

<div class="Andi"></div>

</body>
</html>
