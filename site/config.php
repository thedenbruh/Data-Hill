<?php 

  $conn = mysqli_connect( "localhost" , "root", "" , "tdbdnh");
  
  //gonna change to cookies soon
  if(session_status() == PHP_SESSION_NONE) {
    session_name("BRICK-SESSION");
    session_start();
  }
error_reporting(0);
?>