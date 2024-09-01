<!DOCTYPE html>
<?php
include('fundoc.php');
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$doctor = $_SESSION['username'];
if( isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $flag =0;
$query = mysqli_query($con, "select * from prestb where ID = $ID;");
if($con){
  if(mysqli_num_rows($query) == 0){
    $flag = 0;
    $disease = '';
    $allergy = '';
    $prescription = '';

  }else{
    $flag = 1;
    $row = mysqli_fetch_array($query);
    $disease = $row['disease'];
    $allergy = $row['allergy'];
    $prescription = $row['prescription'];
  }
}else{
   echo "<script>alert('error!');</script>";
}
}



if(isset($_POST['prescribe'])  && isset($_POST['ID']) ){
  $disease = $_POST['disease'];
  $allergy = $_POST['allergy'];
  $ID = $_POST['ID'];
  $prescription = $_POST['prescription'];

$query = mysqli_query($con, "select * from prestb where ID = $ID;");
if($con){
  if(mysqli_num_rows($query) == 0){
    $flag = 0;
 }else{
    $flag = 1;
   }
}else{
   echo "<script>alert('error!');</script>";
}

  if($flag == 0){
  $query=mysqli_query($con,"insert into prestb(ID,disease,allergy,prescription) values ('$ID','$disease','$allergy','$prescription')");
    if($query)
    {
      echo "<script>alert('Prescribed successfully!'); window.location.href = 'admindoc.php';</script>";
    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
  }else{
    $query=mysqli_query($con,"update prestb set disease = '$disease', allergy = '$allergy', prescription = '$prescription' where ID = $ID;");
    if($query)
    {
      echo "<script>alert('Prescribe Edited successfully!'); window.location.href = 'admindoc.php';</script>";
    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
  }
}

?>

<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> CARE TRACK </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        
      </li>
       <li class="nav-item">
       <a class="nav-link" href="admindoc.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
    </ul>
  </div>
</nav>

</head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>

<body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $doctor ?>
   </h3>

   <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
        
          <div class="row">
                  <div class="col-md-4"><label>Disease:</label></div>
                  <div class="col-md-8">
                  <!-- <input type="text" class="form-control" name="disease" required> -->
                  <textarea id="disease" cols="86" rows ="5" name="disease" required><?php echo "$disease"; ?></textarea>
                  </div><br><br><br>
                  
                  <div class="col-md-4"><label>Allergies:</label></div>
                  <div class="col-md-8">
                  <!-- <input type="text"  class="form-control" name="allergy" required> --> 
                  <textarea id="allergy" cols="86" rows ="5" name="allergy"  required><?php echo "$allergy"; ?></textarea>
                  </div><br><br><br>
                  <div class="col-md-4"><label>Prescription:</label></div>
                  <div class="col-md-8">
                  <!-- <input type="text" class="form-control"  name="prescription"  required> -->
                  <textarea id="prescription" cols="86" rows ="10" name="prescription"required><?php echo "$prescription"; ?> </textarea>
                  </div><br><br><br>
                  <input type="hidden" name="ID" value="<?php echo $ID ?>" />
                  <br><br><br><br>
          <input type="submit" name="prescribe" value="<?php if($flag == 0) {echo "Prescribe";}else{echo "Edit Changes";} ?>" class="btn btn-primary" style="margin-left: 40pc;">
          
        </form>
        <br>
        
      </div>
      </div>
      

  
