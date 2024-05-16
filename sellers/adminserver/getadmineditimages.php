<?php
include('adminconnection.php');
//Edit Product Details
if(isset($_POST['productsellerseditimagesbtn'])){
  //The Image File
  $target_dir = $_SERVER['DOCUMENT_ROOT']."/assets/images/";
  $productimage = basename($_FILES["fldproductimage"]["name"]);
  $productimage1 = basename($_FILES["fldproductimage1"]["name"]);
  $productimage2 = basename($_FILES["fldproductimage2"]["name"]);
  $productimage3 = basename($_FILES["fldproductimage3"]["name"]);
  $productimage4 = basename($_FILES["fldproductimage4"]["name"]);
  $productimage5 = basename($_FILES["fldproductimage5"]["name"]);
  $productimage6 = basename($_FILES["fldproductimage6"]["name"]);

  //The Image Name
  $productname = $_POST['fldproductname'];

  //Check Files
  $uploadOk = 1;
  $imageFileType = pathinfo($productimage,PATHINFO_EXTENSION);
  $imageFileType1 = pathinfo($productimage1,PATHINFO_EXTENSION);
  $imageFileType2 = pathinfo($productimage2,PATHINFO_EXTENSION);
  $imageFileType3 = pathinfo($productimage3,PATHINFO_EXTENSION);
  $imageFileType4 = pathinfo($productimage4,PATHINFO_EXTENSION);
  $imageFileType5 = pathinfo($productimage5,PATHINFO_EXTENSION);
  $imageFileType6 = pathinfo($productimage6,PATHINFO_EXTENSION);
  $check = getimagesize($productimage);
  $check1 = getimagesize($productimage1);
  $check2 = getimagesize($productimage2);
  $check3 = getimagesize($productimage3);
  $check4 = getimagesize($productimage4);
  $check5 = getimagesize($productimage5);
  $check6 = getimagesize($productimage6);

  // Check image file sizes
  if($_FILES["fldproductimage"]["size"] > 10000000 && $_FILES["fldproductimage1"]["size"] > 10000000 && $_FILES["fldproductimage2"]["size"] > 10000000 && $_FILES["fldproductimage3"]["size"] > 10000000 && $_FILES["fldproductimage4"]["size"] > 10000000 && $_FILES["fldproductimage5"]["size"] > 10000000 && $_FILES["fldproductimage6"]["size"] > 10000000){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Your File Is Too Large.');
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
  && $imageFileType1 != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
  && $imageFileType2 != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
  && $imageFileType3 != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg"
  && $imageFileType4 != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg"
  && $imageFileType5 != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType6 != "jpg" && $imageFileType6 != "png" && $imageFileType6 != "jpeg"
  && $imageFileType6 != "gif"){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType == "jpg" && $imageFileType1 == "jpg" && $imageFileType2 == "jpg" && $imageFileType3 == "jpg" && $imageFileType4 == "jpg" && $imageFileType5 == "jpg" && $imageFileType6 == "jpg"){
    //Image Names
    $productimagename = $productname.uniqid().".jpg";
    $productimagename1 = $productname.uniqid()." 1.jpg";
    $productimagename2 = $productname.uniqid()." 2.jpg";
    $productimagename3 = $productname.uniqid()." 3.jpg";
    $productimagename4 = $productname.uniqid()." 4.jpg";
    $productimagename5 = $productname.uniqid()." 5.jpg";
    $productimagename6 = $productname.uniqid()." 6.jpg";
    $target_file = $target_dir.$productimagename;
    $target_file1 = $target_dir.$productimagename1;
    $target_file2 = $target_dir.$productimagename2;
    $target_file3 = $target_dir.$productimagename3;
    $target_file4 = $target_dir.$productimagename4;
    $target_file5 = $target_dir.$productimagename5;
    $target_file6 = $target_dir.$productimagename6;
  }
  else if($imageFileType == "jpeg" && $imageFileType1 == "jpeg" && $imageFileType2 == "jpeg" && $imageFileType3 == "jpeg" && $imageFileType4 == "jpeg" && $imageFileType5 == "jpeg" && $imageFileType6 == "jpeg"){
    $productimagename = $productname.uniqid().".jpeg";
    $productimagename1 = $productname.uniqid()." 1.jpeg";
    $productimagename2 = $productname.uniqid()." 2.jpeg";
    $productimagename3 = $productname.uniqid()." 3.jpeg";
    $productimagename4 = $productname.uniqid()." 4.jpeg";
    $productimagename5 = $productname.uniqid()." 5.jpeg";
    $productimagename6 = $productname.uniqid()." 6.jpeg";
    $target_file = $target_dir.$productimagename;
    $target_file1 = $target_dir.$productimagename1;
    $target_file2 = $target_dir.$productimagename2;
    $target_file3 = $target_dir.$productimagename3;
    $target_file4 = $target_dir.$productimagename4;
    $target_file5 = $target_dir.$productimagename5;
    $target_file6 = $target_dir.$productimagename6;
  }
  else if($imageFileType == "png" && $imageFileType1 == "png" && $imageFileType2 == "png" && $imageFileType3 == "png" && $imageFileType4 == "png" && $imageFileType5 == "png" && $imageFileType6 == "png"){
    $productimagename = $productname.uniqid().".png";
    $productimagename1 = $productname.uniqid()." 1.png";
    $productimagename2 = $productname.uniqid()." 2.png";
    $productimagename3 = $productname.uniqid()." 3.png";
    $productimagename4 = $productname.uniqid()." 4.png";
    $productimagename5 = $productname.uniqid()." 5.png";
    $productimagename6 = $productname.uniqid()." 6.png";
    $target_file = $target_dir.$productimagename;
    $target_file1 = $target_dir.$productimagename1;
    $target_file2 = $target_dir.$productimagename2;
    $target_file3 = $target_dir.$productimagename3;
    $target_file4 = $target_dir.$productimagename4;
    $target_file5 = $target_dir.$productimagename5;
    $target_file6 = $target_dir.$productimagename6;
  }
  else if($imageFileType == "gif" && $imageFileType1 == "gif" && $imageFileType2 == "gif" && $imageFileType3 == "gif" && $imageFileType4 == "gif" && $imageFileType5 == "gif" && $imageFileType6 == "gif"){
    $productimagename = $productname.uniqid().".gif";
    $productimagename1 = $productname.uniqid()." 1.gif";
    $productimagename2 = $productname.uniqid()." 2.gif";
    $productimagename3 = $productname.uniqid()." 3.gif";
    $productimagename4 = $productname.uniqid()." 4.gif";
    $productimagename5 = $productname.uniqid()." 5.gif";
    $productimagename6 = $productname.uniqid()." 6.gif";
    $target_file = $target_dir.$productimagename;
    $target_file1 = $target_dir.$productimagename1;
    $target_file2 = $target_dir.$productimagename2;
    $target_file3 = $target_dir.$productimagename3;
    $target_file4 = $target_dir.$productimagename4;
    $target_file5 = $target_dir.$productimagename5;
    $target_file6 = $target_dir.$productimagename6;
  }

  // Check if file already exists
  if(file_exists($target_file || $target_file1 || $target_file2 || $target_file3 || $target_file4 || $target_file5 || $target_file6)){
    $uploadOk = 0;
    header('location: ../sellers/admineditimages.php?errormessage=Error Occured, File Already Exists.');
  }
  
  // Check if $uploadOk is set to 0 by an error
  if($uploadOk == 0){
    header('location: ../sellers/admineditimages.php?errormessage=Unexpected Error, Please Try Again.');
  }
  else{// if everything is ok, try to Upload File
    if(move_uploaded_file($_FILES["fldproductimage"]["tmp_name"], $target_file)){
      if(move_uploaded_file($_FILES["fldproductimage1"]["tmp_name"], $target_file1)){
        if(move_uploaded_file($_FILES["fldproductimage2"]["tmp_name"], $target_file2)){
          if(move_uploaded_file($_FILES["fldproductimage3"]["tmp_name"], $target_file3)){
            if(move_uploaded_file($_FILES["fldproductimage4"]["tmp_name"], $target_file4)){
              if(move_uploaded_file($_FILES["fldproductimage5"]["tmp_name"], $target_file5)){
                if(move_uploaded_file($_FILES["fldproductimage6"]["tmp_name"], $target_file6)){

                }
                else{
                  header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
                }
              }
              else{
                header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
              }
            }
            else{
              header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
            }
          }
          else{
            header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
          }
        }
        else{
          header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
        }
      }
      else{
        header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
      }
    }
    else{
      header('location: ../sellers/admineditimages.php?errormessage=Image Upload Failed, Try Again.');
    }
  }

  $productid = $_POST['fldproductid'];

  //Update Product Images
  $stmt = $conn->prepare("UPDATE products SET fldproductimage=?, fldproductimage1=?, fldproductimage2=?, fldproductimage3=?, fldproductimage4=?, fldproductimage5=?, fldproductimage6=? WHERE fldproductid=?");

  $stmt->bind_param('sssssssi',$productimagename,$productimagename1,$productimagename2,$productimagename3,$productimagename4,$productimagename5,$productimagename6,$productid);
    
  if($stmt->execute()){
    header('location: ../sellers/adminproducts.php?editmessage=Images Changed Succesfully!');
  }
  else{
    header('location: ../sellers/adminproducts.php?errormessage=Error Occured, Try Again.');
  }
}
else{//no product id was given
  header('sellers/dashboard.php?errormessage=Something went wrong!');
}

$productid = $_GET['fldproductid'];
$stmt = $conn->prepare("SELECT * FROM products WHERE fldproductid = ?");
$stmt->bind_param("i",$productid);
$stmt->execute();
// This is an array of 1 product
$product = $stmt->get_result();