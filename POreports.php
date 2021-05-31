<!DOCTYPE html>
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

$check="LAB";
?>
<html>

<head>
<style type = "text/css">
         table.empty {
            width:350px;
            border-collapse:separate;
            empty-cells:hide;
            width: 100%;
            height: 30vh;     
         }
         td.empty {
            padding:5px;
            border-style:solid;
            border-width:1px;
            border-color:#999999;
            border: 1px solid black;
         }
         .empty {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }

          .empty td, .empty th {
            border: 1px solid #ddd;
            padding: 8px;
          }

          .empty tr:nth-child(even){background-color: #f2f2f2;}

          .empty tr:hover {background-color: #ddd;}

          .empty th {
            padding-top: 12px;
            /* padding-bottom: 12px; */
            text-align: left;
            /* background-color: #4CAF50; */
            color: black;
          }
</style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="curriculum.php"style="font-size:110%;"><i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><?if($desgn=="HOD"){ echo'<a class="nav-link" href="download_reports.php"style="font-size:110%;"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a>';}?><a class="nav-link" href="UserProfile.php" style="font-size:110%;"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
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
  <div class="row" style="padding: 2%;">
  <div class='col-2'>
  
    <nav class="nav flex-column" style="margin: 1%;">
          <a class="nav-link" href="reports.php" style="color: black;">Subject Analysis</a>
          <a class="nav-link" href="values.php" style="color:black;">Threshold Values</a>
          <a class="nav-link active" href="COreports.php" style="color:black;">CO Attainment Table</a>
          <a class="nav-link" href="#" style="color:#007bff;font-weight:bold">PO Attainment Table</a>
          
          </nav>
        </div>
      <div class='col-10' style="padding-top:1%; margin-right:auto; margin-top:-8%;"  >
      
      <form class="needs-validation" method="post" action="" enctype="multipart/form-data" style="margin-left: 2.5%" novalidate> 
      <p style="font-size:large;">Please enter the details for Program Outcome Attainment Table:</p>
        <div class="form-row" style="margin-top: 2%">
          <div class="form-group col-md-4">
          <select name="course" class="form-control custom-select" required>
                            <option value="" disabled selected>Choose Course</option>
                            <?php
                              while($row2 = mysqli_fetch_array($result)){
                            ?>
                            <option><?echo "Subject : ".$row2['sub_name']." ".$row2['subject-code']." Semester : ".$row2['semester']." || Year : ".$row2['year']; ?></option>
                              <?}?>
                          </select>
          </div>
          <div class="form-group col-md-4">
          <button class="btn btn-primary" name="import" style="width: 100%">Show Analysis</button>
          </div>
          </div>
      
      </form>
      </div>
      </div> 
      <hr>
      <?php
      if(isset($_POST["import"])){
        
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
      
        // $range1=(int)$_POST['r1'];
        // $range2=(int)$_POST['r2'];
        // $range3=(int)$_POST['r3'];
        // $th_per=(int)$_POST['thresh_per'];
        // $internal=$_POST['int'];
        if(empty($internal)) {$internal=0.3;$external=0.7;  }
        else {$internal=$internal/100;$external=1-$internal;  }
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
        $po1map=array();
        $po2map=array();
        $po3map=array();
        $po4map=array();
        $po5map=array();
        $po6map=array();
        $po7map=array();
        $po8map=array();
        $po9map=array();
        $po10map=array();
        $po11map=array();
        $po12map=array();
        $pso1map=array();
        $pso2map=array();
        ###############
        $po1maplab=array();
        $po2maplab=array();
        $po3maplab=array();
        $po4maplab=array();
        $po5maplab=array();
        $po6maplab=array();
        $po7maplab=array();
        $po8maplab=array();
        $po9maplab=array();
        $po10maplab=array();
        $po11maplab=array();
        $po12maplab=array();
        $pso1maplab=array();
        $pso2maplab=array();
        ###############
        $po1_val=array();
        $po2_val=array();
        $po3_val=array();
        $po4_val=array();
        $po5_val=array();
        $po6_val=array();
        $po7_val=array();
        $po8_val=array();
        $po9_val=array();
        $po10_val=array();
        $po11_val=array();
        $po12_val=array();
        $pso1_val=array();
        $pso2_val=array();
        ###############
        $po1_val_base=array();
        $po2_val_base=array();
        $po3_val_base=array();
        $po4_val_base=array();
        $po5_val_base=array();
        $po6_val_base=array();
        $po7_val_base=array();
        $po8_val_base=array();
        $po9_val_base=array();
        $po10_val_base=array();
        $po11_val_base=array();
        $po12_val_base=array();
        $pso1_val_base=array();
        $pso2_val_base=array();
        ###############
       
        $sem_count=0;
        $oral_count=0;
        $tw_count=0;
        $student_count=0;
        $tb_name=$sub.'|'.$sub_code;
        $tb_name1=$sub.'|'.$sub_code;

        $sem_query="SELECT * FROM `sem_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
        $sem_result = mysqli_query($conn,$sem_query) or die("ERROR".mysqli_error($conn));
        while($row = mysqli_fetch_array($sem_result)){
          array_push($sem_data,$row['tee']);
          if((int)$row['tee']>=$th_per_ext*80/100){
            $sem_count=$sem_count+1;
          }
          $student_count=$student_count+1;
        }
        #print_r($sem_data);
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

//COReportsnew
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


$avg_att= (($tw_att+$oral_att)/2);

// print_r($avg_att);

// print_r($att_array);
// print_r($int_array);

 #########################-----------------------------#############################
        $po_db="co_po_map";
        $po_db_lab="copo_map_lab";
        $new_conn=new mysqli($host,$user,$pass,$po_db);
        $new_conn_lab=new mysqli($host,$user,$pass,$po_db_lab);
     
  
          
     

      if(strpos($sub,$check)==FALSE){

        $po_query="SELECT * FROM `$tb_name` WHERE 1";
        $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));

      while($row = mysqli_fetch_array($po_result)){
        array_push($po1map,$row['po1']);
        array_push($po2map,$row['po2']);
        array_push($po3map,$row['po3']);
        array_push($po4map,$row['po4']);
        array_push($po5map,$row['po5']);
        array_push($po6map,$row['po6']);
        array_push($po7map,$row['po7']);
        array_push($po8map,$row['po8']);
        array_push($po9map,$row['po9']);
        array_push($po10map,$row['po10']);
        array_push($po11map,$row['po11']);
        array_push($po12map,$row['po12']);
        array_push($pso1map,$row['pso1']);
        array_push($pso2map,$row['pso2']);
      }
    }
   
      // print_r($po2map);
      if(strpos($sub,$check)==TRUE){

        $po_query_lab="SELECT * FROM `$tb_name1` WHERE 1";
        $po_result_lab = mysqli_query($new_conn_lab,$po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      
      while($row1 = mysqli_fetch_array($po_result_lab)){
        array_push($po1maplab,$row1['po1']);
        array_push($po2maplab,$row1['po2']);
        array_push($po3maplab,$row1['po3']);
        array_push($po4maplab,$row1['po4']);
        array_push($po5maplab,$row1['po5']);
        array_push($po6maplab,$row1['po6']);
        array_push($po7maplab,$row1['po7']);
        array_push($po8maplab,$row1['po8']);
        array_push($po9maplab,$row1['po9']);
        array_push($po10maplab,$row1['po10']);
        array_push($po11maplab,$row1['po11']);
        array_push($po12maplab,$row1['po12']);
        array_push($pso1maplab,$row1['pso1']);
        array_push($pso2maplab,$row1['pso2']);
      }
    }
      #print_r($po2maplab);
   
 ##################################################################
 if(strpos($sub,$check)==FALSE){
      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po1` IS NULL OR `po1` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po1 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po2` IS NULL OR `po2` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po2 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po3` IS NULL OR `po3` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po3 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po4` IS NULL OR `po4` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po4 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po5` IS NULL OR `po5` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po5 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po6` IS NULL OR `po6` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po6 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po7` IS NULL OR `po7` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po7 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po8` IS NULL OR `po8` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po8 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po9` IS NULL OR `po9` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po9 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po10` IS NULL OR `po10` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po10 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po11` IS NULL OR `po11` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po11 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`po12` IS NULL OR `po12` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $po12 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`pso1` IS NULL OR `pso1` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $pso1 = mysqli_fetch_array($po_result);

      $po_query="SELECT COUNT(*) FROM `$tb_name` WHERE (`pso2` IS NULL OR `pso2` = '')";
      $po_result = mysqli_query($new_conn,$po_query) or die("ERROR".mysqli_error($new_conn));
      $pso2 = mysqli_fetch_array($po_result);
 }
//  print_r($po2);
####################################################################################################
if(strpos($sub,$check)==TRUE){
      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po1` IS NULL OR `po1` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po1lab = mysqli_fetch_array ($po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po2` IS NULL OR `po2` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po2lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po3` IS NULL OR `po3` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po3lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po4` IS NULL OR `po4` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po4lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po5` IS NULL OR `po5` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po5lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po6` IS NULL OR `po6` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po6lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po7` IS NULL OR `po7` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po7lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po8` IS NULL OR `po8` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po8lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po9` IS NULL OR `po9` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po9lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po10` IS NULL OR `po10` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po10lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po11` IS NULL OR `po11` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po11lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`po12` IS NULL OR `po12` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $po12lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`pso1` IS NULL OR `pso1` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $pso1lab = mysqli_fetch_array( $po_result_lab);

      $po_query_lab="SELECT COUNT(*) FROM `$tb_name1` WHERE (`pso2` IS NULL OR `pso2` = '')";
      $po_result_lab = mysqli_query($new_conn_lab, $po_query_lab) or die("ERROR".mysqli_error($new_conn_lab));
      $pso2lab = mysqli_fetch_array( $po_result_lab);
    }
     

    // print_r($po9lab );

    if(strpos($sub,$check)==TRUE){


      for($i = 0; $i <= 5; $i++){
        if($po1maplab[$i]==3){array_push($po1_val,$avg_att);}
        elseif($po1maplab[$i]==2){array_push($po1_val,$avg_att*0.67);}
        elseif($po1maplab[$i]==1){array_push($po1_val,$avg_att*0.33);}
        elseif($po1maplab[$i]==0){array_push($po1_val,$avg_att*0);}  
      }

      for($i = 0; $i <= 5; $i++){
        if($po2maplab[$i]==3){array_push($po2_val,$avg_att);}
        elseif($po2maplab[$i]==2){array_push($po2_val,$avg_att*0.67);}
        elseif($po2maplab[$i]==1){array_push($po2_val,$avg_att*0.33);}
        elseif($po2maplab[$i]==0){array_push($po2_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po3maplab[$i]==3){array_push($po3_val,$avg_att);}
        elseif($po3maplab[$i]==2){array_push($po3_val,$avg_att*0.67);}
        elseif($po3maplab[$i]==1){array_push($po3_val,$avg_att*0.33);}
        elseif($po3maplab[$i]==0){array_push($po3_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po4maplab[$i]==3){array_push($po4_val,$avg_att);}
        elseif($po4maplab[$i]==2){array_push($po4_val,$avg_att*0.67);}
        elseif($po4maplab[$i]==1){array_push($po4_val,$avg_att*0.33);}
        elseif($po4maplab[$i]==0){array_push($po4_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po5maplab[$i]==3){array_push($po5_val,$avg_att);}
        elseif($po5maplab[$i]==2){array_push($po5_val,$avg_att*0.67);}
        elseif($po5maplab[$i]==1){array_push($po5_val,$avg_att*0.33);}
        elseif($po5maplab[$i]==0){array_push($po5_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po6maplab[$i]==3){array_push($po6_val,$avg_att);}
        elseif($po6maplab[$i]==2){array_push($po6_val,$avg_att*0.67);}
        elseif($po6maplab[$i]==1){array_push($po6_val,$avg_att*0.33);}
        elseif($po6maplab[$i]==0){array_push($po6_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po7maplab[$i]==3){array_push($po7_val,$avg_att);}
        elseif($po7maplab[$i]==2){array_push($po7_val,$avg_att*0.67);}
        elseif($po7maplab[$i]==1){array_push($po7_val,$avg_att*0.33);}
        elseif($po7maplab[$i]==0){array_push($po7_val,$avg_att*0);;}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po8maplab[$i]==3){array_push($po8_val,$avg_att);}
        elseif($po8maplab[$i]==2){array_push($po8_val,$avg_att*0.67);}
        elseif($po8maplab[$i]==1){array_push($po8_val,$avg_att*0.33);}
        elseif($po8maplab[$i]==0){array_push($po8_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po9maplab[$i]==3){array_push($po9_val,$avg_att);}
        elseif($po9maplab[$i]==2){array_push($po9_val,$avg_att*0.67);}
        elseif($po9maplab[$i]==1){array_push($po9_val,$avg_att*0.33);}
        elseif($po9maplab[$i]==0){array_push($po9_val,$avg_att*0);}
      }  
      for($i = 0; $i <= 5; $i++){
        if($po10maplab[$i]==3){array_push($po10_val,$avg_att);}
        elseif($po10maplab[$i]==2){array_push($po10_val,$avg_att*0.67);}
        elseif($po10maplab[$i]==1){array_push($po10_val,$avg_att*0.33);}
        elseif($po10maplab[$i]==0){array_push($po10_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po11maplab[$i]==3){array_push($po11_val,$avg_att);}
        elseif($po11maplab[$i]==2){array_push($po11_val,$avg_att*0.67);}
        elseif($po11maplab[$i]==1){array_push($po11_val,$avg_att*0.33);}
        elseif($po11maplab[$i]==0){array_push($po11_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($po12maplab[$i]==3){array_push($po12_val,$avg_att);}
        elseif($po12maplab[$i]==2){array_push($po12_val,$avg_att*0.67);}
        elseif($po12maplab[$i]==1){array_push($po12_val,$avg_att*0.33);}
        elseif($po12maplab[$i]==0){array_push($po12_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($pso1maplab[$i]==3){array_push($pso1_val,$avg_att);}
        elseif($pso1maplab[$i]==2){array_push($pso1_val,$avg_att*0.67);}
        elseif($pso1maplab[$i]==1){array_push($pso1_val,$avg_att*0.33);}
        elseif($pso1maplab[$i]==0){array_push($pso1_val,$avg_att*0);}
      }  

      for($i = 0; $i <= 5; $i++){
        if($pso2maplab[$i]==3){array_push($pso2_val,$avg_att);}
        elseif($pso2maplab[$i]==2){array_push($pso2_val,$avg_att*0.67);}
        elseif($pso2maplab[$i]==1){array_push($pso2_val,$avg_att*0.33);}
        elseif($pso2maplab[$i]==0){array_push($pso2_val,$avg_att*0);}
      }  
      // print_r($po5_val);

      $countpo1 = (count($po1_val)-$po1lab[0]);
      $countpo2 = (count($po2_val)-$po2lab[0]);
      $countpo3 = (count($po3_val)-$po3lab[0]);
      $countpo4 = (count($po4_val)-$po4lab[0]);
      $countpo5 = (count($po5_val)-$po5lab[0]);
      $countpo6 = (count($po6_val)-$po6lab[0]);
      $countpo7 = (count($po7_val)-$po7lab[0]);
      $countpo8 = (count($po8_val)-$po8lab[0]);
      $countpo9 = (count($po9_val)-$po9lab[0]);
      $countpo10 = (count($po10_val)-$po10lab[0]);
      $countpo11 = (count($po11_val)-$po11lab[0]);
      $countpo12 = (count($po12_val)-$po12lab[0]);
      $countpso1 = (count($pso1_val)-$pso1lab[0]);
      $countpso2 = (count($pso2_val)-$pso2lab[0]);





      $target_avg=array();
      ###################################################
     if((is_nan(array_sum($po1maplab)/$countpo1))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po1maplab)/$countpo1);
     }
     ###################################################
     if((is_nan(array_sum($po2maplab)/$countpo2))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po2maplab)/$countpo2);
     }
     ###################################################
     if((is_nan(array_sum($po3maplab)/$countpo3))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po3maplab)/$countpo3);
     }
     ###################################################
     if((is_nan(array_sum($po4maplab)/$countpo4))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po4maplab)/$countpo4);
     }
     ###################################################
     if((is_nan(array_sum($po5maplab)/$countpo5))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po5maplab)/$countpo5);
     }
     ###################################################
     if((is_nan(array_sum($po6maplab)/$countpo6))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po6maplab)/$countpo6);
     }
     ###################################################
     if((is_nan(array_sum($po7maplab)/$countpo7))==1)
     {
       array_push($target_avg,0);
     }
     else{
      array_push($target_avg,array_sum($po7maplab)/$countpo7);
     }
     ###################################################
     if((is_nan(array_sum($po8maplab)/$countpo8))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po8maplab)/$countpo8);
     }
     ###################################################
     if((is_nan(array_sum($po9maplab)/$countpo9))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po9maplab)/$countpo9);
     }
     ###################################################
     if((is_nan(array_sum($po10maplab)/$countpo10))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po10maplab)/$countpo10);
     }
     ###################################################
     if((is_nan(array_sum($po11maplab)/$countpo11))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po11maplab)/$countpo11);
     }
     ###################################################
     if((is_nan(array_sum($po12maplab)/$countpo12))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($po12maplab)/$countpo12);
     }
     ###################################################
     if((is_nan(array_sum($pso1maplab)/$countpso1))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($pso1maplab)/$countpso1);
     }
     ###################################################
     if((is_nan(array_sum($pso2maplab)/$countpso2))==1)
     {
       array_push($target_avg,0);
     }
     else{
     array_push($target_avg,array_sum($pso2maplab)/$countpso2);
     }
     ###################################################

    







       $po_avg=array();
    ###################################################
     if((is_nan(array_sum($po1_val)/$countpo1))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po1_val)/$countpo1);
     }
     ###################################################
     if((is_nan(array_sum($po2_val)/$countpo2))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po2_val)/$countpo2);
     }
     ###################################################
     if((is_nan(array_sum($po3_val)/$countpo3))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po3_val)/$countpo3);
     }
     ###################################################
     if((is_nan(array_sum($po4_val)/$countpo4))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po4_val)/$countpo4);
     }
     ###################################################
     if((is_nan(array_sum($po5_val)/$countpo5))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po5_val)/$countpo5);
     }
     ###################################################
     if((is_nan(array_sum($po6_val)/$countpo6))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po6_val)/$countpo6);
     }
     ###################################################
     if((is_nan(array_sum($po7_val)/$countpo7))==1)
     {
       array_push($po_avg,0);
     }
     else{
      array_push($po_avg,array_sum($po7_val)/$countpo7);
     }
     ###################################################
     if((is_nan(array_sum($po8_val)/$countpo8))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po8_val)/$countpo8);
     }
     ###################################################
     if((is_nan(array_sum($po9_val)/$countpo9))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po9_val)/$countpo9);
     }
     ###################################################
     if((is_nan(array_sum($po10_val)/$countpo10))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po10_val)/$countpo10);
     }
     ###################################################
     if((is_nan(array_sum($po11_val)/$countpo11))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po11_val)/$countpo11);
     }
     ###################################################
     if((is_nan(array_sum($po12_val)/$countpo12))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po12_val)/$countpo12);
     }
     ###################################################
     if((is_nan(array_sum($pso1_val)/$countpso1))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($pso1_val)/$countpso1);
     }
     ###################################################
     if((is_nan(array_sum($pso2_val)/$countpso2))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($pso2_val)/$countpso2);
     }
     ###################################################


      $po1per=(round(($po_avg[0]*100))/$target_avg[0]);
      $po2per=(round(($po_avg[1]*100))/$target_avg[1]);
      $po3per=(round(($po_avg[2]*100))/$target_avg[2]);
      $po4per=(round(($po_avg[3]*100))/$target_avg[3]);
      $po5per=(round(($po_avg[4]*100))/$target_avg[4]);
      $po6per=(round(($po_avg[5]*100))/$target_avg[5]);
      $po7per=(round(($po_avg[6]*100))/$target_avg[6]);
      $po8per=(round(($po_avg[7]*100))/$target_avg[7]);
      $po9per=(round(($po_avg[8]*100))/$target_avg[8]);
      $po10per=(round(($po_avg[9]*100))/$target_avg[9]);
      $po11per=(round(($po_avg[10]*100))/$target_avg[10]);
      $po12per=(round(($po_avg[11]*100))/$target_avg[11]);
      $pso1per=(round(($po_avg[12]*100))/$target_avg[12]);
      $pso2per=(round(($po_avg[13]*100))/$target_avg[13]);

    $po_percent=array();

    array_push($po_percent,$po1per,$po2per,$po3per,$po4per,$po5per,$po6per,$po7per,$po8per,$po9per,$po10per,$po11per,$po12per,$pso1per,$pso2per);

 

      
     
    $strong=array();
    $weak=array();
    $moderate=array();
    $notmapped=array();
    
    if($po_percent[0]<50)
    {
     array_push($weak,"PO1");
    }
    elseif($po_percent[0]>50 && $po_percent[0]<80)
    {
      array_push($moderate,"PO1");
    }
    elseif($po_percent[0]>80)
    {
     array_push($strong,"PO1");
    }
    else
    {
     array_push($notmapped,"PO1");
    }
    #############################################################
    if($po_percent[1]<50)
    {
     array_push($weak,"PO2");
    }
    elseif($po_percent[1]>50 && $po_percent[1]<80)
    {
      array_push($moderate,"PO2");
    }
    elseif($po_percent[1]>80)
    {
     array_push($strong,"PO2");
    }
    else
    {
     array_push($notmapped,"PO2");
    }
    #############################################################   
    if($po_percent[2]<50)
    {
     array_push($weak,"PO3");
    }
    elseif($po_percent[2]>50 && $po_percent[2]<80)
    {
      array_push($moderate,"PO3");
    }
    elseif($po_percent[2]>80)
    {
     array_push($strong,"PO3");
    }
    else
    {
     array_push($notmapped,"PO3");
    }
    #############################################################
    if($po_percent[3]<50)
    {
     array_push($weak,"PO4");
    }
    elseif($po_percent[3]>50 && $po_percent[3]<80)
    {
      array_push($moderate,"PO4");
    }
    elseif($po_percent[3]>80)
    {
     array_push($strong,"PO4");
    }
    else
    {
     array_push($notmapped,"PO4");
    }
    #############################################################
    if($po_percent[4]<50)
    {
     array_push($weak,"PO5");
    }
    elseif($po_percent[4]>50 && $po_percent[4]<80)
    {
      array_push($moderate,"PO5");
    }
    elseif($po_percent[4]>80)
    {
     array_push($strong,"PO5");
    }
    else
    {
     array_push($notmapped,"PO5");
    }
    #############################################################
    if($po_percent[5]<50)
    {
     array_push($weak,"PO6");
    }
    elseif($po_percent[5]>50 && $po_percent[5]<80)
    {
      array_push($moderate,"PO6");
    }
    elseif($po_percent[5]>80)
    {
     array_push($strong,"PO6");
    }
    else
    {
     array_push($notmapped,"PO6");
    }
    #############################################################
    if($po_percent[6]<50)
    {
     array_push($weak,"PO7");
    }
    elseif($po_percent[6]>50 && $po_percent[6]<80)
    {
      array_push($moderate,"PO7");
    }
    elseif($po_percent[6]>80)
    {
     array_push($strong,"PO7");
    }
    else
    {
     array_push($notmapped,"PO7");
    }
    #############################################################
    if($po_percent[7]<50)
    {
     array_push($weak,"PO8");
    }
    elseif($po_percent[7]>50 && $po_percent[7]<80)
    {
      array_push($moderate,"PO8");
    }
    elseif($po_percent[7]>80)
    {
     array_push($strong,"PO8");
    }
    else
    {
     array_push($notmapped,"PO8");
    }
    #############################################################
    if($po_percent[8]<50)
    {
     array_push($weak,"PO9");
    }
    elseif($po_percent[8]>50 && $po_percent[8]<80)
    {
      array_push($moderate,"PO9");
    }
    elseif($po_percent[8]>80)
    {
     array_push($strong,"PO9");
    }
    else
    {
     array_push($notmapped,"PO9");
    }
    #############################################################
    if($po_percent[9]<50)
    {
     array_push($weak,"PO10");
    }
    elseif($po_percent[9]>50 && $po_percent[9]<80)
    {
      array_push($moderate,"PO10");
    }
    elseif($po_percent[9]>80)
    {
     array_push($strong,"PO10");
    }
    else
    {
     array_push($notmapped,"PO10");
    }
    #############################################################
    if($po_percent[10]<50)
    {
     array_push($weak,"PO11");
    }
    elseif($po_percent[10]>50 && $po_percent[10]<80)
    {
      array_push($moderate,"PO11");
    }
    elseif($po_percent[10]>80)
    {
     array_push($strong,"PO11");
    }
    else
    {
     array_push($notmapped,"PO11");
    }
    #############################################################
    if($po_percent[11]<50)
    {
     array_push($weak,"PO12");
    }
    elseif($po_percent[11]>50 && $po_percent[11]<80)
    {
      array_push($moderate,"PO12");
    }
    elseif($po_percent[11]>80)
    {
     array_push($strong,"PO12");
    }
    else
    {
     array_push($notmapped,"PO12");
    }
    #############################################################
    if($po_percent[12]<50)
    {
     array_push($weak,"PSO1");
    }
    elseif($po_percent[12]>50 && $po_percent[12]<80)
    {
      array_push($moderate,"PSO1");
    }
    elseif($po_percent[12]>80)
    {
     array_push($strong,"PSO1");
    }
    else
    {
     array_push($notmapped,"PSO1");
    }
    #############################################################
    if($po_percent[13]<50)
    {
     array_push($weak,"PSO2");
    }
    elseif($po_percent[13]>50 && $po_percent[13]<80)
    {
      array_push($moderate,"PSO2");
    }
    elseif($po_percent[13]>80)
    {
     array_push($strong,"PSO2");
    }
    else
    {
     array_push($notmapped,"PSO2");
    }
    
    // print_r($filtered_arr_val);
    //  print_r($filtered_arr_base);
    // print_r($target_avg);
    #############################################################

   ?>
<div class="row" style="margin-left: 1%; margin-right:1% margin-bottom: 2%">
      <div class="col-6" style="height:35vh; overflow-y:hidden; overflow-x: auto; border-right: 1px solid rgba(0,0,0,0.2);">
      <table class="table table-striped" id="tablePO">
  <thead>
    <tr>
            <th scope="col"></th>
            <th scope="col">PO1</th>
            <th scope="col">PO2</th>
            <th scope="col">PO3</th>
            <th scope="col">PO4</th>
            <th scope="col">PO5</th>
            <th scope="col">PO6</th>
            <th scope="col">PO7</th>
            <th scope="col">PO8</th>
            <th scope="col">PO9</th>
            <th scope="col">PO10</th>
            <th scope="col">PO11</th>
            <th scope="col">PO12</th>
            <th scope="col">PSO1</th>
            <th scope="col">PSO2</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PO Weighted Average Achieved</th>
      <td><?echo round($po_avg[0],2);?></td>
      <td><?echo round($po_avg[1],2);?></td>
      <td><?echo round($po_avg[2],2);?></td>
      <td><?echo round($po_avg[3],2);?></td>
      <td><?echo round($po_avg[4],2);?></td>
      <td><?echo round($po_avg[5],2);?></td>
      <td><?echo round($po_avg[6],2);?></td>
      <td><?echo round($po_avg[7],2);?></td>
      <td><?echo round($po_avg[8],2);?></td>
      <td><?echo round($po_avg[9],2);?></td>
      <td><?echo round($po_avg[10],2);?></td>
      <td><?echo round($po_avg[11],2);?></td>
      <td><?echo round($po_avg[12],2);?></td>
      <td><?echo round($po_avg[13],2);?></td> 
    
    </tr>
    <tr>
      <th scope="row">Target</th>
      <td><?echo round($target_avg[0],2);?></td>
      <td><?echo round($target_avg[1],2);?></td>
      <td><?echo round($target_avg[2],2);?></td>
      <td><?echo round($target_avg[3],2);?></td>
      <td><?echo round($target_avg[4],2);?></td>
      <td><?echo round($target_avg[5],2);?></td>
      <td><?echo round($target_avg[6],2);?></td>
      <td><?echo round($target_avg[7],2);?></td>
      <td><?echo round($target_avg[8],2);?></td>
      <td><?echo round($target_avg[9],2);?></td>
      <td><?echo round($target_avg[10],2);?></td>
      <td><?echo round($target_avg[11],2);?></td>
      <td><?echo round($target_avg[12],2);?></td>
      <td><?echo round($target_avg[13],2);?></td>
     
      

    </tr>
    
    
  </tbody>
</table>

      </div>
      <div class="col-6" style="height:35vh;overflow-y:scroll; overflow-x:auto;">
      <table class="empty" >
        <thead>
        <tr>
        <th scope="col" class="table-success">Strong</th>
        <th scope="col" class="table-warning">Moderate</th>
        <th scope="col" class="table-danger">Weak</th>
        <th scope="col" class="table-primary">Not Mapped</th>
        </tr>
        </thead>
        <tbody>
            <tr>
              <td ><?echo $strong[0];?></td>
              <td ><?echo $moderate[0];?></td>
              <td ><?echo $weak[0];?></td>
              <td ><?echo $notmapped[0];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[1];?></td>
              <td ><?echo $moderate[1];?></td>
              <td ><?echo $weak[1];?></td>
              <td ><?echo $notmapped[1];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[2];?></td>
              <td ><?echo $moderate[2];?></td>
              <td ><?echo $weak[2];?></td>
              <td ><?echo $notmapped[2];?></td>
              
            </tr>
            <tr>
            
              <td ><?echo $strong[3];?></td>
              <td ><?echo $moderate[3];?></td>
              <td ><?echo $weak[3];?></td>
              <td ><?echo $notmapped[3];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[4];?></td>
              <td ><?echo $moderate[4];?></td>
              <td ><?echo $weak[4];?></td>
              <td ><?echo $notmapped[4];?></td>
              
              
            </tr>
            <tr>
              <td ><?echo $strong[5];?></td>
              <td ><?echo $moderate[5];?></td>
              <td ><?echo $weak[5];?></td>
              <td ><?echo $notmapped[5];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[6];?></td>
              <td ><?echo $moderate[6];?></td>
              <td ><?echo $weak[6];?></td>
              <td ><?echo $notmapped[6];?></td>
              
            </tr>
            <tr>
            <td ><?echo $strong[7];?></td>
              <td ><?echo $moderate[7];?></td>
              <td ><?echo $weak[7];?></td>
              <td ><?echo $notmapped[7];?></td>
              
            </tr>
            <tr>
            <td ><?echo $strong[8];?></td>
              <td ><?echo $moderate[8];?></td>
              <td ><?echo $weak[8];?></td>
              <td ><?echo $notmapped[8];?></td>
              
            </tr>
            <tr>
            <td ><?echo $strong[9];?></td>
              <td ><?echo $moderate[9];?></td>
              <td ><?echo $weak[9];?></td>
              <td ><?echo $notmapped[9];?></td>
             
            </tr>
            <tr>
            <td ><?echo $strong[10];?></td>
              <td ><?echo $moderate[10];?></td>
              <td ><?echo $weak[10];?></td>
              <td ><?echo $notmapped[10];?></td>
             
            </tr>
            <tr>
            <td ><?echo $strong[11];?></td>
              <td ><?echo $moderate[11];?></td>
              <td ><?echo $weak[11];?></td>
              <td ><?echo $notmapped[11];?></td>
              
            </tr>
            <tr>  
              <td ><?echo $strong[12];?></td>
              <td ><?echo $moderate[12];?></td>
              <td ><?echo $weak[12];?></td>
              <td ><?echo $notmapped[12];?></td>
             
            </tr>
            <tr>
              <td ><?echo $strong[13];?></td>
              <td ><?echo $moderate[13];?></td>
              <td ><?echo $weak[13];?></td>
              <td ><?echo $notmapped[13];?></td>
             
            </tr>
            
        </tbody>
      </table>
      <!-- <canvas id="Chart1" width="100%" height="50vh" style="margin-right: 3%"></canvas> -->
      </div>
      
      <button onclick="exportData()" class="btn btn-warning" style="width: 20%;height: 20%; margin-left: 5%; margin-top: 2%;">Download CSV <i class="fa fa-download"></i></button>&nbsp;&nbsp;
      <button class="btn btn-info" onclick="exportData1()" style="width: 20%; height: 20%; margin-right: 5%; margin-top: 2%;">Upload Data <i class="fa fa-upload"></i></button>
      </div>  
      </div>  
 <? echo "<script> window.onload = function() {graph2()} </script>";  } ?>

  </div>

   
   
   








<?
    if(strpos($sub,$check)==FALSE){
      for($i = 0; $i <= 5; $i++){
        if($po1map[$i]==3){array_push($po1_val,(float)$att_array[$i]);array_push($po1_val_base,(float)$att_array[$i]);}
        elseif($po1map[$i]==2){array_push($po1_val,(float)$att_array[$i]*0.67);array_push($po1_val_base,(float)$att_array[$i]);}
        elseif($po1map[$i]==1){array_push($po1_val,(float)$att_array[$i]*0.33);array_push($po1_val_base,(float)$att_array[$i]);}
        elseif($po1map[$i]==0){array_push($po1_val,(float)$att_array[$i]*0);array_push($po1_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po2map[$i]==3){array_push($po2_val,(float)$att_array[$i]);array_push($po2_val_base,(float)$att_array[$i]);}
        elseif($po2map[$i]==2){array_push($po2_val,(float)$att_array[$i]*0.67);array_push($po2_val_base,(float)$att_array[$i]);}
        elseif($po2map[$i]==1){array_push($po2_val,(float)$att_array[$i]*0.33);array_push($po2_val_base,(float)$att_array[$i]);}
        elseif($po2map[$i]==0){array_push($po2_val,(float)$att_array[$i]*0);array_push($po2_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po3map[$i]==3){array_push($po3_val,(float)$att_array[$i]);array_push($po3_val_base,(float)$att_array[$i]);}
        elseif($po3map[$i]==2){array_push($po3_val,(float)$att_array[$i]*0.67);array_push($po3_val_base,(float)$att_array[$i]);}
        elseif($po3map[$i]==1){array_push($po3_val,(float)$att_array[$i]*0.33);array_push($po3_val_base,(float)$att_array[$i]);}
        elseif($po3map[$i]==0){array_push($po3_val,(float)$att_array[$i]*0);array_push($po3_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po4map[$i]==3){array_push($po4_val,(float)$att_array[$i]);array_push($po4_val_base,(float)$att_array[$i]);}
        elseif($po4map[$i]==2){array_push($po4_val,(float)$att_array[$i]*0.67);array_push($po4_val_base,(float)$att_array[$i]);}
        elseif($po4map[$i]==1){array_push($po4_val,(float)$att_array[$i]*0.33);array_push($po4_val_base,(float)$att_array[$i]);}
        elseif($po4map[$i]==0){array_push($po4_val,(float)$att_array[$i]*0);array_push($po4_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po5map[$i]==3){array_push($po5_val,(float)$att_array[$i]);array_push($po5_val_base,(float)$att_array[$i]);}
        elseif($po5map[$i]==2){array_push($po5_val,(float)$att_array[$i]*0.67);array_push($po5_val_base,(float)$att_array[$i]);}
        elseif($po5map[$i]==1){array_push($po5_val,(float)$att_array[$i]*0.33);array_push($po5_val_base,(float)$att_array[$i]);}
        elseif($po5map[$i]==0){array_push($po5_val,(float)$att_array[$i]*0);array_push($po5_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po6map[$i]==3){array_push($po6_val,(float)$att_array[$i]);array_push($po6_val_base,(float)$att_array[$i]);}
        elseif($po6map[$i]==2){array_push($po6_val,(float)$att_array[$i]*0.67);array_push($po6_val_base,(float)$att_array[$i]);}
        elseif($po6map[$i]==1){array_push($po6_val,(float)$att_array[$i]*0.33);array_push($po6_val_base,(float)$att_array[$i]);}
        elseif($po6map[$i]==0){array_push($po6_val,(float)$att_array[$i]*0);array_push($po6_val_base,(float)$att_array[$i]*0);}
      }
      for($i = 0; $i <= 5; $i++){
        if($po7map[$i]==3){array_push($po7_val,(float)$att_array[$i]);array_push($po7_val_base,(float)$att_array[$i]);}
        elseif($po7map[$i]==2){array_push($po7_val,(float)$att_array[$i]*0.67);array_push($po7_val_base,(float)$att_array[$i]);}
        elseif($po7map[$i]==1){array_push($po7_val,(float)$att_array[$i]*0.33);array_push($po7_val_base,(float)$att_array[$i]);}
        elseif($po7map[$i]==0){array_push($po7_val,(float)$att_array[$i]*0);array_push($po7_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po8map[$i]==3){array_push($po8_val,(float)$att_array[$i]);array_push($po8_val_base,(float)$att_array[$i]);}
        elseif($po8map[$i]==2){array_push($po8_val,(float)$att_array[$i]*0.67);array_push($po8_val_base,(float)$att_array[$i]);}
        elseif($po8map[$i]==1){array_push($po8_val,(float)$att_array[$i]*0.33);array_push($po8_val_base,(float)$att_array[$i]);}
        elseif($po8map[$i]==0){array_push($po8_val,(float)$att_array[$i]*0);array_push($po8_val_base,(float)$att_array[$i]*0);}
      }
      for($i = 0; $i <= 5; $i++){
        if($po9map[$i]==3){array_push($po9_val,(float)$att_array[$i]);array_push($po9_val_base,(float)$att_array[$i]);}
        elseif($po9map[$i]==2){array_push($po9_val,(float)$att_array[$i]*0.67);array_push($po9_val_base,(float)$att_array[$i]);}
        elseif($po9map[$i]==1){array_push($po9_val,(float)$att_array[$i]*0.33);array_push($po9_val_base,(float)$att_array[$i]);}
        elseif($po9map[$i]==0){array_push($po9_val,(float)$att_array[$i]*0);array_push($po9_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po10map[$i]==3){array_push($po10_val,(float)$att_array[$i]);array_push($po10_val_base,(float)$att_array[$i]);}
        elseif($po10map[$i]==2){array_push($po10_val,(float)$att_array[$i]*0.67);array_push($po10_val_base,(float)$att_array[$i]);}
        elseif($po10map[$i]==1){array_push($po10_val,(float)$att_array[$i]*0.33);array_push($po10_val_base,(float)$att_array[$i]);}
        elseif($po10map[$i]==0){array_push($po10_val,(float)$att_array[$i]*0);array_push($po10_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po11map[$i]==3){array_push($po11_val,(float)$att_array[$i]);array_push($po11_val_base,(float)$att_array[$i]);}
        elseif($po11map[$i]==2){array_push($po11_val,(float)$att_array[$i]*0.67);array_push($po11_val_base,(float)$att_array[$i]);}
        elseif($po11map[$i]==1){array_push($po11_val,(float)$att_array[$i]*0.33);array_push($po11_val_base,(float)$att_array[$i]);}
        elseif($po11map[$i]==0){array_push($po11_val,(float)$att_array[$i]*0);array_push($po12_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($po12map[$i]==3){array_push($po12_val,(float)$att_array[$i]);array_push($po12_val_base,(float)$att_array[$i]);}
        elseif($po12map[$i]==2){array_push($po12_val,(float)$att_array[$i]*0.67);array_push($po12_val_base,(float)$att_array[$i]);}
        elseif($po12map[$i]==1){array_push($po12_val,(float)$att_array[$i]*0.33);array_push($po12_val_base,(float)$att_array[$i]);}
        elseif($po12map[$i]==0){array_push($po12_val,(float)$att_array[$i]*0);array_push($po12_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($pso1map[$i]==3){array_push($pso1_val,(float)$att_array[$i]);array_push($pso1_val_base,(float)$att_array[$i]);}
        elseif($pso1map[$i]==2){array_push($pso1_val,(float)$att_array[$i]*0.67);array_push($pso1_val_base,(float)$att_array[$i]);}
        elseif($pso1map[$i]==1){array_push($pso1_val,(float)$att_array[$i]*0.67);array_push($pso1_val_base,(float)$att_array[$i]);}
        elseif($pso1map[$i]==0){array_push($pso1_val,(float)$att_array[$i]*0);array_push($pso1_val_base,(float)$att_array[$i]*0);}
        
      }
      for($i = 0; $i <= 5; $i++){
        if($pso2map[$i]==3){array_push($pso2_val,(float)$att_array[$i]);array_push($pso2_val_base,(float)$att_array[$i]);}
        elseif($pso2map[$i]==2){array_push($pso2_val,(float)$att_array[$i]*0.67);array_push($pso2_val_base,(float)$att_array[$i]);}
        elseif($pso2map[$i]==1){array_push($pso2_val,(float)$att_array[$i]*0.67);array_push($pso2_val_base,(float)$att_array[$i]);}
        elseif($pso2map[$i]==0){array_push($pso2_val,(float)$att_array[$i]*0);array_push($pso2_val_base,(float)$att_array[$i]*0);}
       
      }

      
    
    $countpo1 = (count($po1_val)-$po1[0]);
    $countpo2 = (count($po2_val)-$po2[0]);
    $countpo3 = (count($po3_val)-$po3[0]);
    $countpo4 = (count($po4_val)-$po4[0]);
    $countpo5 = (count($po5_val)-$po5[0]);
    $countpo6 = (count($po6_val)-$po6[0]);
    $countpo7 = (count($po7_val)-$po7[0]);
    $countpo8 = (count($po8_val)-$po8[0]);
    $countpo9 = (count($po9_val)-$po9[0]);
    $countpo10 = (count($po10_val)-$po10[0]);
    $countpo11 = (count($po11_val)-$po11[0]);
    $countpo12 = (count($po12_val)-$po12[0]);
    $countpso1 = (count($pso1_val)-$pso1[0]);
    $countpso2 = (count($pso2_val)-$pso2[0]);
   


      
     $po_avg=array();
    ###################################################
     if((is_nan(array_sum($po1_val)/$countpo1))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po1_val)/$countpo1);
     }
     ###################################################
     if((is_nan(array_sum($po2_val)/$countpo2))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po2_val)/$countpo2);
     }
     ###################################################
     if((is_nan(array_sum($po3_val)/$countpo3))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po3_val)/$countpo3);
     }
     ###################################################
     if((is_nan(array_sum($po4_val)/$countpo4))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po4_val)/$countpo4);
     }
     ###################################################
     if((is_nan(array_sum($po5_val)/$countpo5))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po5_val)/$countpo5);
     }
     ###################################################
     if((is_nan(array_sum($po6_val)/$countpo6))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po6_val)/$countpo6);
     }
     ###################################################
     if((is_nan(array_sum($po7_val)/$countpo7))==1)
     {
       array_push($po_avg,0);
     }
     else{
      array_push($po_avg,array_sum($po7_val)/$countpo7);
     }
     ###################################################
     if((is_nan(array_sum($po8_val)/$countpo8))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po8_val)/$countpo8);
     }
     ###################################################
     if((is_nan(array_sum($po9_val)/$countpo9))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po9_val)/$countpo9);
     }
     ###################################################
     if((is_nan(array_sum($po10_val)/$countpo10))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po10_val)/$countpo10);
     }
     ###################################################
     if((is_nan(array_sum($po11_val)/$countpo11))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po11_val)/$countpo11);
     }
     ###################################################
     if((is_nan(array_sum($po12_val)/$countpo12))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($po12_val)/$countpo12);
     }
     ###################################################
     if((is_nan(array_sum($pso1_val)/$countpso1))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($pso1_val)/$countpso1);
     }
     ###################################################
     if((is_nan(array_sum($pso2_val)/$countpso2))==1)
     {
       array_push($po_avg,0);
     }
     else{
     array_push($po_avg,array_sum($pso2_val)/$countpso2);
     }
     ###################################################



     $po_base_avg=array();
     #############################################################
     if((is_nan(array_sum($po1_val_base)/$countpo1))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po1_val_base)/$countpo1);
     }
     #############################################################
     if((is_nan(array_sum($po2_val_base)/$countpo2))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po2_val_base)/$countpo2);
     }
     #############################################################
     if((is_nan(array_sum($po3_val_base)/$countpo3))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po3_val_base)/$countpo3);
     }
     #############################################################
     if((is_nan(array_sum($po4_val_base)/$countpo4))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po4_val_base)/$countpo4);
     }
     #############################################################
     if((is_nan(array_sum($po5_val_base)/$countpo5))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po5_val_base)/$countpo5);
     }
     #############################################################
     if((is_nan(array_sum($po6_val_base)/$countpo6))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po6_val_base)/$countpo6);
     }
     #############################################################
     if((is_nan(array_sum($po7_val_base)/$countpo7))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
      array_push($po_base_avg,array_sum($po7_val_base)/$countpo7);
     }
     #############################################################
     if((is_nan(array_sum($po8_val_base)/$countpo8))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po8_val_base)/$countpo8);
     }
     #############################################################
     if((is_nan(array_sum($po9_val_base)/$countpo9))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po9_val_base)/$countpo9);
     }
     #############################################################
     if((is_nan(array_sum($po10_val_base)/$countpo10))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po10_val_base)/$countpo10);
     }
     #############################################################
     if((is_nan(array_sum($po11_val_base)/$countpo11))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po11_val_base)/$countpo11);
     }
     #############################################################
     if((is_nan(array_sum($po12_val_base)/$countpo12))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($po12_val_base)/$countpo12);
     }
     #############################################################
     if((is_nan(array_sum($pso1_val_base)/$countpso1))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($pso1_val_base)/$countpso1);
     }
     #############################################################
     if((is_nan(array_sum($pso2_val_base)/$countpso2))==1)
     {
       array_push($po_base_avg,0);
     }
     else{
     array_push($po_base_avg,array_sum($pso2_val_base)/$countpso2);
     }
     #############################################################
     //print_r($po_avg);
    //  print_r($po_base_avg);


    //  print_r($filtered_arr_val);
    //  print_r($filtered_arr_base);
    
################################################################################
 $target_avg = array();
  if((is_nan(array_sum($po1map)/$countpo1))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po1map)/$countpo1);
  }
  ###################################################
  if((is_nan(array_sum($po2map)/$countpo2))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po2map)/$countpo2);
  }
  ###################################################
  if((is_nan(array_sum($po3map)/$countpo3))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po3map)/$countpo3);
  }
  ###################################################
  if((is_nan(array_sum($po4map)/$countpo4))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po4map)/$countpo4);
  }
  ###################################################
  if((is_nan(array_sum($po5map)/$countpo5))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po5map)/$countpo5);
  }
  ###################################################
  if((is_nan(array_sum($po6map)/$countpo6))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po6map)/$countpo6);
  }
  ###################################################
  if((is_nan(array_sum($po7map)/$countpo7))==1)
  {
    array_push($target_avg,0);
  }
  else{
   array_push($target_avg,array_sum($po7map)/$countpo7);
  }
  ###################################################
  if((is_nan(array_sum($po8map)/$countpo8))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po8map)/$countpo8);
  }
  ###################################################
  if((is_nan(array_sum($po9map)/$countpo9))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po9map)/$countpo9);
  }
  ###################################################
  if((is_nan(array_sum($po10map)/$countpo10))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po10map)/$countpo10);
  }
  ###################################################
  if((is_nan(array_sum($po11map)/$countpo11))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po11map)/$countpo11);
  }
  ###################################################
  if((is_nan(array_sum($po12map)/$countpo12))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($po12map)/$countpo12);
  }
  ###################################################
  if((is_nan(array_sum($pso1map)/$countpso1))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($pso1map)/$countpso1);
  }
  ###################################################
  if((is_nan(array_sum($pso2map)/$countpso2))==1)
  {
    array_push($target_avg,0);
  }
  else{
  array_push($target_avg,array_sum($pso2map)/$countpso2);
  }
  ###################################################




$po1per=(round(($po_base_avg[0]*100))/$target_avg[0]);
$po2per=(round(($po_base_avg[1]*100))/$target_avg[1]);
$po3per=(round(($po_base_avg[2]*100))/$target_avg[2]);
$po4per=(round(($po_base_avg[3]*100))/$target_avg[3]);
$po5per=(round(($po_base_avg[4]*100))/$target_avg[4]);
$po6per=(round(($po_base_avg[5]*100))/$target_avg[5]);
$po7per=(round(($po_base_avg[6]*100))/$target_avg[6]);
$po8per=(round(($po_base_avg[7]*100))/$target_avg[7]);
$po9per=(round(($po_base_avg[8]*100))/$target_avg[8]);
$po10per=(round(($po_base_avg[9]*100))/$target_avg[9]);
$po11per=(round(($po_base_avg[10]*100))/$target_avg[10]);
$po12per=(round(($po_base_avg[11]*100))/$target_avg[11]);
$pso1per=(round(($po_base_avg[12]*100))/$target_avg[12]);
$pso2per=(round(($po_base_avg[13]*100))/$target_avg[13]);

$po_percent=array();

array_push($po_percent,$po1per,$po2per,$po3per,$po4per,$po5per,$po6per,$po7per,$po8per,$po9per,$po10per,$po11per,$po12per,$pso1per,$pso2per);

// print_r($po_percent);
// print_r($target_avg);






$strong=array();
$weak=array();
$moderate=array();
$notmapped=array();

if($po_percent[0]<50)
{
 array_push($weak,"PO1");
}
elseif($po_percent[0]>50 && $po_percent[0]<80)
{
  array_push($moderate,"PO1");
}
elseif($po_percent[0]>80)
{
 array_push($strong,"PO1");
}
else
{
 array_push($notmapped,"PO1");
}
#############################################################
if($po_percent[1]<50)
{
 array_push($weak,"PO2");
}
elseif($po_percent[1]>50 && $po_percent[1]<80)
{
  array_push($moderate,"PO2");
}
elseif($po_percent[1]>80)
{
 array_push($strong,"PO2");
}
else
{
 array_push($notmapped,"PO2");
}
#############################################################   
if($po_percent[2]<50)
{
 array_push($weak,"PO3");
}
elseif($po_percent[2]>50 && $po_percent[2]<80)
{
  array_push($moderate,"PO3");
}
elseif($po_percent[2]>80)
{
 array_push($strong,"PO3");
}
else
{
 array_push($notmapped,"PO3");
}
#############################################################
if($po_percent[3]<50)
{
 array_push($weak,"PO4");
}
elseif($po_percent[3]>50 && $po_percent[3]<80)
{
  array_push($moderate,"PO4");
}
elseif($po_percent[3]>80)
{
 array_push($strong,"PO4");
}
else
{
 array_push($notmapped,"PO4");
}
#############################################################
if($po_percent[4]<50)
{
 array_push($weak,"PO5");
}
elseif($po_percent[4]>50 && $po_percent[4]<80)
{
  array_push($moderate,"PO5");
}
elseif($po_percent[4]>80)
{
 array_push($strong,"PO5");
}
else
{
 array_push($notmapped,"PO5");
}
#############################################################
if($po_percent[5]<50)
{
 array_push($weak,"PO6");
}
elseif($po_percent[5]>50 && $po_percent[5]<80)
{
  array_push($moderate,"PO6");
}
elseif($po_percent[5]>80)
{
 array_push($strong,"PO6");
}
else
{
 array_push($notmapped,"PO6");
}
#############################################################
if($po_percent[6]<50)
{
 array_push($weak,"PO7");
}
elseif($po_percent[6]>50 && $po_percent[6]<80)
{
  array_push($moderate,"PO7");
}
elseif($po_percent[6]>80)
{
 array_push($strong,"PO7");
}
else
{
 array_push($notmapped,"PO7");
}
#############################################################
if($po_percent[7]<50)
{
 array_push($weak,"PO8");
}
elseif($po_percent[7]>50 && $po_percent[7]<80)
{
  array_push($moderate,"PO8");
}
elseif($po_percent[7]>80)
{
 array_push($strong,"PO8");
}
else
{
 array_push($notmapped,"PO8");
}
#############################################################
if($po_percent[8]<50)
{
 array_push($weak,"PO9");
}
elseif($po_percent[8]>50 && $po_percent[8]<80)
{
  array_push($moderate,"PO9");
}
elseif($po_percent[8]>80)
{
 array_push($strong,"PO9");
}
else
{
 array_push($notmapped,"PO9");
}
#############################################################
if($po_percent[9]<50)
{
 array_push($weak,"PO10");
}
elseif($po_percent[9]>50 && $po_percent[9]<80)
{
  array_push($moderate,"PO10");
}
elseif($po_percent[9]>80)
{
 array_push($strong,"PO10");
}
else
{
 array_push($notmapped,"PO10");
}
#############################################################
if($po_percent[10]<50)
{
 array_push($weak,"PO11");
}
elseif($po_percent[10]>50 && $po_percent[10]<80)
{
  array_push($moderate,"PO11");
}
elseif($po_percent[10]>80)
{
 array_push($strong,"PO11");
}
else
{
 array_push($notmapped,"PO11");
}
#############################################################
if($po_percent[11]<50)
{
 array_push($weak,"PO12");
}
elseif($po_percent[11]>50 && $po_percent[11]<80)
{
  array_push($moderate,"PO12");
}
elseif($po_percent[11]>80)
{
 array_push($strong,"PO12");
}
else
{
 array_push($notmapped,"PO12");
}
#############################################################
if($po_percent[12]<50)
{
 array_push($weak,"PSO1");
}
elseif($po_percent[12]>50 && $po_percent[12]<80)
{
  array_push($moderate,"PSO1");
}
elseif($po_percent[12]>80)
{
 array_push($strong,"PSO1");
}
else
{
 array_push($notmapped,"PSO1");
}
#############################################################
if($po_percent[13]<50)
{
 array_push($weak,"PSO2");
}
elseif($po_percent[13]>50 && $po_percent[13]<80)
{
  array_push($moderate,"PSO2");
}
elseif($po_percent[13]>80)
{
 array_push($strong,"PSO2");
}
else
{
 array_push($notmapped,"PSO2");
}

// print_r($filtered_arr_val);
//  print_r($filtered_arr_base);
// print_r($target_avg);
#############################################################

?>
    <div class="row" style="margin-left: 2.5%; margin-right:1%; margin-bottom: 2%; margin-top:-1.5%;">
      <div class="col-6" style="height:35vh; overflow-y: hidden;overflow-x: auto; border-right: 1px solid rgba(0,0,0,0.2);">

      <table class="table table-striped" id="tablePO">

  <thead>
    <tr>
            <th scope="col"></th>
            <th scope="col">PO1</th>
            <th scope="col">PO2</th>
            <th scope="col">PO3</th>
            <th scope="col">PO4</th>
            <th scope="col">PO5</th>
            <th scope="col">PO6</th>
            <th scope="col">PO7</th>
            <th scope="col">PO8</th>
            <th scope="col">PO9</th>
            <th scope="col">PO10</th>
            <th scope="col">PO11</th>
            <th scope="col">PO12</th>
            <th scope="col">PSO1</th>
            <th scope="col">PSO2</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PO Weighted Average</th>
      <td><?echo round($po_avg[0],2);?></td>
      <td><?echo round($po_avg[1],2);?></td>
      <td><?echo round($po_avg[2],2);?></td>
      <td><?echo round($po_avg[3],2);?></td>
      <td><?echo round($po_avg[4],2);?></td>
      <td><?echo round($po_avg[5],2);?></td>
      <td><?echo round($po_avg[6],2);?></td>
      <td><?echo round($po_avg[7],2);?></td>
      <td><?echo round($po_avg[8],2);?></td>
      <td><?echo round($po_avg[9],2);?></td>
      <td><?echo round($po_avg[10],2);?></td>
      <td><?echo round($po_avg[11],2);?></td>
      <td><?echo round($po_avg[12],2);?></td>
      <td><?echo round($po_avg[13],2);?></td>     
    </tr>
    <tr>
      <th scope="row">PO Threshold Base</th>
      <td><?echo round($po_base_avg[0],2);?></td>
      <td><?echo round($po_base_avg[1],2);?></td>
      <td><?echo round($po_base_avg[2],2);?></td>
      <td><?echo round($po_base_avg[3],2);?></td>
      <td><?echo round($po_base_avg[4],2);?></td>
      <td><?echo round($po_base_avg[5],2);?></td>
      <td><?echo round($po_base_avg[6],2);?></td>
      <td><?echo round($po_base_avg[7],2);?></td>
      <td><?echo round($po_base_avg[8],2);?></td>
      <td><?echo round($po_base_avg[9],2);?></td>
      <td><?echo round($po_base_avg[10],2);?></td>
      <td><?echo round($po_base_avg[11],2);?></td>
      <td><?echo round($po_base_avg[12],2);?></td>
      <td><?echo round($po_base_avg[13],2);?></td>
    </tr> 
  </tbody>

</table>

      </div>
      


      <div class="col-6" style="height:35vh;overflow-y:scroll; overflow-x:auto;">
      <!-- <canvas id="Chart1" width="100%" height="50vh" style="margin-right: 3%"></canvas> -->
      <table class="empty">
        <thead>
        <tr >
        <th scope="col" class="table-success">Strong</th>
        <th scope="col" class="table-warning">Moderate</th>
        <th scope="col" class="table-danger">Weak</th>
        <th scope="col" class="table-primary">Not Mapped</th>
        </tr>
        </thead>
        <tbody>
            <tr>
              <td ><?echo $strong[0];?></td>
              <td ><?echo $moderate[0];?></td>
              <td ><?echo $weak[0];?></td>
              <td ><?echo $notmapped[0];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[1];?></td>
              <td ><?echo $moderate[1];?></td>
              <td ><?echo $weak[1];?></td>
              <td ><?echo $notmapped[1];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[2];?></td>
              <td ><?echo $moderate[2];?></td>
              <td ><?echo $weak[2];?></td>
              <td ><?echo $notmapped[2];?></td>
              
            </tr>
            <tr>
            
              <td ><?echo $strong[3];?></td>
              <td ><?echo $moderate[3];?></td>
              <td ><?echo $weak[3];?></td>
              <td ><?echo $notmapped[3];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[4];?></td>
              <td ><?echo $moderate[4];?></td>
              <td ><?echo $weak[4];?></td>
              <td ><?echo $notmapped[4];?></td>
              
              
            </tr>
            <tr>
              <td ><?echo $strong[5];?></td>
              <td ><?echo $moderate[5];?></td>
              <td ><?echo $weak[5];?></td>
              <td ><?echo $notmapped[5];?></td>
              
            </tr>
            <tr>
              <td ><?echo $strong[6];?></td>
              <td ><?echo $moderate[6];?></td>
              <td ><?echo $weak[6];?></td>
              <td ><?echo $notmapped[6];?></td>
              
            </tr>
            <tr>
            <td ><?echo $strong[7];?></td>
              <td ><?echo $moderate[7];?></td>
              <td ><?echo $weak[7];?></td>
              <td ><?echo $notmapped[7];?></td>
              
            </tr>
            <tr>
            <td ><?echo $strong[8];?></td>
              <td ><?echo $moderate[8];?></td>
              <td ><?echo $weak[8];?></td>
              <td ><?echo $notmapped[8];?></td>
              
            </tr>
            <tr>
            <td ><?echo $strong[9];?></td>
              <td ><?echo $moderate[9];?></td>
              <td ><?echo $weak[9];?></td>
              <td ><?echo $notmapped[9];?></td>
             
            </tr>
            <tr>
            <td ><?echo $strong[10];?></td>
              <td ><?echo $moderate[10];?></td>
              <td ><?echo $weak[10];?></td>
              <td ><?echo $notmapped[10];?></td>
             
            </tr>
            <tr>
            <td ><?echo $strong[11];?></td>
              <td ><?echo $moderate[11];?></td>
              <td ><?echo $weak[11];?></td>
              <td ><?echo $notmapped[11];?></td>
              
            </tr>
            <tr>  
              <td ><?echo $strong[12];?></td>
              <td ><?echo $moderate[12];?></td>
              <td ><?echo $weak[12];?></td>
              <td ><?echo $notmapped[12];?></td>
             
            </tr>
            <tr>
              <td ><?echo $strong[13];?></td>
              <td ><?echo $moderate[13];?></td>
              <td ><?echo $weak[13];?></td>
              <td ><?echo $notmapped[13];?></td>
             
            </tr>
            
        </tbody>
      </table>

     </div>
     
      <button onclick="exportData()" class="btn btn-warning" style="width: 20%;height: 20%; margin-left: 5%; margin-top: 2%;">Download CSV <i class="fa fa-download"></i></button>&nbsp;&nbsp;
      <button class="btn btn-info" onclick="exportData1()" style="width: 20%; height: 20%; margin-right: 5%; margin-top: 2%;">Upload Data <i class="fa fa-upload"></i></button>
      </div>  
      </div>
 <? echo "<script> window.onload = function() {graph()} </script>";   ?>

  </div>
  
   
 <?
}
      ?>
<?}?> 
     
     <div id='result'></div>   
</body>
<script>
function exportData(){


    var table = document.getElementById("tablePO");
 

    var rows =[];
 
 
    for(var i=0,row; row = table.rows[i];i++){
      
      column1 = row.cells[0].innerText;
      column2 = row.cells[1].innerText;
      column3 = row.cells[2].innerText;
      column4 = row.cells[3].innerText;
      column5 = row.cells[4].innerText;
      column6 = row.cells[5].innerText;
      column7 = row.cells[6].innerText;
      column8 = row.cells[7].innerText;
      column9 = row.cells[8].innerText;
      column10 = row.cells[9].innerText;
      column11 = row.cells[10].innerText;
      column12 = row.cells[11].innerText;
      column13 = row.cells[12].innerText;
      column14 = row.cells[13].innerText;
      column15 = row.cells[14].innerText;
    
 
    
        rows.push(
            [
              column1,
              column2,
              column3,
              column4,
              column5,
              column6,
              column7,
              column8,
              column9,
              column10,
              column11,
              column12,
              column13,
              column14,
              column15,
               
            ]
        );
 
        }
        csvContent = "data:text/csv;charset=utf-8,";
         
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });
 
        
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "PO_Attainment_Table.csv");
        document.body.appendChild(link);
         
        link.click();
}

////////////////////////////////////////////////////////////////
function exportData1(){


var table = document.getElementById("tablePO");


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
    column5 = row.cells[4].innerText;
    column6 = row.cells[5].innerText;
    column7 = row.cells[6].innerText;
    column8 = row.cells[7].innerText;
    column9 = row.cells[8].innerText;
    column10 = row.cells[9].innerText;
    column11 = row.cells[10].innerText;
    column12 = row.cells[11].innerText;
    column13 = row.cells[12].innerText;
    column14 = row.cells[13].innerText;
    column15 = row.cells[14].innerText;
    
   


    rows.push(
        [
            column1,
            column2,
            column3,
            column4,
            column5,
            column6,
            column7,
            column8,
            column9,
            column10,
            column11,
            column12,
            column13,
            column14,
            column15,
          
        
        ]
    );

    }
    csvContent = "data:text/csv;charset=utf-8,";
     
    rows.forEach(function(rowArray){
        row = rowArray.join(",");
        csvContent += row + "\r\n";
    });
    
    var data = {id:t_id,subj:sub,semester:sem,years:year,cc:rows};
        $.post("uploadPO.php",data,
        function(data){
            $('#result').html(data)
        });
  // console.log(rows);
  // // console.log(sub);
  // // console.log(sem);
  // // console.log(year);
  

 
}

</script>

<!-- <script type="text/javascript">
function graph2(){
    var ctx = document.getElementById('Chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['PO1', 'PO2', 'PO3', 'PO4', 'PO5', 'PO6', 'PO7',
                     'PO8', 'PO9', 'PO10', 'PO11', 'PO12', 'PSO1', 'PSO2'],
            datasets: [{
                label: 'PO Weighted Average Achieved',
                data: <?php echo json_encode($po_avg, JSON_NUMERIC_CHECK); ?>,
                backgroundColor: 
                    'rgba(75, 192, 192, 0.2)',
                borderColor: 
                  'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },{
                label: 'Target',
                data: <?php echo json_encode($target_avg, JSON_NUMERIC_CHECK); ?>,
                type: 'bar',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor:'rgba(255, 206, 86, 1)',
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


<script type="text/javascript">
function graph(){
    var ctx = document.getElementById('Chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['PO1', 'PO2', 'PO3', 'PO4', 'PO5', 'PO6', 'PO7',
                     'PO8', 'PO9', 'PO10', 'PO11', 'PO12', 'PSO1', 'PSO2'],
            datasets: [{
                label: 'PO Weighted Average',
                data: <?php echo json_encode($po_avg, JSON_NUMERIC_CHECK); ?>,
                backgroundColor: 
                    'rgba(75, 192, 192, 0.2)',
                borderColor: 
                  'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },{
                label: 'PO Threshold Base',
                data: <?php echo json_encode($po_base_avg, JSON_NUMERIC_CHECK); ?>,
                type: 'bar',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor:'rgba(255, 206, 86, 1)',
                borderWidth: 1.5,
                // this dataset is drawn on top
                order: 2
            }]
        },
        options: {
            legend: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
});}
</script> -->


<!-- <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script type="text/javascript">

$(function() {
  $(".table table-striped").each(hideCellIfEmpty);
});

function hideCellIfEmpty() {
  var theCell = $(this);
  if (theCell.html().length == 0) {
    hideSoft(theCell);
  }
}

function hideSoft(jQElement) {
  jqElement.css('visibility', 'hidden');
}
    </script>  -->

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