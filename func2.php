<?php
session_start();
$con=mysqli_connect("localhost:3307","root","","myhmsdb");
if(isset($_POST['patsub1'])){
	$fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
	$password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $result1=mysqli_query($con,"select * from patreg where email='$email'");
  $row1 = mysqli_fetch_assoc($result1);
  if($row1===null){
  if($password==$cpassword){
  	$query="insert into patreg(fname,lname,gender,email,contact,password) values ('$fname','$lname','$gender','$email','$contact','$password');";
    $result=mysqli_query($con,$query);
    if($result){
        $_SESSION['username'] = $_POST['fname']." ".$_POST['lname'];
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['contact'] = $_POST['contact'];
        $_SESSION['email'] = $_POST['email'];
        $query2 = "select * from patreg where email = '$email' and password = '$password'; " ;  
        $result2 = mysqli_query($con, $query2);
        if($result2){
          $row3 = mysqli_fetch_assoc($result2);
          $_SESSION['pid'] = $row3['pid'];
        }
      } 
      header("Location:admin-panel.php");
 }
  else{
    header("Location:error1.php");
  }
}
else{
  echo "<script>alert('User already registered.Please login'); window.location='index1.php';</script>";
}
}
?>
