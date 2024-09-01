<?php
$con=mysqli_connect("localhost:3307","root","","myhmsdb");
function display_specs() {
  global $con;
  $query="select distinct(spec) from docreg";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $spec=$row['spec'];
    echo '<option data-value="'.$spec.'">'.$spec.'</option>';
  }
}
function display_docs()
{
 global $con;
 $query = "select * from docreg";
 $result = mysqli_query($con,$query);
 while( $row = mysqli_fetch_array($result) )
 {$docid=$row['docid'];
  $username = $row['fname'].' '.$row['lname'];
  $spec = $row['spec'];
  echo '<option value="' .$docid. '"  data-spec="'.$spec.'">'.$username.'</option>';
 }
}
?>