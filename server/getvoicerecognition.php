<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $text = $_POST['text'];
  // Perform actions based on the recognized voice command
  if($text === 'open products page'){ 
    echo "<script> window.location.href='../products.php'; </script>";
  }
  else if($text === 'close products page' || $text === 'close home page' || $text === 'close'){
    exit;
  }
  else{
    header('location: index.php');
  }
  // Return the response to the JavaScript code
  echo $text;
}