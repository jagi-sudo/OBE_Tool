<html>
<?php
// Start the session
  session_start();
  $host="localhost";
  $user="root";
  $pass="";
  $db="college_project";
  $conn=new mysqli($host,$user,$pass,$db);
  $branch_hod=$_SESSION['branch'];
  $desgn=$_SESSION['desgn'];
  $query="SELECT COUNT(*) FROM $branch_hod WHERE 1";
  $teacher_query="SELECT * FROM `teacher_acc_db` WHERE branch='$branch_hod'";
  $teacher_result=mysqli_query($conn,$teacher_query) or die("ERROR".mysqli_error($conn));
  $teacher_result1=mysqli_query($conn,$teacher_query) or die("ERROR".mysqli_error($conn));
  $result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
  $result1 = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  $row1 = mysqli_fetch_array($result1);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Curriculum</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php" style="font-size:110%;"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link" href="reports.php"style="font-size:110%;"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="curriculum.php"style="font-size:110%;"><i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><?if($desgn=="HOD"){ echo'<a class="nav-link" href="download_reports.php"style="font-size:110%;"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a>';}?><a class="nav-link" href="UserProfile.php"style="font-size:110%;"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
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
                    <h3>Curriculum</h3>
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
          <?php if($desgn=='HOD'){ echo'<a class="nav-link" href="curriculum.php" style="color:#007bff ; font-weight: bold;">Set Curriculum</a>';
           echo'<a class="nav-link" href="specifyPO.php" style="color: black;">Specify PO</a> ';}
          ?>



          <a class="nav-link active" href="specifyCO.php" style="color: black;">Specify CO </a>
          <a class="nav-link" href="COPOMapping.php" style="color: black;">CO-PO Mapping</a>
          <a class="nav-link" href="MarksCOMapping.php" style="color: black;">Marks-CO Mapping</a>
          <a class="nav-link" href="MarksData.php" style="color: black;">Marks Data</a>
        </nav>
        </div>
        <div class='col-10'>
          <div class="container-fluid">
              <div class="row">
                <div style="margin-top: 1%;">
                  <?php
                  if($row['COUNT(*)'] == 0){
                    echo '<div class="alert alert-danger" role="alert">
                    No data of allocation found in the Database !!!!
                    </div>';}
                    else{
                      echo '<p style="font-weight:bold;font-size: large;">Allocation Details:</p>';
                    }
                    ?>
                  </div>
              </div>
              <?php
              if ($row['COUNT(*)'] !=0 ){?>
                  <div class="row" style="height:60vh; overflow-y: scroll">
                  <table class="table table-striped">
                  <thead style="background-color:white;position: sticky; top: 0;">
                  <tr>
                    <th scope="col">Sr NO</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Year</th>
                  </tr>
                  </thead>
                  <?php  
                  $q_disp="SELECT * FROM $branch_hod WHERE 1";
                  $result_display = mysqli_query($conn,$q_disp) or die("ERROR".mysqli_error($conn));
                  $no=1;
                  while ( $row_display = mysqli_fetch_array($result_display) )
                    {
                    ?>
                    <tr>
                    <td><?echo $no; ?></td>
                    <td><?echo $row_display['sub_name']; ?></td>
                    <td><?echo $row_display['Teacher-fname'].' '.$row_display['Teacher-sname']; ?></td>
                    <td><?echo $row_display['semester']; ?></td>
                    <td><?echo $row_display['year']; ?></td>
                  </tr>
                  <?php
                  $no = $no +1;
                  }}?>
                    </table>
                  </div>
              
              <div class="row" style="margin-top:3%">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_allo" style="margin-right: 2%">Add Allocation</button>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update_allo" style="margin-right: 2%">Edit Allocation Details</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#remove_allo">Remove Allocation</button>
              </div>
          </div>
        </div>
        </div>
     </div>

<div class="modal fade" id="add_allo" tabindex="-1">
    <div class="modal-dialog" role="document" style="max-width:40%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Allocation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" method="post" action="" novalidate style="margin:0;" >
        <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-4">
          <label >Teacher</label>
          <select name="t_id" class="form-control custom-select" required>
                    <option value="" disabled selected>Assign Teacher</option>
                <?php
                        while($row = mysqli_fetch_array($teacher_result)){
                      ?>
                        <option><?echo $row['f_name']." ".$row['s_name']." : ".$row['EMAIL']; ?></option>
                <?}?>
                </select>
          </div>
          <div class="form-group col-md-4">
            <label >Subject</label>
            <input type="text" class="form-control" name="sub" placeholder="Subject" required>
          </div>
          <div class="form-group col-md-4">
            <label>Course Type</label>
            <select name="type" class="form-control custom-select" required>
              <option value="" disabled selected>Course Type</option>
              <option>Theory</option>
              <option>Lab</option>
              
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Subject Code</label>
            <input type="text" class="form-control" name="sub_code" placeholder="Subject Code" required>
          </div>
          <div class="form-group col-md-4">
            <label>Year</label>
            <select name="year" class="form-control custom-select" required>
              <option value="" disabled selected>Choose Year</option>
              <option>2015-16</option>
              <option>2016-17</option>
              <option>2017-18</option>
              <option>2018-19</option>
              <option>2019-20</option>
              <option>2020-21</option>
              <option>2021-22</option>
              <option>2022-23</option>
              <option>2023-24</option>
              <option>2024-25</option>
              <option>2025-26</option>

            </select>
          </div>
          <div class="form-group col-md-4">
            <label>Semester</label>
            <select name="sem" class="form-control custom-select" required>
              <option value="" disabled selected>Choose Semester</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
          </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="add_alloc" class="btn btn-success">Add Allocation</button>
            </div>
       </form>
    </div>
  </div>
</div>

<div class="modal fade" id="update_allo" tabindex="-1">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Allocation Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" method="post" action="" style="margin:0;"  novalidate >
        <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
          <label >Allocation</label>
            <select name="upd_course" class="form-control custom-select" required>
                      <option value="" disabled selected>Select Allocation</option>
                  <?php
                          $q_disp1="SELECT * FROM $branch_hod WHERE 1";
                          $result1 = mysqli_query($conn,$q_disp1) or die("ERROR".mysqli_error($conn));
                          while($row2 = mysqli_fetch_array($result1)){
                        ?>
                          <option><?echo $row2['teacher_id']." || ".$row2['sub_name']." - ".$row2['semester']." : ".$row2['year']; ?></option>
                  <?}?>
            </select>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-md-4">
          <label >Teacher</label>
          <select name="t_id" class="form-control custom-select" required>
                    <option value="" disabled selected>Assign Teacher</option>
                <?php
                        while($row = mysqli_fetch_array($teacher_result1)){
                      ?>
                        <option><?echo $row['f_name']." ".$row['s_name']." : ".$row['EMAIL']; ?></option>
                <?}?>
                </select>
          </div>
          <div class="form-group col-md-4">
            <label >Subject</label>
            <input type="text" class="form-control" name="sub" placeholder="Subject" required>
          </div><div class="form-group col-md-4">
            <label>Course Type</label>
            <select name="type" class="form-control custom-select" required>
              <option value="" disabled selected>Course Type</option>
              <option>Theory</option>
              <option>Lab</option>
              
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Subject Code</label>
            <input type="text" class="form-control" name="sub_code" placeholder="Subject Code" required>
          </div>
          <div class="form-group col-md-4">
            <label>Year</label>
            <select name="year" class="form-control custom-select" required>
              <option value="" disabled selected>Choose Year</option>
              <option>2015-16</option>
              <option>2016-17</option>
              <option>2017-18</option>
              <option>2018-19</option>
              <option>2019-20</option>
              <option>2020-21</option>
              <option>2021-22</option>
              <option>2022-23</option>
              <option>2023-24</option>
              <option>2024-25</option>
              <option>2025-26</option>

            </select>
          </div>
          <div class="form-group col-md-4">
            <label>Semester</label>
            <select name="sem" class="form-control custom-select" required>
              <option value="" disabled selected>Choose Semester</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
          </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="update_alloc" class="btn btn-warning">Update Changes</button>
            </div>
       </form>
    </div>
  </div>
</div>





<div class="modal fade" id="remove_allo" tabindex="-1">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Remove Allocation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" method="post" action="" style="margin:0;"  novalidate >
        <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
          <label >Allocation</label>
            <select name="remove_course" class="form-control custom-select" required>
                      <option value="" disabled selected>Select Allocation</option>
                  <?php
                          $q_disp1="SELECT * FROM $branch_hod WHERE 1";
                          $result1 = mysqli_query($conn,$q_disp1) or die("ERROR".mysqli_error($conn));
                          while($row2 = mysqli_fetch_array($result1)){
                        ?>
                          <option><?echo $row2['teacher_id']." || ".$row2['sub_name']." - ".$row2['semester']." : ".$row2['year']; ?></option>
                  <?}?>
            </select>
          </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="remove_alloc" class="btn btn-danger">Remove Allocation</button>
            </div>
       </form>
    </div>
  </div>
</div>


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



      <?php
  if(isset($_POST['add_alloc'])){
  $t_id_orig=$_POST['t_id'];
  $t_id=explode(" ",$t_id_orig)[3];
  $sub=$_POST['sub'];
  $year=$_POST['year'];
  $sub_code=$_POST['sub_code'];
  $sem=$_POST['sem'];
  $sub_query1="SELECT * FROM `teacher_acc_db` WHERE EMAIL='$t_id'";
  $sub_result1 = mysqli_query($conn,$sub_query1) or die("ERROR".mysqli_error($conn));
  $sub_row = mysqli_fetch_array($sub_result1);
  $fname = $sub_row['f_name'];
  $sname = $sub_row['s_name'];
  $labname = $sub.'-LAB';

  if($_POST['type']=='Lab'){
  $sub_query2= "INSERT INTO $branch_hod
  (`Teacher-fname`, `Teacher-sname`, `sub_name`, `teacher_id`, `year`, `semester`, `subject-code`) VALUES 
  ('$fname','$sname','$labname','$t_id','$year','$sem','$sub_code')";
  $sub_result2 = mysqli_query($conn,$sub_query2) or die("ERROR".mysqli_error($conn));
  $sub_query3="INSERT INTO `dash_data`(`t_id`,`f_name`,`s_name`,`sub`, `subject-code`, `sem`, `year`, `branch`, `co_spec`, `po_spec`, `co_po_map`, `marks_map`) 
                    VALUES ('$t_id','$fname','$sname','$labname','$sub_code','$sem','$year','$branch_hod',0,0,0,0)";
  $sub_result3 = mysqli_query($conn,$sub_query3) or die("ERROR".mysqli_error($conn));
  echo '<script>alert("Allocation Successful")
  window.location = ("curriculum.php");
  </script>';
    }

    if($_POST['type']=='Theory'){
      $sub_query2= "INSERT INTO $branch_hod
      (`Teacher-fname`, `Teacher-sname`, `sub_name`, `teacher_id`, `year`, `semester`, `subject-code`) VALUES 
      ('$fname','$sname','$sub','$t_id','$year','$sem','$sub_code')";
      $sub_result2 = mysqli_query($conn,$sub_query2) or die("ERROR".mysqli_error($conn));
      $sub_query3="INSERT INTO `dash_data`(`t_id`,`f_name`,`s_name`,`sub`, `subject-code`, `sem`, `year`, `branch`, `co_spec`, `po_spec`, `co_po_map`, `marks_map`) 
                        VALUES ('$t_id','$fname','$sname','$sub','$sub_code','$sem','$year','$branch_hod',0,0,0,0)";
      $sub_result3 = mysqli_query($conn,$sub_query3) or die("ERROR".mysqli_error($conn));
      echo '<script>alert("Allocation Successful")
  window.location = ("curriculum.php");
  </script>';
        }
  }
  
?>






<?php
  if(isset($_POST['update_alloc']))
  {
    $del_id=explode(" ",$_POST['upd_course'])[0];
    $del_sub=explode(" ",$_POST['upd_course'])[2];
    $del_sem=explode(" ",$_POST['upd_course'])[4];
    $del_year=explode(" ",$_POST['upd_course'])[6];

    $f_name=explode(" ",$_POST['t_id'])[0];
    $s_name=explode(" ",$_POST['t_id'])[1];
    $t_id=explode(" ",$_POST['t_id'])[3];
    $sub=$_POST['sub'];
    $sub_code=$_POST['sub_code'];
    $year=$_POST['year'];
    $sem=$_POST['sem'];
    $labname = $sub.'-LAB';

    if($_POST['type']=='Lab'){
    $upd_query ="UPDATE $branch_hod set `Teacher-fname`='$f_name',`Teacher-sname`='$s_name',
                `sub_name`='$labname',`teacher_id`='$t_id',`year`='$year',`semester`='$sem',`subject-code`='$sub_code'
                WHERE sub_name='$del_sub' AND teacher_id='$del_id' AND semester='$del_sem' AND year='$del_year'";

    $upd_query1="UPDATE `dash_data` set `f_name`='$f_name',`s_name`='$s_name',
                `sub`='$labname',`t_id`='$t_id',`year`='$year',`sem`='$sem', `subject-code`='$sub_code',`branch`= '$branch_hod', `co_spec`= '0', `po_spec`='0', `co_po_map`='0', `marks_map`='0'
                WHERE sub='$del_sub' AND t_id='$del_id' AND sem='$del_sem' AND year='$del_year'";


    
    $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
    $upd_result1 = mysqli_query($conn,$upd_query1) or die("ERROR".mysqli_error($conn));

    if(isset($upd_query) || isset($upd_query1)){
      echo '<script>alert("Allocation Details Updated Successfully");
      window.location = ("curriculum.php");
      </script>';
    }

    }


    
    if($_POST['type']=='Theory'){
      $upd_query ="UPDATE $branch_hod set `Teacher-fname`='$f_name',`Teacher-sname`='$s_name',
                  `sub_name`='$sub',`teacher_id`='$t_id',`year`='$year',`semester`='$sem',`subject-code`='$sub_code'
                  WHERE sub_name='$del_sub' AND teacher_id='$del_id' AND semester='$del_sem' AND year='$del_year'";
  
      $upd_query1="UPDATE `dash_data` set `f_name`='$f_name',`s_name`='$s_name',
                  `sub`='$sub',`t_id`='$t_id',`year`='$year',`sem`='$sem', `subject-code`='$sub_code',`branch`= '$branch_hod', `co_spec`= '0', `po_spec`='0', `co_po_map`='0', `marks_map`='0'
                  WHERE sub='$del_sub' AND t_id='$del_id' AND sem='$del_sem' AND year='$del_year'";
  
  
      
      $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
      $upd_result1 = mysqli_query($conn,$upd_query1) or die("ERROR".mysqli_error($conn));
  
      if(isset($upd_query) || isset($upd_query1)){
        echo '<script>alert("Allocation Details Updated Successfully");
        window.location = ("curriculum.php");
        </script>';
      }
  
      }
      
    
    
    
  }
?>



<?php
  if(isset($_POST['remove_alloc']))
  {
   
    $del_id=explode(" ",$_POST['remove_course'])[0];
    $del_sub=explode(" ",$_POST['remove_course'])[2];
    $del_sem=explode(" ",$_POST['remove_course'])[4];
    $del_year=explode(" ",$_POST['remove_course'])[6];

    $f_name=explode(" ",$_POST['t_id'])[0];
    $s_name=explode(" ",$_POST['t_id'])[1];
    $t_id=explode(" ",$_POST['t_id'])[3];

    $sql = "DELETE FROM $branch_hod WHERE sub_name='$del_sub' AND teacher_id='$del_id' AND semester='$del_sem' AND year='$del_year'";
   
    

    $delete_result = mysqli_query($conn,$sql) or die("ERROR".mysqli_error($conn));
  


    if(isset($delete_result)){
      echo '<script>alert("Allocation Removed Successfully!");
      window.location = ("curriculum.php");
      </script>';


    }
  }
?>





















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