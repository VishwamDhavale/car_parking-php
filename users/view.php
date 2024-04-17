<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
      $parkingcharge=$_POST['parkingcharge'];
     
 
    
     
   $query=mysqli_query($con, "update  tblvehicle set Remark='$remark',Status='$status',ParkingCharge='$parkingcharge' where ID='$cid'");
    if ($query) {
    
     echo "<script>alert('All remarks has been updated');</script>";
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

  
} 


  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>VPMS - View Vehicle Detail</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->

  <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="manage-incomingvehicle.php">View Vehicle</a></li>
                                    <li class="active">Incoming Vehicle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">User Details</strong>
                        </div>
                        <div class="card-body">
                  
              <?php
$user=$_GET['userid'];
$ret=mysqli_query($con,"select * from user where userid='$user'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>User ID</th>
                                   <td><?php  echo $row['userid'];?></td>
                                   </tr>                             
<tr>
                                <th>User Name</th>
                                   <td><?php  echo $row['username'];?></td>
                                   </tr>
                                   <tr>
                                <th>User Type</th>
                                   <td><?php  echo $packprice= $row['usertype'];?></td>
                                   </tr>
                                <tr>
                                <th>First Name</th>
                                   <td><?php  echo $row['firstname'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Last Name</th>
                                      <td><?php  echo $row['lastname'];?></td>
                                  </tr>
                                      <tr>  
                                       <th>Email</th>
                                        <td><?php  echo $row['email'];?></td>
                                    </tr>
                    
                            

</table>
<?php } ?>
            <div class="card-header">
                <strong class="card-title">Booking Details</strong>
            </div>
              <?php
$book=$_GET['bookid'];
$ret=mysqli_query($con,"select * from book where bookid='$book'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>Book ID</th>
                                   <td><?php  echo $row['bookid'];?></td>
                                   </tr>                             
<tr>
                                <th>Vehicle No</th>
                                   <td><?php  echo $row['vehicleno'];?></td>
                                   </tr>
                                   <tr>
                                <th>Driver Name</th>
                                   <td><?php  echo $packprice= $row['drivername'];?></td>
                                   </tr>
                                <tr>
                                <th>Time From</th>
                                   <td><?php  echo $row['timefrom'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Time TO</th>
                                      <td><?php  echo $row['timeto'];?></td>
                                  </tr>
                            

</table>
<?php } ?>

<div class="card-header">
                <strong class="card-title">Vehicle Details</strong>
            </div>
              <?php
$customer=$_GET['customerid'];
$ret=mysqli_query($con,"select * from customertb where customerid='$customer'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>Vehicle Name</th>
                                   <td><?php  echo $row['vehiclename'];?></td>
                                   </tr>                             
<tr>
                                <th>Vehicle Type</th>
                                   <td><?php  echo $row['vehicletype'];?></td>
                                   </tr>
                                   <tr>
                                <th>Licence NO</th>
                                   <td><?php  echo $packprice= $row['licenceno'];?></td>
                                   </tr>
                            

</table>
<?php } ?>

                    </div>
                </div>
    
        


</table>


  

  


            </div>



        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include_once('includes/footer.php');?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>