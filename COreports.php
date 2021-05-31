<html>
<?php
// Start the session
session_start();
error_reporting(~E_WARNING & ~E_NOTICE);
$host="localhost";
$user="root";
$pass="";
$db="college_project";
$id = $_SESSION['user_id'];
$desgn=$_SESSION['desgn'];
$conn=new mysqli($host,$user,$pass,$db);
$branch=$_SESSION['branch'];
$query="SELECT DISTINCT * FROM `$branch` WHERE `teacher_id`='$id'";
$result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
if(isset($_POST['can_cred'])){
  header("Location:index.php");            
  session_destroy();
  } 
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Reports</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3857a76116.js" crossorigin="anonymous"></script>
    <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" style="color:black;"data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="images/hi.png"/>&nbsp;&nbsp;<?php echo '<strong>'.$_SESSION["f_name"].' '.$_SESSION["s_name"].'</strong>'?><span class="d-none d-lg-inline mr-2 text-gray-600 small"></span></a>
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
    <a class="nav-link active" href="reports.php" style="color:black;">Subject Analysis</a>
          <a class="nav-link" href="values.php" style="color:black;">Threshold Values</a>
          <a class="nav-link" href="#" style="color:#007bff;font-weight: bold;">CO Attainment Table</a>
          <a class="nav-link" href="POreports.php" style="color: black;">PO Attainment Table</a>
          
    </nav>
  </div>
  <div class='col-10' style="padding-top:1%; margin-right:auto; margin-top:-8%;" >
    <form class="needs-validation" method="post" action="" enctype="multipart/form-data" style="margin-left: 2.5%" novalidate> 
    <p style="font-size:large;">Please enter the details for Couse Outcome Attainment Table:</p>
      <div class="form-row" style="margin-top: 2%">
        <div class="form-group col-md-3">
        <select name="course" class="form-control custom-select" required>
                          <option value="" disabled selected>Choose Course</option>
                          <?php
                            while($row2 = mysqli_fetch_array($result)){
                          ?>
                          <option><?echo "Subject : ".$row2['sub_name']." ".$row2['subject-code']." Semester : ".$row2['semester']." || Year : ".$row2['year']; ?></option>
                            <?}?>
                        </select>
        </div>
        <div class="form-group col-md-3">
        <select name="format" class="form-control custom-select" required>
                          <option value="" disabled selected>Choose Exam Format</option>
                          <option>All</option>
                          <!-- <option>Unit Test-1</option>
                          <option>Unit Test-2</option>
                          <option>Unit Test-1&2</option> -->
                        </select>
        </div>
        <div class="form-group col-md-3" >
        <button class="btn btn-primary" name="import" style="width:100%">Show Analysis</button>
        </div>
        
        </div>
 
    </form>
  </div>
</div> 
<hr>
<?php
if(isset($_POST["import"])){

  // $Threshold_Marks=0;
  $internal=0;
  $intlv1=0;
  $intlv3=0;
  $intlv3=0;
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];

  $fetch_query = "SELECT * FROM `threshold_values` WHERE `sub`='$sub' AND `subject-code`='$sub_code'";
  $fetch_values = mysqli_query($conn,$fetch_query) or die("ERROR".mysqli_error($conn));
  $fetch_array= mysqli_fetch_array($fetch_values);
  $th_per=$fetch_array['Threshold-Marks'];
  $th_per_ext=$fetch_array['Threshold-Marks-ext'];
  $internal=$fetch_array['IntWeightage'];
  $intlv1=$fetch_array['intlevel1'];
  $intlv2=$fetch_array['intlevel2'];
  $intlv3=$fetch_array['intlevel3'];
   

  #print_r($th_per);

  if(empty($internal)) {$internal=0.3;$external=0.7;  }
  else {$internal=$internal/100;$external=1-$internal;  }
  #echo $external.$internal;
  // $range1=(int)$_POST['r1'];
  // $range2=(int)$_POST['r2'];
  // $range3=(int)$_POST['r3'];
  // $th_per=(int)$_POST['thresh_per'];
  $selection=$_POST['format'];
  $sem_data=array();
  $oral_data=array();
  $tw_data=array();
  $student_no_data=array();
  $per_student_no=array();
  $att_level=array();
  $mark_co=array();
  ###############
  $co1=array();
  $co2=array();
  $co3=array();
  $co4=array();
  $co5=array();
  $co6=array();
  ###############
  $data_1a=0;
  $data_1b=0;
  $data_1c=0;
  $data_1d=0;
  $data_1e=0;
  $data_1f=0;
  $data_2a=0;
  $data_2b=0;
  $data_3a=0;
  $data_3b=0;
  ###############
  $data2_1a=0;
  $data2_1b=0;
  $data2_1c=0;
  $data2_1d=0;
  $data2_1e=0;
  $data2_1f=0;
  $data2_2a=0;
  $data2_2b=0;
  $data2_3a=0;
  $data2_3b=0;
  ###############
 
  $sem_count=0;
  $oral_count=0;
  $tw_count=0;
  $student_count=0;

  
  if($selection=="All")
  {
    $sem_query="SELECT * FROM `sem_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $sem_result = mysqli_query($conn,$sem_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($sem_result)){
      array_push($sem_data,$row['tee']);
      if((int)$row['tee']>= $th_per_ext*80/100){
        $sem_count=$sem_count+1;
      }
      $student_count=$student_count+1;
    }
    
    #print_r($sem_count);
    $oral_query="SELECT * FROM `oral_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $oral_result = mysqli_query($conn,$oral_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($oral_result)){
      array_push($oral_data,$row['ques']);
      if((int)$row['ques']>=$th_per*25/100){
        $oral_count=$oral_count+1;
      }
    }
    #print_r($oral_data);
    $tw_query="SELECT * FROM `tw_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $tw_result = mysqli_query($conn,$tw_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($tw_result)){
      array_push($tw_data,$row['ques']);
      if((int)$row['ques']>=$th_per*25/100){
        $tw_count=$tw_count+1;
      }
    }
    #print_r($tw_data);
    if($sem_count>$intlv3*$student_count/100){$sem_att=3;}
    else if($sem_count<=$intlv3*$student_count/100 and $sem_count>$intlv2*$student_count/100){$sem_att=2;}
    else if($sem_count<=$intlv2*$student_count/100 and $sem_count>$intlv1*$student_count/100){$sem_att=1;}

    if($tw_count>$intlv3*$student_count/100){$tw_att=3;}
    else if($tw_count<=$intlv3*$student_count/100 and $tw_count>$intlv2*$student_count/100){$tw_att=2;}
    else if($tw_count<=$intlv2*$student_count/100 and $tw_count>$intlv1*$student_count/100){$tw_att=1;}

    if($oral_count>$intlv3*$student_count/100){$oral_att=3;}
    else if($oral_count<=$intlv3*$student_count/100 and $oral_count>$intlv2*$student_count/100){$oral_att=2;}
    else if($oral_count<=$intlv2*$student_count/100 and $oral_count>$intlv1*$student_count/100){$oral_att=1;}

    #echo $oral_att.$sem_att.$tw_att;
    $ut_query="SELECT * FROM `ut_data` WHERE  `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $ut_result = mysqli_query($conn,$ut_query) or die("ERROR".mysqli_error($conn));
    
    $count_query1a = "SELECT COUNT(*) FROM `ut_data` WHERE (`1a` IS NULL OR `1a` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1a= mysqli_query($conn,$count_query1a) or die("ERROR".mysqli_error($conn));
    $cr1a = mysqli_fetch_array($count_res1a);

    $count_query1b = "SELECT COUNT(*) FROM `ut_data` WHERE (`1b` IS NULL OR `1b` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1b= mysqli_query($conn,$count_query1b) or die("ERROR".mysqli_error($conn));
    $cr1b = mysqli_fetch_array($count_res1b);

    $count_query1c = "SELECT COUNT(*) FROM `ut_data` WHERE (`1c` IS NULL OR `1c` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1c= mysqli_query($conn,$count_query1c) or die("ERROR".mysqli_error($conn));
    $cr1c = mysqli_fetch_array($count_res1c);

    $count_query1d = "SELECT COUNT(*) FROM `ut_data` WHERE (`1d` IS NULL OR `1d` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1d= mysqli_query($conn,$count_query1d) or die("ERROR".mysqli_error($conn));
    $cr1d = mysqli_fetch_array($count_res1d);

    $count_query1e = "SELECT COUNT(*) FROM `ut_data` WHERE (`1e` IS NULL OR `1e` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1e= mysqli_query($conn,$count_query1e) or die("ERROR".mysqli_error($conn));
    $cr1e = mysqli_fetch_array($count_res1e);

    $count_query1f = "SELECT COUNT(*) FROM `ut_data` WHERE (`1f` IS NULL OR `1f` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1f= mysqli_query($conn,$count_query1f) or die("ERROR".mysqli_error($conn));
    $cr1f = mysqli_fetch_array($count_res1f);

    $count_query2a = "SELECT COUNT(*) FROM `ut_data` WHERE (`2a` IS NULL OR `2a` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res2a= mysqli_query($conn,$count_query2a) or die("ERROR".mysqli_error($conn));
    $cr2a = mysqli_fetch_array($count_res2a);

    $count_query2b = "SELECT COUNT(*) FROM `ut_data` WHERE (`2b` IS NULL OR `2b` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res2b= mysqli_query($conn,$count_query2b) or die("ERROR".mysqli_error($conn));
    $cr2b = mysqli_fetch_array($count_res2b);

    $count_query3a = "SELECT COUNT(*) FROM `ut_data` WHERE (`3a` IS NULL OR `3a` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res3a= mysqli_query($conn,$count_query3a) or die("ERROR".mysqli_error($conn));
    $cr3a = mysqli_fetch_array($count_res3a);

    $count_query3b = "SELECT COUNT(*) FROM `ut_data` WHERE (`3b` IS NULL OR `3b` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res3b= mysqli_query($conn,$count_query3b) or die("ERROR".mysqli_error($conn));
    $cr3b = mysqli_fetch_array($count_res3b);
    
   
    while($row = mysqli_fetch_array($ut_result)){
      if((float)$row['1a']>=2*$th_per/100){         $data_1a=$data_1a+1;      }
      if((float)$row['1b']>=2*$th_per/100){         $data_1b=$data_1b+1;      }
      if((float)$row['1c']>=2*$th_per/100){         $data_1c=$data_1c+1;      }
      if((float)$row['1d']>=2*$th_per/100){         $data_1d=$data_1d+1;      }
      if((float)$row['1e']>=2*$th_per/100){         $data_1e=$data_1e+1;      }
      if((float)$row['1f']>=2*$th_per/100){         $data_1f=$data_1f+1;      }
      if((float)$row['2a']>=5*$th_per/100){         $data_2a=$data_2a+1;      }
      if((float)$row['2b']>=5*$th_per/100){         $data_2b=$data_2b+1;      }
      if((float)$row['3a']>=5*$th_per/100){         $data_3a=$data_3a+1;      }
      if((float)$row['3b']>=5*$th_per/100){         $data_3b=$data_3b+1;      }
    }

    $ut_query2="SELECT * FROM `ut2_data` WHERE  `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $ut_result2 = mysqli_query($conn,$ut_query2) or die("ERROR".mysqli_error($conn));

    $count_query1a = "SELECT COUNT(*) FROM `ut2_data` WHERE (`1a` IS NULL OR `1a` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1a= mysqli_query($conn,$count_query1a) or die("ERROR".mysqli_error($conn));
    $cr1a2 = mysqli_fetch_array($count_res1a);
    #print_r($cr1a);

    $count_query1b = "SELECT COUNT(*) FROM `ut2_data` WHERE (`1b` IS NULL OR `1b` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1b= mysqli_query($conn,$count_query1b) or die("ERROR".mysqli_error($conn));
    $cr1b2 = mysqli_fetch_array($count_res1b);

    $count_query1c = "SELECT COUNT(*) FROM `ut2_data` WHERE (`1c` IS NULL OR `1c` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1c= mysqli_query($conn,$count_query1c) or die("ERROR".mysqli_error($conn));
    $cr1c2 = mysqli_fetch_array($count_res1c);

    $count_query1d = "SELECT COUNT(*) FROM `ut2_data` WHERE (`1d` IS NULL OR `1d` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1d= mysqli_query($conn,$count_query1d) or die("ERROR".mysqli_error($conn));
    $cr1d2 = mysqli_fetch_array($count_res1d);

    $count_query1e = "SELECT COUNT(*) FROM `ut2_data` WHERE (`1e` IS NULL OR `1e` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1e= mysqli_query($conn,$count_query1e) or die("ERROR".mysqli_error($conn));
    $cr1e2 = mysqli_fetch_array($count_res1e);

    $count_query1f = "SELECT COUNT(*) FROM `ut2_data` WHERE (`1f` IS NULL OR `1f` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res1f= mysqli_query($conn,$count_query1f) or die("ERROR".mysqli_error($conn));
    $cr1f2 = mysqli_fetch_array($count_res1f);

    $count_query2a = "SELECT COUNT(*) FROM `ut2_data` WHERE (`2a` IS NULL OR `2a` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res2a= mysqli_query($conn,$count_query2a) or die("ERROR".mysqli_error($conn));
    $cr2a2 = mysqli_fetch_array($count_res2a);

    $count_query2b = "SELECT COUNT(*) FROM `ut2_data` WHERE (`2b` IS NULL OR `2b` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res2b= mysqli_query($conn,$count_query2b) or die("ERROR".mysqli_error($conn));
    $cr2b2 = mysqli_fetch_array($count_res2b);

    $count_query3a = "SELECT COUNT(*) FROM `ut2_data` WHERE (`3a` IS NULL OR `3a` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res3a= mysqli_query($conn,$count_query3a) or die("ERROR".mysqli_error($conn));
    $cr3a2 = mysqli_fetch_array($count_res3a);

    $count_query3b = "SELECT COUNT(*) FROM `ut2_data` WHERE (`3b` IS NULL OR `3b` = '') AND `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $count_res3b= mysqli_query($conn,$count_query3b) or die("ERROR".mysqli_error($conn));
    $cr3b2 = mysqli_fetch_array($count_res3b);

    while($row2 = mysqli_fetch_array($ut_result2)){
      if((float)$row2['1a']>=2*$th_per/100){         $data2_1a=$data2_1a+1;      }
      if((float)$row2['1b']>=2*$th_per/100){         $data2_1b=$data2_1b+1;      }
      if((float)$row2['1c']>=2*$th_per/100){         $data2_1c=$data2_1c+1;      }
      if((float)$row2['1d']>=2*$th_per/100){         $data2_1d=$data2_1d+1;      }
      if((float)$row2['1e']>=2*$th_per/100){         $data2_1e=$data2_1e+1;      }
      if((float)$row2['1f']>=2*$th_per/100){         $data2_1f=$data2_1f+1;      }
      if((float)$row2['2a']>=5*$th_per/100){         $data2_2a=$data2_2a+1;      }
      if((float)$row2['2b']>=5*$th_per/100){         $data2_2b=$data2_2b+1;      }
      if((float)$row2['3a']>=5*$th_per/100){         $data2_3a=$data2_3a+1;      }
      if((float)$row2['3b']>=5*$th_per/100){         $data2_3b=$data2_3b+1;      }
    }
    
    array_push($student_no_data,$data_1a,$data_1b,$data_1c,$data_1d,$data_1e,
              $data_1f,$data_2a,$data_2b,$data_3a,$data_3b,$data2_1a,$data2_1b,$data2_1c,$data2_1d,$data2_1e,
              $data2_1f,$data2_2a,$data2_2b,$data2_3a,$data2_3b);
    #print_r($student_no_data);
     
    $c1a=((float)$data_1a*100/($student_count-$cr1a[0]));
    $c1b=((float)$data_1b*100/($student_count-$cr1b[0]));
    $c1c=((float)$data_1c*100/($student_count-$cr1c[0]));
    $c1d=((float)$data_1d*100/($student_count-$cr1d[0]));
    $c1e=((float)$data_1e*100/($student_count-$cr1e[0]));
    $c1f=((float)$data_1f*100/($student_count-$cr1f[0]));
    $c2a=((float)$data_2a*100/($student_count-$cr2a[0]));
    $c2b=((float)$data_2b*100/($student_count-$cr2b[0]));
    $c3a=((float)$data_3a*100/($student_count-$cr3a[0]));
    $c3b=((float)$data_3b*100/($student_count-$cr3b[0]));

    $c1a2=((float)$data2_1a*100/($student_count-$cr1a2[0]));
    $c1b2=((float)$data2_1b*100/($student_count-$cr1b2[0]));
    $c1c2=((float)$data2_1c*100/($student_count-$cr1c2[0]));
    $c1d2=((float)$data2_1d*100/($student_count-$cr1d2[0]));
    $c1e2=((float)$data2_1e*100/($student_count-$cr1e2[0]));
    $c1f2=((float)$data2_1f*100/($student_count-$cr1f2[0]));
    $c2a2=((float)$data2_2a*100/($student_count-$cr2a2[0]));
    $c2b2=((float)$data2_2b*100/($student_count-$cr2b2[0]));
    $c3a2=((float)$data2_3a*100/($student_count-$cr3a2[0]));
    $c3b2=((float)$data2_3b*100/($student_count-$cr3b2[0]));
 
 
    #print_r($data2_3b);

    array_push($per_student_no,$c1a,$c1b,$c1c,$c1d,$c1e,$c1f,$c2a,$c2b,$c3a,$c3b,
                                                                      $c1a2,$c1b2,$c1c2,$c1d2,$c1e2,$c1f2,$c2a2,$c2b2,$c3a2,$c3b2); 
    #print_r($student_count);
    #print_r($per_student_no);
    foreach ($per_student_no as $value){
    if($value>$intlv3){ array_push($att_level,3);}
    else if($value>$intlv2 and $value<=$intlv3){array_push($att_level,2);}
    else if($value>$intlv1 and $value<=$intlv2){array_push($att_level,1);}
    else {array_push($att_level,0);}
    }
    #print_r($att_level);
    $co_query="SELECT * FROM `ut_co_marks` WHERE `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $co_result = mysqli_query($conn,$co_query) or die("ERROR".mysqli_error($conn));
    $co_row = mysqli_fetch_array($co_result);

    $co_query2="SELECT * FROM `ut2_co_marks` WHERE `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $co_result2 = mysqli_query($conn,$co_query2) or die("ERROR".mysqli_error($conn));
    $co_row2 = mysqli_fetch_array($co_result2);
    array_push($mark_co,$co_row['1a'],$co_row['1b'],$co_row['1c'],$co_row['1d'],$co_row['1e'],
                        $co_row['1f'],$co_row['2a'],$co_row['2b'],$co_row['3a'],$co_row['3b'],
                        $co_row2['1a'],$co_row2['1b'],$co_row2['1c'],$co_row2['1d'],$co_row2['1e'],
                        $co_row2['1f'],$co_row2['2a'],$co_row2['2b'],$co_row2['3a'],$co_row2['3b']);
    #print_r($mark_co);
    $index=0;
    foreach($mark_co as $map){
      if($map==1){
        array_push($co1,$att_level[$index]);
      }
      else if($map==2){
        array_push($co2,$att_level[$index]);
      }
      else if($map==3){
        array_push($co3,$att_level[$index]);
      }
      else if($map==4){
        array_push($co4,$att_level[$index]);
      }
      else if($map==5){
        array_push($co5,$att_level[$index]);
      }
      else if($map==6){
        array_push($co6,$att_level[$index]);
      }
      $index=$index+1;
    }
    if(count($co1)!=0){$var1=array_sum($co1)/count($co1);}else{$var1=0;}
    if(count($co2)!=0){$var2=array_sum($co2)/count($co2);}else{$var2=0;}
    if(count($co3)!=0){$var3=array_sum($co3)/count($co3);}else{$var3=0;}
    if(count($co4)!=0){$var4=array_sum($co4)/count($co4);}else{$var4=0;}
    if(count($co5)!=0){$var5=array_sum($co5)/count($co5);}else{$var5=0;}
    if(count($co6)!=0){$var6=array_sum($co6)/count($co6);}else{$var6=0;}

    $buf=(100-(100*$internal));
    $temp2= ($buf/100);
    // ($internal*((float)$var1+(float)$tw_att)/2)+
    $ext_var1=((float)$sem_att);
    $ext_var2=((float)$sem_att);
    $ext_var3=((float)$sem_att);
    $ext_var4=((float)$sem_att);
    $ext_var5=((float)$sem_att);
    $ext_var6=((float)$sem_att);
    $var1_over_att=round((($var1*$internal)+($ext_var1*$temp2)),2);
    $var2_over_att=round((($var2*$internal)+($ext_var2*$temp2)),2);
    $var3_over_att=round((($var3*$internal)+($ext_var3*$temp2)),2);
    $var4_over_att=round((($var4*$internal)+($ext_var4*$temp2)),2);
    $var5_over_att=round((($var5*$internal)+($ext_var5*$temp2)),2);
    $var6_over_att=round((($var6*$internal)+($ext_var6*$temp2)),2);
    
    $int_array=array($var1,$var2,$var3,$var4,$var5,$var6);
    $ext_array=array($ext_var1,$ext_var2,$ext_var3,$ext_var4,$ext_var5,$ext_var6);
    $att_array=array($var1_over_att,$var2_over_att,$var3_over_att,$var4_over_att,$var5_over_att,$var6_over_att);
    $total = array();
    array_push($total,$int_array,$ext_array,$att_array);

    echo "<script> window.onload = function() {graph()} </script>";  ?>
    <div class="row" style="margin-left: 1%; margin-right:1%">
      <div class="col-6" style="border-right: 1px solid rgba(0,0,0,0.2);">
      <table class="table table-striped" style="margin-top: 2%" id="tableCO">
        <thead>
          <tr>
            <th scope="col">CO Code</th>
            <th scope="col">Internal</th>
            <th scope="col">External</th>
            <th scope="col">Overall Attainment</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">CO1</th>
            <td><?echo round($var1,2);?></td>
            <td><?echo round($ext_var1,2);?></td>
            <td><?echo round($var1_over_att,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO2</th>
            <td><?echo round($var2,2);?></td>
            <td><?echo round($ext_var2,2);?></td>
            <td><?echo round($var2_over_att,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO3</th>
            <td><?echo round($var3,2);?></td>
            <td><?echo round($ext_var3,2);?></td>
            <td><?echo round($var3_over_att,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO4</th>
            <td><?echo round($var4,2);?></td>
            <td><?echo round($ext_var4,2);?></td>
            <td><?echo round($var4_over_att,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO5</th>
            <td><?echo round($var5,2);?></td>
            <td><?echo round($ext_var5,2);?></td>
            <td><?echo round($var5_over_att,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO6</th>
            <td><?echo round($var6,2);?></td>
            <td><?echo round($ext_var6,2);?></td>
            <td><?echo round($var6_over_att,2);?></td>
          </tr>
        </tbody>
      </table>
     
      </div>
      <div class="col-6">
        <canvas id="Chart1" width="100%" height="60vh" style="margin-right: 3%"></canvas>
        <div style="margin-left: 15%;">
      <!-- <button onclick="exportData()" class="btn btn-warning" style="width: 40%; margin-left: 3%;">Download CSV <i class="fa fa-download"></i></button>
      <button class="btn btn-info" onclick="exportData1()" style="width: 40%; margin-right: 5%;">Upload Data <i class="fa fa-upload"></i></button> --></div>
      </div>
      <button onclick="exportData()" class="btn btn-warning" style="width: 20%; height: 20%; margin-left: 5%;">Download CSV <i class="fa fa-download"></i></button>&nbsp; &nbsp;
      <button class="btn btn-info" onclick="exportData1()" style="width: 20%;height: 20%; margin-right: 5%;">Upload Data <i class="fa fa-upload"></i></button>
    </div>  

    <? 
  }
  elseif($selection=="Unit Test-1")
  {
    $ut_query="SELECT * FROM `ut_data` WHERE  `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $ut_result = mysqli_query($conn,$ut_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($ut_result)){
      if((int)$row['1a']>2*$th_per/100){         $data_1a=$data_1a+1;      }
      if((int)$row['1b']>2*$th_per/100){         $data_1b=$data_1b+1;      }
      if((int)$row['1c']>2*$th_per/100){         $data_1c=$data_1c+1;      }
      if((int)$row['1d']>2*$th_per/100){         $data_1d=$data_1d+1;      }
      if((int)$row['1e']>2*$th_per/100){         $data_1e=$data_1e+1;      }
      if((int)$row['1f']>2*$th_per/100){         $data_1f=$data_1f+1;      }
      if((int)$row['2a']>5*$th_per/100){         $data_2a=$data_2a+1;      }
      if((int)$row['2b']>5*$th_per/100){         $data_2b=$data_2b+1;      }
      if((int)$row['3a']>5*$th_per/100){         $data_3a=$data_3a+1;      }
      if((int)$row['3b']>5*$th_per/100){         $data_3b=$data_3b+1;      }
      $student_count=$student_count+1;
    }
    array_push($student_no_data,$data_1a,$data_1b,$data_1c,$data_1d,$data_1e,
              $data_1f,$data_2a,$data_2b,$data_3a,$data_3b);
    #print_r($student_no_data);

    foreach ($student_no_data as $value) {array_push($per_student_no,(int)$value*100/$student_count); }  
    #print_r($per_student_no);
    foreach ($per_student_no as $value){
    if($value>$intlv3){ array_push($att_level,3);}
    else if($value>$intlv2 and $value<=$intlv3){array_push($att_level,2);}
    else if($value>$intlv1 and $value<=$intlv2){array_push($att_level,1);}
    else {array_push($att_level,0);}
    }
    $co_query="SELECT * FROM `ut_co_marks` WHERE `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $co_result = mysqli_query($conn,$co_query) or die("ERROR".mysqli_error($conn));
    $co_row = mysqli_fetch_array($co_result);
    array_push($mark_co,$co_row['1a'],$co_row['1b'],$co_row['1c'],$co_row['1d'],$co_row['1e'],
                        $co_row['1f'],$co_row['2a'],$co_row['2b'],$co_row['3a'],$co_row['3b']);
    #print_r($mark_co);
    $index=0;
    foreach($mark_co as $map){
      if($map==1){
        array_push($co1,$att_level[$index]);
      }
      else if($map==2){
        array_push($co2,$att_level[$index]);
      }
      else if($map==3){
        array_push($co3,$att_level[$index]);
      }
      else if($map==4){
        array_push($co4,$att_level[$index]);
      }
      else if($map==5){
        array_push($co5,$att_level[$index]);
      }
      else if($map==6){
        array_push($co6,$att_level[$index]);
      }
      $index=$index+1;
    }
    if(count($co1)!=0){$var1=array_sum($co1)/count($co1);}else{$var1=0;}
    if(count($co2)!=0){$var2=array_sum($co2)/count($co2);}else{$var2=0;}
    if(count($co3)!=0){$var3=array_sum($co3)/count($co3);}else{$var3=0;}
    if(count($co4)!=0){$var4=array_sum($co4)/count($co4);}else{$var4=0;}
    if(count($co5)!=0){$var5=array_sum($co5)/count($co5);}else{$var5=0;}
    if(count($co6)!=0){$var6=array_sum($co6)/count($co6);}else{$var6=0;}
    $int_array=array($var1,$var2,$var3,$var4,$var5,$var6);
    
    ?>
    <div class="row" style="margin-left: 1%; margin-right:1%">
      <div class="col-6" style="border-right: 1px solid rgba(0,0,0,0.2);">
      <table class="table table-striped" style="margin-top: 5%">
        <thead>
          <tr>
            <th scope="col">CO Code</th>
            <th scope="col">Internal || Unit Test-1 </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">CO1</th>
            <td><?echo round($var1,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO2</th>
            <td><?echo round($var2,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO3</th>
            <td><?echo round($var3,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO4</th>
            <td><?echo round($var4,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO5</th>
            <td><?echo round($var5,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO6</th>
            <td><?echo round($var6,2);?></td>
          </tr>
        </tbody>
      </table>
      
      </div>
      <div class="col-6">
        <canvas id="Chart2" width="100%" height="60vh" style="margin-right: 3%"></canvas>
      </div>
    </div> 
    <?php
    echo "<script> window.onload = function() {graph2()} </script>";  
  }
  elseif($selection=="Unit Test-2")
  {
    $ut_query="SELECT * FROM `ut2_data` WHERE  `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $ut_result = mysqli_query($conn,$ut_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($ut_result)){
      if((int)$row['1a']>2*$th_per/100){         $data_1a=$data_1a+1;      }
      if((int)$row['1b']>2*$th_per/100){         $data_1b=$data_1b+1;      }
      if((int)$row['1c']>2*$th_per/100){         $data_1c=$data_1c+1;      }
      if((int)$row['1d']>2*$th_per/100){         $data_1d=$data_1d+1;      }
      if((int)$row['1e']>2*$th_per/100){         $data_1e=$data_1e+1;      }
      if((int)$row['1f']>2*$th_per/100){         $data_1f=$data_1f+1;      }
      if((int)$row['2a']>5*$th_per/100){         $data_2a=$data_2a+1;      }
      if((int)$row['2b']>5*$th_per/100){         $data_2b=$data_2b+1;      }
      if((int)$row['3a']>5*$th_per/100){         $data_3a=$data_3a+1;      }
      if((int)$row['3b']>5*$th_per/100){         $data_3b=$data_3b+1;      }
      $student_count=$student_count+1;
    }
    array_push($student_no_data,$data_1a,$data_1b,$data_1c,$data_1d,$data_1e,
              $data_1f,$data_2a,$data_2b,$data_3a,$data_3b);
    #print_r($student_no_data);

    foreach ($student_no_data as $value) {array_push($per_student_no,(int)$value*100/$student_count); }  
    #print_r($per_student_no);
    foreach ($per_student_no as $value){
    if($value>$intlv3){ array_push($att_level,3);}
    else if($value>$intlv2 and $value<=$intlv3){array_push($att_level,2);}
    else if($value>$intlv1 and $value<=$intlv2){array_push($att_level,1);}
    else {array_push($att_level,0);}
    }
    $co_query="SELECT * FROM `ut2_co_marks` WHERE `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $co_result = mysqli_query($conn,$co_query) or die("ERROR".mysqli_error($conn));
    $co_row = mysqli_fetch_array($co_result);
    array_push($mark_co,$co_row['1a'],$co_row['1b'],$co_row['1c'],$co_row['1d'],$co_row['1e'],
                        $co_row['1f'],$co_row['2a'],$co_row['2b'],$co_row['3a'],$co_row['3b']);
    #print_r($mark_co);
    $index=0;
    foreach($mark_co as $map){
      if($map==1){
        array_push($co1,$att_level[$index]);
      }
      else if($map==2){
        array_push($co2,$att_level[$index]);
      }
      else if($map==3){
        array_push($co3,$att_level[$index]);
      }
      else if($map==4){
        array_push($co4,$att_level[$index]);
      }
      else if($map==5){
        array_push($co5,$att_level[$index]);
      }
      else if($map==6){
        array_push($co6,$att_level[$index]);
      }
      $index=$index+1;
    }
    if(count($co1)!=0){$var1=array_sum($co1)/count($co1);}else{$var1=0;}
    if(count($co2)!=0){$var2=array_sum($co2)/count($co2);}else{$var2=0;}
    if(count($co3)!=0){$var3=array_sum($co3)/count($co3);}else{$var3=0;}
    if(count($co4)!=0){$var4=array_sum($co4)/count($co4);}else{$var4=0;}
    if(count($co5)!=0){$var5=array_sum($co5)/count($co5);}else{$var5=0;}
    if(count($co6)!=0){$var6=array_sum($co6)/count($co6);}else{$var6=0;}
    $int_array=array($var1,$var2,$var3,$var4,$var5,$var6);
    #echo array_sum($co1);
    ?>
    <div class="row" style="margin-left: 1%; margin-right:1%;">
      <div class="col-6" style="border-right: 1px solid rgba(0,0,0,0.2);">
      <table class="table table-striped" style="margin-top: 2%;">
        <thead>
          <tr>
            <th scope="col">CO Code</th>
            <th scope="col">Internal || Unit Test-2 </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">CO1</th>
            <td><?echo round($var1,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO2</th>
            <td><?echo round($var2,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO3</th>
            <td><?echo round($var3,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO4</th>
            <td><?echo round($var4,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO5</th>
            <td><?echo round($var5,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO6</th>
            <td><?echo round($var6,2);?></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="col-6">
        <canvas id="Chart2" width="100%" height="60vh" style="margin-right: 3%"></canvas>
      </div>
    </div> 
    <?php
    echo "<script> window.onload = function() {graph2()} </script>"; 
  }
  elseif($selection=="Unit Test-1&2")
  {
    $ut_query="SELECT * FROM `ut_data` WHERE  `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $ut_result = mysqli_query($conn,$ut_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($ut_result)){
      if((int)$row['1a']>2*$th_per/100){         $data_1a=$data_1a+1;      }
      if((int)$row['1b']>2*$th_per/100){         $data_1b=$data_1b+1;      }
      if((int)$row['1c']>2*$th_per/100){         $data_1c=$data_1c+1;      }
      if((int)$row['1d']>2*$th_per/100){         $data_1d=$data_1d+1;      }
      if((int)$row['1e']>2*$th_per/100){         $data_1e=$data_1e+1;      }
      if((int)$row['1f']>2*$th_per/100){         $data_1f=$data_1f+1;      }
      if((int)$row['2a']>5*$th_per/100){         $data_2a=$data_2a+1;      }
      if((int)$row['2b']>5*$th_per/100){         $data_2b=$data_2b+1;      }
      if((int)$row['3a']>5*$th_per/100){         $data_3a=$data_3a+1;      }
      if((int)$row['3b']>5*$th_per/100){         $data_3b=$data_3b+1;      }
      $student_count=$student_count+1;
    }
    array_push($student_no_data,$data_1a,$data_1b,$data_1c,$data_1d,$data_1e,
              $data_1f,$data_2a,$data_2b,$data_3a,$data_3b);
    #print_r($student_no_data);

    foreach ($student_no_data as $value) {array_push($per_student_no,(int)$value*100/$student_count); }  
    #print_r($per_student_no);
    foreach ($per_student_no as $value){
    if($value>$intlv3){ array_push($att_level,3);}
    else if($value>$intlv2 and $value<=$intlv3){array_push($att_level,2);}
    else if($value>$intlv1 and $value<=$intlv2){array_push($att_level,1);}
    else {array_push($att_level,0);}
    }
    $co_query="SELECT * FROM `ut_co_marks` WHERE `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $co_result = mysqli_query($conn,$co_query) or die("ERROR".mysqli_error($conn));
    $co_row = mysqli_fetch_array($co_result);
    array_push($mark_co,$co_row['1a'],$co_row['1b'],$co_row['1c'],$co_row['1d'],$co_row['1e'],
                        $co_row['1f'],$co_row['2a'],$co_row['2b'],$co_row['3a'],$co_row['3b']);
    #print_r($mark_co);
    $index=0;
    foreach($mark_co as $map){
      if($map==1){
        array_push($co1,$att_level[$index]);
      }
      else if($map==2){
        array_push($co2,$att_level[$index]);
      }
      else if($map==3){
        array_push($co3,$att_level[$index]);
      }
      else if($map==4){
        array_push($co4,$att_level[$index]);
      }
      else if($map==5){
        array_push($co5,$att_level[$index]);
      }
      else if($map==6){
        array_push($co6,$att_level[$index]);
      }
      $index=$index+1;
    }
    if(count($co1)!=0){$var1_1=array_sum($co1)/count($co1);}else{$var1_1=0;}
    if(count($co2)!=0){$var2_1=array_sum($co2)/count($co2);}else{$var2_1=0;}
    if(count($co3)!=0){$var3_1=array_sum($co3)/count($co3);}else{$var3_1=0;}
    if(count($co4)!=0){$var4_1=array_sum($co4)/count($co4);}else{$var4_1=0;}
    if(count($co5)!=0){$var5_1=array_sum($co5)/count($co5);}else{$var5_1=0;}
    if(count($co6)!=0){$var6_1=array_sum($co6)/count($co6);}else{$var6_1=0;}
    $int_array_1=array($var1_1,$var2_1,$var3_1,$var4_1,$var5_1,$var6_1);
    !!!!!!!!!!!!!!!!!!!!!

    $student_no_data=array();
    $data_1a=0;
    $data_1b=0;
    $data_1c=0;
    $data_1d=0;
    $data_1e=0;
    $data_1f=0;
    $data_2a=0;
    $data_2b=0;
    $data_3a=0;
    $data_3b=0;
    $per_student_no=array();
    $att_level=array();
    $mark_co=array();
    $ut_query="SELECT * FROM `ut2_data` WHERE  `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $ut_result = mysqli_query($conn,$ut_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($ut_result)){
      if((int)$row['1a']>2*$th_per/100){         $data_1a=$data_1a+1;      }
      if((int)$row['1b']>2*$th_per/100){         $data_1b=$data_1b+1;      }
      if((int)$row['1c']>2*$th_per/100){         $data_1c=$data_1c+1;      }
      if((int)$row['1d']>2*$th_per/100){         $data_1d=$data_1d+1;      }
      if((int)$row['1e']>2*$th_per/100){         $data_1e=$data_1e+1;      }
      if((int)$row['1f']>2*$th_per/100){         $data_1f=$data_1f+1;      }
      if((int)$row['2a']>5*$th_per/100){         $data_2a=$data_2a+1;      }
      if((int)$row['2b']>5*$th_per/100){         $data_2b=$data_2b+1;      }
      if((int)$row['3a']>5*$th_per/100){         $data_3a=$data_3a+1;      }
      if((int)$row['3b']>5*$th_per/100){         $data_3b=$data_3b+1;      }
    }
    array_push($student_no_data,$data_1a,$data_1b,$data_1c,$data_1d,$data_1e,
              $data_1f,$data_2a,$data_2b,$data_3a,$data_3b);
    #print_r($student_no_data);

    foreach ($student_no_data as $value) {array_push($per_student_no,(int)$value*100/$student_count); }  
    #print_r($per_student_no);
    foreach ($per_student_no as $value){
    if($value>$intlv3){ array_push($att_level,3);}
    else if($value>$intlv2 and $value<=$intlv3){array_push($att_level,2);}
    else if($value>$intlv1 and $value<=$intlv2){array_push($att_level,1);}
    else {array_push($att_level,0);}
    }
    $co_query="SELECT * FROM `ut2_co_marks` WHERE `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $co_result = mysqli_query($conn,$co_query) or die("ERROR".mysqli_error($conn));
    $co_row = mysqli_fetch_array($co_result);
    array_push($mark_co,$co_row['1a'],$co_row['1b'],$co_row['1c'],$co_row['1d'],$co_row['1e'],
                        $co_row['1f'],$co_row['2a'],$co_row['2b'],$co_row['3a'],$co_row['3b']);
    #print_r($mark_co);
    $index=0;
    foreach($mark_co as $map){
      if($map==1){
        array_push($co1,$att_level[$index]);
      }
      else if($map==2){
        array_push($co2,$att_level[$index]);
      }
      else if($map==3){
        array_push($co3,$att_level[$index]);
      }
      else if($map==4){
        array_push($co4,$att_level[$index]);
      }
      else if($map==5){
        array_push($co5,$att_level[$index]);
      }
      else if($map==6){
        array_push($co6,$att_level[$index]);
      }
      $index=$index+1;
    }
    if(count($co1)!=0){$var1_2=array_sum($co1)/count($co1);}else{$var1_2=0;}
    if(count($co2)!=0){$var2_2=array_sum($co2)/count($co2);}else{$var2_2=0;}
    if(count($co3)!=0){$var3_2=array_sum($co3)/count($co3);}else{$var3_2=0;}
    if(count($co4)!=0){$var4_2=array_sum($co4)/count($co4);}else{$var4_2=0;}
    if(count($co5)!=0){$var5_2=array_sum($co5)/count($co5);}else{$var5_2=0;}
    if(count($co6)!=0){$var6_2=array_sum($co6)/count($co6);}else{$var6_2=0;}
    $int_array_2=array($var1_2,$var2_2,$var3_2,$var4_2,$var5_2,$var6_2);

    $var1=($var1_1+$var1_2)/2;
    $var2=($var2_1+$var2_2)/2;
    $var3=($var3_1+$var3_2)/2;
    $var4=($var4_1+$var4_2)/2;
    $var5=($var5_1+$var5_2)/2;
    $var6=($var6_1+$var6_2)/2;

    $int_array=array($var1,$var2,$var3,$var4,$var5,$var6);
    ?>
    <div class="row" style="margin-left: 1%; margin-right:1%">
      <div class="col-6" style="border-right: 1px solid rgba(0,0,0,0.2);">
      <table class="table table-striped" style="margin-top: 10%;">
        <thead>
          <tr>
            <th scope="col">CO Code</th>
            <th scope="col">Internal || Unit Test-1 & Unit Test-2 </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">CO1</th>
            <td><?echo round($var1,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO2</th>
            <td><?echo round($var2,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO3</th>
            <td><?echo round($var3,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO4</th>
            <td><?echo round($var4,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO5</th>
            <td><?echo round($var5,2);?></td>
          </tr>
          <tr>
            <th scope="row">CO6</th>
            <td><?echo round($var6,2);?></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="col-6">
        <canvas id="Chart2" width="100%" height="60vh" style="margin-right: 3%"></canvas>
      </div>
    </div> 
    <?php
    echo "<script> window.onload = function() {graph2()} </script>"; 
  }

?>
<?} ?>

</div>
<div id='result'></div>
</body>





<div class="row">
                          
                          <div class="col-md-6 text-nowrap">
                              <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                          </div>
                          <div class="col-md-6">
                              <div class="text-md-right dataTables_filter" id="dataTable_filter"></div>
                              

                          </div>
                      </div>
                      <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                          
                      </div>
                      <div class="row">
                          <div class="col-md-6 align-self-center">
                              
                          </div>
                          <div class="col-md-6">
                              
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <footer class="bg-white sticky-footer">
          <div class="container my-auto">
              <div class="text-center my-auto copyright"></div>
          </div>
      </footer>



<script>
function exportData(){


    var table = document.getElementById("tableCO");
 

    var rows =[];
 
 
    for(var i=0,row; row = table.rows[i];i++){
      
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
        column4 = row.cells[3].innerText;
 
    
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
            ]
        );
 
        }
        csvContent = "data:text/csv;charset=utf-8,";
         
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });
        
      console.log(csvContent);

        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "CO_Attainment_Table.csv");
        document.body.appendChild(link);
         
        link.click();
}


////////////////////////////////////////////////////////////////
function exportData1(){


var table = document.getElementById("tableCO");


var rows =[];
var sub = '<?php echo $sub ?>';
var sem = '<?php echo $sem ?>';
var year = '<?php echo $year ?>';
var t_id = '<?php echo $id?>';



for(var i=1,row; row = table.rows[i];i++){
  
    column1 = row.cells[0].innerText;
    column2 = row.cells[1].innerText;
    column3 = row.cells[2].innerText;
    column4 = row.cells[3].innerText;


    rows.push(
        [
            column1,
            column2,
            column3,
            column4,
        ]
    );

    }
    csvContent = "data:text/csv;charset=utf-8,";
     
    rows.forEach(function(rowArray){
        row = rowArray.join(",");
        csvContent += row + "\r\n";
    });
    
    var data = {id:t_id,subj:sub,semester:sem,years:year,cc:rows};
        $.post("uploadCO.php",data,
        function(data){
            $('#result').html(data)
        });

  // console.log(sub);
  // console.log(sem);
  // console.log(year);
  

 
}
</script>

<script type="text/javascript">
function graph(){
    var ctx = document.getElementById('Chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['CO1', 'CO2', 'CO3', 'CO4', 'CO5', 'CO6'],
            datasets: [{
                label: 'Internal',
                data: <?php echo json_encode($int_array, JSON_NUMERIC_CHECK); ?>,
                backgroundColor: 
                    'rgba(54, 162, 235, 0.2)',
                borderColor: 
                  'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },{
                label: 'Average with External',
                data: <?php echo json_encode($att_array, JSON_NUMERIC_CHECK); ?>,
                type: 'bar',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor:'rgba(75, 192, 192, 1)',
                borderWidth: 1.5,
                // this dataset is drawn on top
                order: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
});}
</script>


<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
</html>