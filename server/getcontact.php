<?php
include('connection.php');
if(isset($_POST['submitcontactformbtn'])){
  $name=$_POST['fldname'];
  $email=$_POST['fldemail'];
  $message=$_POST['fldmessage'];
  $from="From: $name<$email>\r\nReturn-path: $email";
  $subject="Message sent using your contact form";
  mail("kkay.mudau008@gmail.com", $subject, $message, $from);
  header('location: ../contact.php?message=Email Sent Succesfully. Customer Support Team Will Respond As Soon As Possible.');
}