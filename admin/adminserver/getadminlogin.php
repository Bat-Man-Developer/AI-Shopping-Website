<?php
include('adminconnection.php');
if(isset($_POST['adminloginbtn'])){
  $adminemail = $_POST['fldadminemail'];
  $adminpassword = $_POST['fldadminpassword'];

  //look up row in admins database where password & email match
  $stmt = $conn->prepare("SELECT fldadminid,fldadminname,fldadminposition,fldadmindepartment,fldadminemail,fldadminpassword FROM admins WHERE fldadminemail = ? AND fldadminpassword = ? LIMIT 1");
  $stmt->bind_param('ss',$adminemail,$adminpassword);
  if($stmt->execute()){
    $stmt->bind_result($adminid,$adminname,$adminposition,$admindepartment,$adminemail,$adminpassword);
    $stmt->store_result();
    $stmt->fetch();
    if($stmt->num_rows() == 1){
      $_SESSION['fldadminid'] = $adminid;
      $_SESSION['fldadminname'] = $adminname;
      $_SESSION['fldadminposition'] = $adminposition;
      $_SESSION['fldadmindepartment'] = $admindepartment;
      $_SESSION['fldadminemail'] = $adminemail;
      $_SESSION['fldproductowner'] = "Newstuffsa";
      $_SESSION['adminlogged_in'] = true;

      header('location: ../admin/dashboard.php?loginmessage=Logged In Successfully');
    }
    else{//Password or Email is Wrong Or not in Database
      header('location: ../admin/adminlogin.php?error=Could Not Verify Your Account!');
    }
  }
  else{
    header('location: ../admin/adminlogin.php?error=Could Not Login At The Moment');
  }
}