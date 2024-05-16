<?php
include('connection.php');
if(isset($_POST['testimonialscommentbtn'])){
  $testimonialscomment = $_POST['fldtestimonialscomment'];
  $testimonialsdate = date('Y-m-d H:i:s');
  $testimonialsemail = $_SESSION['fldtestimonialsemail'];
  $testimonialsfirstname = $_SESSION['fldtestimonialsfirstname'];
  $testimonialslastname = $_SESSION['fldtestimonialslastname'];
  $testimonialsimage = $_SESSION['fldtestimonialsimage'];

  //check whether there is a user with this email or not
  $stmt = $conn->prepare("SELECT count(*) FROM testimonials WHERE fldtestimonialsemail=?");
  $stmt->bind_param('s',$testimonialsemail);
  if($stmt->execute()){
    $stmt->bind_result($num_rows);
    $stmt->store_result();
    $stmt->fetch();
  }
  else{
    header('location: ../testimonials.php?errormessage=Something Went Wrong Try Again!');
  }
  //if user row is found in testimonials database
  if($num_rows != 0){
    //create a new testimonial user
    $stmt1 = $conn->prepare("UPDATE testimonials SET fldtestimonialscomment=?, fldtestimonialsdate=? WHERE fldtestimonialsemail=?");

    $stmt1->bind_param('sss',$testimonialscomment,$testimonialsdate,$testimonialsemail);

    //if account was created succesfully
    if($stmt1->execute()){
    header('location: ../testimonials.php?testimonialsmessage=Response Updated Succesfully!');
    }
    else{
      header('location: ../testimonials.php?errormessage=Something Went Wrong Try Again!');
    }
  }
  else{//if no user registered with this email before
    header('location: ../testimonialslogin.php?errormessage=User With This Email Does Not Exists');
  }
}

//Display in Home/Index Testimonials & Suggestions in Database
$stmt2 = $conn->prepare("SELECT * FROM testimonials WHERE fldtestimonialscomment != ''");
if($stmt2->execute()){
  $testimonials = $stmt2->get_result();// This is an array
}
else{
  header('location: ../index.php?error=Something Went Wrong. Contact Support Team.');
}