<?php
	include("../../site/header.php");
	
$UserCount = "SELECT * FROM `beta_users` WHERE  `usernameL` LIKE '%$query%' ORDER BY `username`";
$UcountQ = $conn->query($UserCount);
$UNR = $UcountQ->num_rows;
					
					$page = min($page,max((int)($count/20),1));
	
					$limit = ($page-1)*20;
	if (isset($_GET['search'])) {
		echo '<head><title>\'' . $_GET['search'] . '\' - a damn search users page</title></head>';}
	else {
		echo '<head><title>a damn search users page</title></head>';}
	
	if(isset($_GET['page'])) {$page = mysqli_real_escape_string($conn,intval($_GET['page']));} else {$page = 0;}
	$page = max($page,1);
?>

<!DOCTYPE html>
	<body>
		<div id="body">
			<div id="box" style="text-align:center;">
				<div id="subsect">
			<h3>Data Hill Users</h3>
<h5>(<?php echo $UNR?> Users)</h5>
					<form action="" method="GET" style="margin:15px;">
						<input style="width:500px; height:20px;" type="text" name="search" placeholder="I'm looking for...">
						<input style="height:24px;" type="submit" value="Submit">
					</form>
				</div>
</div>
				<?php
				if (isset($_GET['search'])) {
					$query = mysqli_real_escape_string($conn,strtolower($_GET['search']));
					
					$sqlCount = "SELECT * FROM `beta_users` WHERE  `usernameL` LIKE '%$query%' ORDER BY `username`";
					$countQ = $conn->query($sqlCount);
					$count = $countQ->num_rows;
					
					$page = min($page,max((int)($count/20),1));
	
					$limit = ($page-1)*20;
					
					$sqlSearch = "SELECT * FROM `beta_users` WHERE  `usernameL` LIKE '%$query%' ORDER BY `username` LIMIT $limit,20";
					$result = $conn->query($sqlSearch); ?>

<br>
<div id="column" style="width:435px; float:left;">
<div id="box">
<center><h4>users</h4></center>
<?php
					echo '<table width="100%"cellspacing="0"cellpadding="4"border="0"style="background-color:#000;"><tbody>';
					while($searchRow=$result->fetch_assoc()){ 
						$lastonline = strtotime($curDate)-strtotime($searchRow['last_online']);
						echo '<tr class="searchColumn"><td><img style="vertical-align:middle; width:40px;" src="/assets/images/avatars/'?><?php echo $searchRow["id"]; ?><?php echo '.png?c='?><?php echo $searchRow['avatar_id']; ?><?php echo '">';
						echo '<a href="/user?id=' . $searchRow['id'] . '">' . $searchRow['username'] . '</a></td>';
						echo '<td style="text-align:center;"><p>'; if($searchRow['description'] > null) {echo substr(htmlentities($searchRow['description']),0,50) , str_repeat("...",(strlen($searchRow['description']) >= 50)); } echo'</p></td>';
						if ($lastonline >= 300) {
							$timedif = $lastonline . " seconds";
							if ($lastonline >= 300) {$timedif = (int)gmdate('i',$lastonline) . " minutes";}
							if ($lastonline >= 3600) {$timedif = (int)gmdate('H',$lastonline) . " hours";}
							if ($lastonline >= 86400) {$timedif = (int)gmdate('d',$lastonline) . " days";}
							if ($lastonline >= 2592000) {$timedif = (int)gmdate('m',$lastonline) . " months";}
							if ($lastonline >= 31536000) {$timedif = (int)gmdate('Y',$lastonline) . " years";}
							echo '<td style="text-align:center;"><span style=" font-weight: bold;">' . $timedif . ' ago</span></td>';}
						else {
							echo '<td style="text-align:center;"><span style=" font-weight: bold;">Now</span></td>';}
						if ($lastonline <= 300) {echo '<td style="text-align:center;"><i style="color:Green;font-size:15px;" class="fa fa-circle"></i></td>';}
						else {echo '<td style="text-align:center;"><i style="color:#DD0000;font-size:15px;" class="fa fa-circle"></i></td>';}
					}
				} echo '</tbody></table>';
				?>
				
				<?php
				if(isset($_GET['search'])) {
					echo '<div class="numButtonsHolder" style="margin-left:auto;margin-right:auto;margin-top:10px;">';
					if($page-2 > 0) {
					    echo '<a style="color:#333;" href="?search='.$query.'&page=0">1</a> ... ';
					}
					if($count/20 > 1) {
				          for($i = max($page-2,0); $i < min($count/20,$page+2); $i++)
				          {
				            echo '<a style="color:#333;" href="?search='.$query.'&page='.($i+1).'">'.($i+1).'</a> ';
				          }
				        }
				        if($count/20 > 4) {
				            echo '... <a style="color:#333;" href="?search='.$query.'&page='.round($count/20).'">'.round($count/20).'</a> ';
				        }
					
					echo '</div>';
				}
				?>			
				</div>
				</div>
<div id="column" style="float:right; width:435px;">
<div id="box">
<center><h4>online users</h4></center>
<?php
include("online.php");
?>
</div>
</div>
			</div>



		</div>
		<?php 
		include("../../site/footer.php");
		?>
	</body>
</html>