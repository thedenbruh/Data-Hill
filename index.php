<?php
    include("site/header.php");
   if($loggedIn) {header("Location: /user/dashboard/"); die();}
?>
<!DOCTYPE html>
<html>
<head>
<style>
@font-face {
	font-family: "idk";
	src: url('/assets/W95FA.otf');
}

.button {
    padding: 5px;
    font-size: 1.5rem;
    background-color: #08ca08;
    border-bottom: 5px solid #008600;
    text-align: center;
}
.button:hover {
	cursor: pointer;
}
.button:active {
    border-bottom: 0px solid transparent;
    margin-top: 15px;
}
.red-button {
	background-color: #FF5747;
	border-bottom: 5px solid #CB4538;
}
.green-button {
	background-color: #2BDC32;
	border-bottom: 5px solid #22B229;
}
  .blue-button {
    background-color: #15BFFF;
    border-bottom: 5px solid #109ACD;
    color: white;
}
</style>
	<style>
	#landing {
	   background-image: url(/assets/landing.png);
	   height: 480px;
	   background-repeat: round;
	   background-size: cover;
	}
	</style>
	<title>Data Hill</title>
</head>
<body>
	<div id="body">
		<div id="box" style="padding: 10px;">
			<div id="landing">
				<div style="display: inline-table;padding-top: 5%;padding-left: 5%;">
					<center><h3>Welcome to Data Hill</h3>
					<h4>thank god, a rewritten revival</h4></center>

          
          <div>
            
          <center><div class="button pixel-text blue-button" style="display:inline-block;" onClick="window.location.replace('/auth/register/');">
					register
          </div></center></div>
<center><div class="button pixel-text blue-button" style="display:inline-block;" onClick="window.location.replace('/auth/login/');">
					login </div></center>
				</div>
			</div>
			<h5 style="color:black;margin:0px;margin-top:5px;">made by thedenbruh hands + experiment + tdbdnh 1 revival + something else + bh staff gonna kill me + idfk</h5>
			<hr>
ok wtf is this?
<br>
well uhhh, this is the beta tdbdnh and its source will be used in future soon
    </div>

	</div><?php
	        include("site/footer.php");
	    ?>
</body>
</html>