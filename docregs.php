<?php
$con=mysqli_connect("localhost:3307","root","","myhmsdb");
session_start();
if(isset($_POST['patsub1'])){
	$fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
	$password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $spec=$_POST['spec'];
  $result2=mysqli_query($con,"select * from docreg where email='$email'");
  $row2 = mysqli_fetch_assoc($result2);
  if($row2===null){
  if($password==$cpassword){
  	$query="insert into docreg(fname,lname,gender,email,contact,password,spec) values ('$fname','$lname','$gender','$email','$contact','$password','$spec');";
    $result=mysqli_query($con,$query);
    $idfind="select * from docreg where email='$email';";
    $resultid=mysqli_query($con,$idfind);
    $rows = mysqli_fetch_array($resultid);
    if($result){
      $_SESSION['fname']= $fname;
      $_SESSION['lname']= $lname;  
      $_SESSION['username']=$fname." ".$lname;
      $_SESSION['docid']=$rows['docid'];
    } 
    header("Location:admindoc.php");
  }
  else{
    header("Location:error1.php");
  }
}else{
  echo "<script>alert('User already registered. Please login'); window.location='indexdoc.php';</script>";
}
}
?>
