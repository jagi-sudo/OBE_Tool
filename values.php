<!DOCTYPE html>
<?php
// Start the session
session_start();
error_reporting(~E_WARNING & ~E_NOTICE);
$host="localhost";
$user="root";
$pass="";
$db="college_project";
$conn=new mysqli($host,$user,$pass,$db);
$branch=$_SESSION['branch'];
$desgn=$_SESSION['desgn'];
$id = $_SESSION['user_id'];
$query="SELECT DISTINCT * FROM $branch WHERE `teacher_id`='$id'";
$result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
if(isset($_POST['can_cred'])){
  header("Location:index.php");            
  session_destroy();
  } 
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Reports</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3857a76116.js" crossorigin="anonymous"></script>
    <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"></a>
                <div><img src="images/logo.png" style="margin-right:-15%; height:120px; width:200px; position:relative; top: -50px;" alt="obe tool"></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar" style="margin-top:10%;">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php" style="font-size:110%;"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link active" href="reports.php"style="font-size:110%;"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="curriculum.php"style="font-size:110%;"><i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><?if($desgn=="HOD"){ echo'<a class="nav-link" href="download_reports.php"style="font-size:110%;"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a>';}?><a class="nav-link" href="UserProfile.php"style="font-size:110%;"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
                    <li
                        class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                    <h3>Reports</h3>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" style="color:black;" data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="images/hi.png"/>&nbsp;&nbsp;<?php echo '<strong>'.$_SESSION["f_name"].' '.$_SESSION["s_name"].'</strong>'?><span class="d-none d-lg-inline mr-2 text-gray-600 small"></span></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="UserProfile.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="change-password.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Change Password</a>
                                        
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                  </div>
                <div class="card shadow">

                <div class="card-body">

                
                <div class="container-fluid">
<div class="row" style="padding: 1%;">
  <div class='col-2'>
    <nav class="nav flex-column" style="margin: 1%;">
    
          <a class="nav-link" href="reports.php" style="color: black;">Subject Analysis</a>
          <a class="nav-link" href="#" style="color:#007bff;font-weight:bold">Threshold Values</a>
          <a class="nav-link active" href="COreports.php" style="color:black;">CO Attainment Table</a>
          <a class="nav-link" href="POreports.php" style="color: black;">PO Attainment Table</a>
          
          

          </nav>
        </div>
      <div class='col-10' style="padding-top:1%; margin-right:auto; margin-top:-8%;"  >
      <form class="needs-validation" method="post" action="" enctype="multipart/form-data" style="margin-left: 2.5%" novalidate> 
      <p style="font-size:large;">Please enter the details for Program Outcome Attainment Table:</p>
        <div class="form-row" style="margin-top: 2%">
          <div class="form-group col-md-4">
          <select name="course" class="form-control custom-select" required >
                            <option value="" disabled selected>Choose Course</option>
                            <?php
                              while($row2 = mysqli_fetch_array($result)){

                                $course= "Subject : ".$row2['sub_name']." ".$row2['subject-code']." Semester : ".$row2['semester']." || Year : ".$row2['year']; 
                                
                            ?>
                            
                            <option><?echo "Subject : ".$row2['sub_name']." ".$row2['subject-code']." Semester : ".$row2['semester']." || Year : ".$row2['year']; ?></option>
                              <?}?>
                          </select>
          </div>
          
        <div class="form-group col-md-3">
          <input type="number" class="form-control" name="int" placeholder="% Weightage for Internal" value=" ">
        </div>
        <div class="form-group col-md-3">
          
        </div>
        <div class="form-group col-md-3">
        <input type="number" class="form-control" name="thresh_per" placeholder="Threshold % Marks Internal" required>
        </div>
        <div class="form-group col-md-3">
          <input type="number" class="form-control" name="thresh_per_ext" placeholder="Threshold % Marks External" required>
        </div>
        
        </div>

        <div class="form-row">
        <div class="form-group col-md-3">
          <input type="number" class="form-control" name="r1" placeholder="Threshold-1 in %(lower)" required>
        </div>
        <div class="form-group col-md-3">
          <input type="number" class="form-control" name="r2" placeholder="Threshold-2 in %" required>
        </div>
        <div class="form-group col-md-3">
          <input type="number" class="form-control" name="r3" placeholder="Threshold-3 in %" required>
        </div><br><br>
        <div class="form-row" style="width:150%;">
        <div style="margin-left:1.5%; margin-right:0%;">
        <button class="btn btn-success" name="add_values" style="width:100%">Add Values</button>
        </div>
        <div style="margin-left:1.5%; margin-right:1.5%;">
        <button class="btn btn-primary" name="view_values" style="width:100%">View Values</button>
        </div style="margin-right:50%;">
        <div>
        <button class="btn btn-danger" name="remove_values" style="width:100%">Remove Values</button>
        </div></div>
          </div>
      </form>
      </div>
      </div> 
      <hr>
      <?php
          if (isset($_POST['add_values'])){
           
          //   if(empty($internal)) {$internal=0.3;$external=0.7;  }
          //   else {$internal=$internal/100;$external=1-$internal;  }
          //  # echo $internal;

            if(empty($_POST['course'])){?>
            <script>  document.getElementsByClassName("form-control custom-select")[0].style.borderColor = "red";</script>
              <?}
          
         else{
            $sub=explode(" ",$_POST['course'])[2];
            $sub_code=explode(" ",$_POST['course'])[3];
            $sem=explode(" ",$_POST['course'])[6];
            $year=explode(" ",$_POST['course'])[10];
            $range1=(int)$_POST['r1'];
            $range2=(int)$_POST['r2'];
            $range3=(int)$_POST['r3'];
            $th_per=(int)$_POST['thresh_per'];
            $th_per_ext=(int)$_POST['thresh_per_ext'];
            $internal=(int)$_POST['int'];
            // $external=(int)$_POST['ext'];
            
            $check_empty="SELECT `Threshold-Marks`, `Threshold-Marks-ext`, `intlevel1`, `intlevel2`, `intlevel3`, `IntWeightage`  FROM `threshold_values`  WHERE `branch`='$branch' and
            `sub`='$sub' and `subject-code`='$sub_code' and `sem`='$sem' and  `year`='$year' ";
            $empty_result= mysqli_query($conn,$check_empty) or die("ERROR".mysqli_error($conn));
            $empty_result2= mysqli_fetch_array($empty_result);     
            if(empty($empty_result2))
            {
              $sub_query3="INSERT INTO `threshold_values`(`branch`, `sub`, `subject-code`, `sem`, `year`,`Threshold-Marks`,`Threshold-Marks-ext`,`intlevel1`,`intlevel2`,`intlevel3`, `IntWeightage`) 
              VALUES ('$branch','$sub','$sub_code','$sem','$year','$th_per','$th_per_ext','$range1','$range2','$range3','$internal')";
              $sub_result3 = mysqli_query($conn,$sub_query3) or die("ERROR".mysqli_error($conn));
              echo'<script>alert("Record added Successfully")</script>';
            }
            else{
              echo '<div class="alert alert-danger" role="alert" style="margin-left: 1%">
              Data Already Exist !!!
            </div>';
            }
            
          }}
      ?>

    <?php

      if(isset($_POST["remove_values"]))
      {

         if(empty($_POST['course'])){?>
          <script>  document.getElementsByClassName("form-control custom-select")[0].style.borderColor = "red";</script>
            <?}

      else{
        if(isset($_POST['course'])){
        $sub=explode(" ",$_POST['course'])[2];
        $sub_code=explode(" ",$_POST['course'])[3];
        $sem=explode(" ",$_POST['course'])[6];
        $year=explode(" ",$_POST['course'])[10];
        
        // $range1=(int)$_POST['r1'];
        // $range2=(int)$_POST['r2'];
        // $range3=(int)$_POST['r3'];
        // $th_per=(int)$_POST['thresh_per'];
        // $internal=(int)$_POST['int'];
        // $external=(int)$_POST['ext'];
     
        $rem_query="SELECT * FROM `threshold_values`  WHERE `branch`='$branch' AND
            `sub`='$sub' and `subject-code`='$sub_code' and `sem`='$sem' and  `year`='$year' ";
        $rem_res= mysqli_query($conn,$rem_query) or die("ERROR".mysqli_error($conn));
            
        $rem = mysqli_fetch_array($rem_res); 
        $sub1 = $rem['sub'];
        $subc = $rem['subject-code'];
        $sem1= $rem['sem'];
        $year1=$rem['year'];

        if(empty($rem)){
          echo '<div class="alert alert-danger" role="alert" style="margin-left: 1%">
          Data DO Not Exist !!!
        </div>';
        }
        else{
        // $sql = "DELETE FROM MyGuests WHERE id=3";
      //  print_r($sub1);
      
        $del_query1 = "DELETE FROM `threshold_values` WHERE  `sub`='$sub1' AND `sem` ='$sem1' AND `subject-code`='$subc' AND `year`='$year1'";
        $del_result1 = mysqli_query($conn,$del_query1) or die("ERROR".mysqli_error($conn));

       
          echo '<script>alert("Values Removed successfully!");
          </script>';
        }}
      }}

    ?>


    <? if(isset($_POST['view_values'])){?>
        <div style="height:50vh; overflow-y: scroll">
        
        <? if(empty($_POST['course'])){?>
      <script>  document.getElementsByClassName("form-control custom-select")[0].style.borderColor = "red";</script>
        <?}
        else{

    
        $sub=explode(" ",$_POST['course'])[2];
        $sub_code=explode(" ",$_POST['course'])[3];
        $sem=explode(" ",$_POST['course'])[6];
        $year=explode(" ",$_POST['course'])[10];
        $search_query="SELECT `Threshold-Marks`, `Threshold-Marks-ext`, `intlevel1`, `intlevel2`, `intlevel3`, `IntWeightage` FROM `threshold_values`  WHERE `branch`='$branch' and
                         `sub`='$sub' and `subject-code`='$sub_code' and `sem`='$sem' and  `year`='$year' ";
        $search_result= mysqli_query($conn,$search_query) or die("ERROR".mysqli_error($conn));
        $search_row = mysqli_fetch_array($search_result);     
        
        if(empty($search_row))
        {
          echo '<div class="alert alert-danger" role="alert" style="margin-left: 1%">
                  Please Add Threshold Values !!!
                </div>';
        }
        else{
        
    ?>
       <table class="table table-striped" style="margin-left: 1%">
                      <thead style="background-color:white;position: sticky; top: 0;">
                        <tr>
                          <th scope="col"> </th>
                          <th scope="col">Values</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <th scope="row">Threshold % Marks</th>
                        <td><?echo $search_row['Threshold-Marks']?></td>
                        </tr>
                        <tr>
                        <th scope="row">Threshold % Marks External</th>
                        <td><?echo $search_row['Threshold-Marks-ext']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Internal Weightage</th>
                          <td><?echo $search_row['IntWeightage']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Level 1</th>
                          <td><?echo $search_row['intlevel1']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Level 2</th>
                          <td><?echo $search_row['intlevel2']?></td>
                        </tr>  
                        <tr>
                        <th scope="row">Level 3</th>
                        <td><?echo $search_row['intlevel3']?></td>
                        </tr>
                                                              
                      </tbody>
                    </table>
                    </div>
                  <?}
                  }}
                  
                  ?>
                  

  

  </div>
  
</body>


</html>