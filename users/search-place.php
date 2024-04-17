<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsuid']==0)) {
  header('location:logout.php');
  } else{

/*if(isset($_POST['search_buttom']))
  {
    $search=$_POST['search'];
  }
  $query=("select spaceid from space where space.loction='$search'");
  if($query)
  {
    echo "<script>alert('Vehicle Entry Detail has been added');</script>";
  }
  else{
    echo "<script>alert('place not found. Please try again.');</script>"; 
  }*/
  

  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>VPMS - Add Vehicle</title>
   

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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
<?php
      
      $type=$_SESSION['vpmstype'];
      if($type =='renter'){
        include_once('includes/sidebar-disable.php');
      }else
      {
        include_once('includes/sidebar.php');
      }
    ?>
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
                                    <li><a href="add-vehicle.php">Vehicle</a></li>
                                    <li class="active">Add Vehicle</li>
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
                    <div class="col-lg-4">
                    
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    
                                   
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Search By Location</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="searchdata" name="searchdata" class="form-control"  required="required" autofocus="autofocus" ></div>
                    </div>
                                 
                                    
                                    
                  <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="search" >Search</button></p>
                 </form>
              </div>

              <?php
if(isset($_POST['search']))
{ 
$sdata=$_POST['searchdata'];
$zero=0;
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Location</th>
                    <th>Spaceowner</th>
                    <th>Rent(Per Hour)</th>
                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php

$ret=mysqli_query($con,"select *from  space where location like '$sdata%'");


$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
if($row['no_of_slots']>0){
?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['location'];?></td>
                  <td><?php  echo $row['spaceowner'];?></td>
                  <td><?php  echo $row['rent'];?></td>
                  
                  <td><a href="add-vehicle.php?spaceid=<?php echo $row['spaceid'];?>">Book</a></td>
                </tr>
                <?php }
                else{
                  
                }
$cnt=$cnt+1;
} } else { ?>
     <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
              </table>

                    

                    <div class="col-lg-6">
                        
                  
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