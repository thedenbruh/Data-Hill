<?php 
include("../../site/header.php");
?>
<style>
@font-face {
	font-family: "pixel";
	src: url('FSEX300.ttf');
}
body {
	margin: auto !important;
}
.download-1 {
	box-sizing: border-box;
	width: 100%;
	padding: 8px;
	background-image: url('repeat2.png');
	background-repeat: repeat-x;
}
.download-2 {
	box-sizing: border-box;
	width: 100%;
	padding: 55px;
	background-image: url('sil.png');
	background-repeat: repeat-x;
}
.nice-button {
	padding: 10px;
	font-size: 1.5rem;
	background-color: #08ca08;
	border-bottom: 5px solid #008600;
	text-align:center;
}
.nice-button:hover {
	cursor: pointer;
}
.nice-button:active {
	margin-top:5px ;
	border-bottom: 0px solid transparent;
}
.nice-red-button {
	background-color: #FF5747;
	border-bottom: 5px solid #CB4538;
}
.nice-green-button {
	background-color: #2BDC32;
	border-bottom: 5px solid #22B229;
}
.nice-blue-button {
	background-color: #15BFFF;
	border-bottom: 5px solid #109ACD;
}
</style>
<title>Download - TDBDNH 3</title>
<br><br><br><br>
<div class="download-1"></div>
<div style="background-color:#343b42;color:#fff;padding:10px;">
	<div id="body">
		<div class="pixel-font center-text large-txt">
			Download something
		</div>
		<div class="pixel-font center-text">
		V.01
		</div>
		<div style="margin-top:10px;overflow:auto;">
			<div class="three-slots">
				<div class="nice-button pixel-font nice-blue-button">
					<a href='/download/tdbdnhmultiplayer.zip'>TDBDNH Multiplayer Client (Beta)</a>
				</div>
			</div>
			<div class="three-slots">
				<div class="nice-button pixel-font nice-red-button">
					<a href='/download/Workshop.exe'>2017 Editor</a>
				</div>
			</div>
			<div class="three-slots">
				<div class="nice-button pixel-font nice-green-button">
					<a href='/download/x64.zip'>MBrickPlayer (x64 platforms)</a>
				</div>
			</div>
			</div>
			<div style="padding-top:7px;color: orange;padding-bottom:6px;" class="pixel-font center-text">
			TDBDNH Multiplayer Client is in Beta Stage testing, so you can find bugs. Also, put this client in C:\ and you need to portforward it with 42480 port. 
			</div>
	</div>
</div>
<div class="download-2"></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
include("../../site/footer.php");
?>