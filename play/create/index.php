<?php
  include('../../site/header.php');
  include('../../site/config.php');
  include('../../site/PHP/helper.php');
  
  if(!$loggedIn) {header("Location: index"); die();}
  
  $error = array();
  
  $createdSQL = "SELECT * FROM `games` WHERE `owner_id` = '$currentUserID'";
  $created = $conn->query($createdSQL);
  if($created->num_rows >= $membershipRow['sets']) {
    $error[] = "You cannot create any more sets";
  }
  
  
  if(isset($_POST['submit'])) {
    if(isset($_FILES['image'])) {
      $imgName = $_FILES['image']['name'];
      $imgSize = $_FILES['image']['size'];
      $imgTmp = $_FILES['image']['tmp_name'];
      $imgType = $_FILES['image']['type'];
      $isImage = getimagesize($imgTmp);
      
      if($isImage !== false) {                 
        if($imgSize < 2097152) {
          if(isset($_POST['name'])) {
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $nameSQL = "SELECT * FROM `games` WHERE `name` LIKE '$name'";
            $nameExists = $conn->query($nameSQL);
            if($nameExists->num_rows == 0) {
                      if(isset($_POST['description'])) {
                  $desc = mysqli_real_escape_string($conn,$_POST['description']);
                      } else {$desc = NULL;}
                    
                      $userID = $_SESSION['id'];
                      
                      $clanSQL = "INSERT INTO `games` (`id`,`creator_id`,`name`,`description`,`playing`,`visits`, `date`, `last_updated`, `address`, `uid`, `active`) VALUES (NULL ,'$userID','$name','$desc','0','0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '127.0.0.1', 'tdbdnh', '1')";
                      $clan = $conn->query($clanSQL);
                      $clanID = $conn->insert_id;
                      move_uploaded_file($imgTmp,"../../images/games/".$clanID.".png");
                      
                      header("location: /play/set?id=".$clanID);
                    } else {
                      $error[] = 'Your prefix must contain only alphanumeric characters';
                    }
                  } else {
                    $error[] = 'Your clan prefix must be between 1 and 15 characters.';
                  }
                } else {
                  $error[] = 'Insufficient bucks!';
                }
              } else {
                $error[] = 'Your clan needs a prefix!';
              }
            } else {
              $error[] = 'Name taken!';
            }
          } else {
            $error[] = 'ok be sure this feature is experimental and everything funny thing can happen';
          }
        
?>

<!DOCTYPE html>
  <head>
    <title>New Set - TDBDNH</title>
  </head>
  <body>
    <div id="body">
      <div id="box">
        <div id="subsect">
        <center><h2>Create a Set</h2></center>
        </div>
        <?php
        if(!empty($error)) {
          echo '<div style="background-color:#EE3333;margin:10px;padding:5px;color:white;">';
          foreach($error as $errno) {
            echo $errno."<br>";
          } 
          echo '</div>';
        }
        ?>
        <center><form style="margin:10px;" action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="name" style="font-size:14px;padding:4px;margin-bottom:10px;" placeholder="Name"><br>
          Image: <input type="file" name="image" style="margin-bottom:10px;"><br>
          <textarea name="description" placeholder="Description" style="width:320px;height:100px;margin-bottom:10px;"></textarea><br>
          <input type="submit" name="submit">
        </form> </center>
      </div>
    </div>
  </body>
</html>

<?php
  include("../../site/footer.php");
?>