<!DOCTYPE html>
<?php 
include('fundoc.php');
$pide = 0;
$con=mysqli_connect("localhost:3307","root","","myhmsdb");
if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }

  if(isset($_GET['delete']))
  { 
    $doctrid = $_SESSION['docid'];
     $query5=mysqli_query($con,"delete from docreg where docid='$doctrid';");
    if($query5){
      echo ("<script>alert('Your account deleted Successfully');
      window.location.href = 'indexdoc.php';</script>");
    }

  }
$flag =0;
  if(isset($_GET['view']))
  {
    $pide = $_GET['pid'];
    $flag = 1;
  }

 

?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> CARE TRACK </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

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
  </style>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse" id="deldoc">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
       <div class="col-md-4"  style="padding-left: 850px;"> 
       <a href="admindoc.php?&delete=delacc" 
                              onClick="return confirm('Are you sure you want to delete your account ?')"
                              title="Delete Account" tooltip-placement="top" tooltip="Remove">
            <input type="button" id="inputbtn" name="delacc" value="Delete my account" class="btn btn-primary"></a></div>   
       </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
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
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?>  </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action <?php if($flag == 0) echo "active"; ?>" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
      <a class="list-group-item list-group-item-action <?php if($flag == 1) echo "active"; ?>" <?php if($flag == 0) echo "hidden = 'hidden'"; ?> href="#view-mhist" id="view-mhist-list" role="tab" data-toggle="list" aria-controls="home">View Medical History</a>
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <div class="tab-pane fade <?php if($flag == 0){ echo "show active";} ?>" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        
              <div class="container-fluid container-fullw bg-white" >
              <div class="row">

               <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Appointments</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                       </script>    
                                    
                      <p class="links cl-effect-1">
                        <a href="#list-app" onclick="clickDiv('#list-app-list')">
                          Appointment List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 15%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Prescriptions</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          Prescription List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>    
             </div>
           </div>
         </div>

<!-- Aswin did this -->
<div class="tab-pane fade <?php if($flag == 1){echo "show active";} ?>" id="view-mhist" role="tabpanel" aria-labelledby="view-mhist-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Surgeries</th>
                    <th scope="col">Medications</th>
                    <th scope="col">Conditions</th>
                    <th scope="col">Allergies</th>
                    <th scope="col">Hereditary</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost:3307","root","","myhmsdb");
                    global $con;

                    $query = "select surgeries, medication, conditions, allergies, hereditary from medhis where pid = $pide;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                  ?>
                      <tr>
                        <td><?php echo $row['surgeries'];?></td>
                        <td><?php echo $row['medication'];?></td>
                        <td><?php echo $row['conditions'];?></td>
                        <td><?php echo $row['allergies'];?></td>
                        <td><?php echo $row['hereditary'];?></td>
                        
                    
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>
<!--End of Aswin did -->
    

    <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Prescribe</th>
                    <th scope="col">Medical History</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost:3307","root","","myhmsdb");
                    global $con;
                    $dname = $_SESSION['docid'];
                    $query = "select pid,ID,appdate,apptime,userStatus,doctorStatus,allowmhis from appointmenttb where docid='$dname';";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                    $appid=$row['ID'];
                    $patid=$row['pid'];
                    $patdet = "select fname,lname,email,contact from patreg where pid='$patid';";
                    $result3 = mysqli_query($con,$patdet);
                    $row3 = mysqli_fetch_array($result3);
                      ?>
                      <tr>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row3['fname']." ".$row3['lname'];?></td>
                        <td><?php echo $row3['email'];?></td>
                        <td><?php echo $row3['contact'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      echo "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo "Cancelled by Patient";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo "Cancelled by You";
                    }
                        ?></td>

                     <td>
                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

													
	                        <a href="admindoc.php?ID=<?php echo $row['ID']?>&cancel=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>

                        <td>
                       <?php $flag2 =0;
                          $query2=mysqli_query($con,"select * from prestb where ID=$appid ;");
                          if($con){
                            if(mysqli_num_rows($query2) == 0){
                              $flag2 = 0;
                            }else{
                              $flag2 = 1;
                            }
                          }else{
                             echo "<script>alert('error!');</script>";
                          } ?>

                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1) && ($flag2 == 0))  
                        { 
                        ?>

                        <a href="prescribe.php?pid=<?php echo $row['pid']?>&ID=<?php echo $row['ID']?>&appdate=<?php echo $row['appdate']?>&apptime=<?php echo $row['apptime']?>"
                        tooltip-placement="top" tooltip="Remove" title="prescribe">
                        <button class="btn btn-success">Prescribe</button></a>
                        <?php  }elseif($flag2 == 1) {

                            echo "Prescribed";
                            }else {
                              echo "-";
                            } 
                          ?>
                        
                        </td>
                        <td>
                        <?php if(($row['allowmhis'] == 1) && ($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

                        <a href="admindoc.php?pid=<?php echo $row['pid']?>&view=viewmhist"
                        tooltip-placement="top" tooltip="Remove" title="viewmhist">
                        <button class="btn btn-success">View History</button></a>
                        <?php } else {

                            echo "-";
                            } ?>
                  
                       

                        </td>

                      

                      </tr></a>
                     
                    
                    <?php } ?>
                </tbody>
              </table>
           
        <br>
      </div>

      

       <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
                    <th scope="col">Edit Prescription</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php 

                     $con=mysqli_connect("localhost:3307","root","","myhmsdb");
                     global $con;
                     $dname = $_SESSION['docid'];
                     $prespatdet = "select ID,disease,allergy,prescription from prestb where ID in(select ID from appointmenttb where docid=$dname);";
                    
                     $result = mysqli_query($con,$prespatdet);
                     if(!$result){
                       echo mysqli_error($con);
                    }
                    

                     while ($row = mysqli_fetch_array($result)){
                      $aid = $row['ID'];
                      $patdet5 = "select appdate, apptime from appointmenttb where ID = '$aid';";
                      $result5 = mysqli_query($con, $patdet5);
                      $row5 = mysqli_fetch_array($result5);

                   ?>
                       <tr>
                        <td><?php echo $row['ID'];?></td>                       
                        <td><?php echo $row5['appdate'];?></td>
                        <td><?php echo $row5['apptime'];?></td>
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>  
                        <td> <a href="prescribe.php?ID=<?php echo $row['ID']?>"
                        tooltip-placement="top" tooltip="Remove" title="editpres">
                        <button class="btn btn-success">Edit</button></a></td>                 
                      </tr> 
                    <?php }
                    ?>
                </tbody>
              </table>
      </div> 
    </div>
  </div>
</div>
   </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>