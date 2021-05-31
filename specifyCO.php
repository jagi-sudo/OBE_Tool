<html>
<?php
// Start the session
session_start();
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
$result1 = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
$result2 = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));

#print_r($row);
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"style="font-size:110%;"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link" href="reports.php"style="font-size:110%;"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
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
                  <?php if($_SESSION['desgn']==3){?>
                    <a class="nav-link" href="#" onclick=login_error() style="color: black; display: none">Set Curriculum</a>
                    <a class="nav-link" href="#" onclick=login_error() style="color: black; display: none">Specify PO</a>
                  <?php
                  }else
                  {?>
                   <?php if($desgn=='HOD'){ echo'<a class="nav-link" href="curriculum.php" style="color: black;">Set Curriculum</a>
                  <a class="nav-link" href="specifyPO.php" style="color: black;">Specify PO</a>';}?>
                  <?}?>
                    <a class="nav-link active" href="specifyCO.php" style="color: #007bff;font-weight: bold;">Specify CO </a>
                    <a class="nav-link" href="COPOMapping.php" style="color: black;">CO-PO Mapping</a>
                    <a class="nav-link" href="MarksCOMapping.php" style="color: black;">Marks-CO Mapping</a>
                    <a class="nav-link" href="MarksData.php" style="color: black;">Marks Data</a>



                    
                 </nav>
                </div>
                <div class='col-10' style=" margin-right:auto; margin-top:-8%; ">
                <div class="container-fluid">
                  <div class="row">
                  <form class="needs-validation" method="post" action="" novalidate>
                  <div class="form-row" style="margin: 2%">
                  <div class="form-group" style="margin-right: 2%">
                  <select name="course" class="form-control custom-select" required>
                    <option value="" disabled selected>Choose Course</option>
                    <?php
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <option><?echo "Subject : ".$row['sub_name']." ".$row['subject-code']." Semester : ".$row['semester']." || Year : ".$row['year']; ?></option>
                      <?}?>
                  </select>
                  </div>
                  <button type="submit" name="show_co" class="btn btn-primary">View CO Specifications</button>
                  </div>
                  </form>
                  </div>
                  </div>
                  <?if(isset($_POST['show_co'])){?>
                    <div style="height:50vh; overflow-y: scroll">
                        <?php
                        $sub=explode(" ",$_POST['course'])[2];
                        $sub_code=explode(" ",$_POST['course'])[3];
                        $sem=explode(" ",$_POST['course'])[6];
                        $year=explode(" ",$_POST['course'])[10];
                        $search_query="SELECT `co1`, `co2`, `co3`, `co4`, `co5`, `co6` FROM `co_db`  WHERE `branch`='$branch' and
                         `sub_name`='$sub' and `sub_code`='$sub_code' and `sem`='$sem' and  `year`='$year' ";
                        $search_result= mysqli_query($conn,$search_query) or die("ERROR".mysqli_error($conn));
                        $search_row = mysqli_fetch_array($search_result);     
                        if(empty($search_row))
                        {
                          echo '<div class="alert alert-danger" role="alert" style="margin-left: 1%">
                          Please add the Course Outcomes for this subject !!!
                        </div>';
                        }
                        else{
                        ?>
                      <table class="table table-striped" style="margin-left: 1%">
                      <thead style="background-color:white;position: sticky; top: 0;">
                        <tr>
                          <th scope="col">CO Code</th>
                          <th scope="col">Course Outcome</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <th scope="row">CO1</th>
                        <td><?echo $search_row['co1']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CO2</th>
                          <td><?echo $search_row['co2']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CO3</th>
                          <td><?echo $search_row['co3']?></td>
                        </tr>  
                        <tr>
                        <th scope="row">CO4</th>
                        <td><?echo $search_row['co4']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CO5</th>
                          <td><?echo $search_row['co5']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CO6</th>
                          <td><?echo $search_row['co6']?></td>
                        </tr>                                       
                      </tbody>
                    </table>
                    </div>
                  <?}
                  }
                  else{
                  ?>
                  <div class="alert alert-info" role="alert" style="margin-left: 1%">
                  Please enter the above details to view the CO specifications
                  </div>
                 <? }?>
                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#add_co" style="margin-left: 1%;margin-top:1%;margin-right:2%">Add Course Outcomes</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update_allo" style="margin-top:1%;">Update Course Outcomes</button>

              <!-- Modal -->
                  <div class="modal fade" id="add_co" tabindex="-1">
                    <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Course Outcomes</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form class="needs-validation" method="post" action="" style="margin:0;" novalidate>
                        <div class="modal-body" style="height:400px; overflow-y: scroll">
                        <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Course</label>
                          <select name="course" class="form-control custom-select" required>
                            <option value="" disabled selected>Choose Course</option>
                            <?php
                              while($row2 = mysqli_fetch_array($result1)){
                            ?>
                            <option><?echo "Subject : ".$row2['sub_name']." ".$row2['subject-code']." Semester : ".$row2['semester']." || Year : ".$row2['year']; ?></option>
                              <?}?>
                          </select>
                        </div>
                      </div>
                        <hr>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO1-Description</label>
                          <input type="text" class="form-control" name="co1" placeholder="CO1-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO2-Description</label>
                          <input type="text" class="form-control" name="co2" placeholder="CO2-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO3-Description</label>
                          <input type="text" class="form-control" name="co3" placeholder="CO3-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO4-Description</label>
                          <input type="text" class="form-control" name="co4" placeholder="CO4-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO5-Description</label>
                          <input type="text" class="form-control" name="co5" placeholder="CO5-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>CO6-Description</label>
                          <input type="text" class="form-control" name="co6" placeholder="CO6-Description" required>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="add_co">Add Course Outcome</button>
                        </div>
                        </form>
                        <?php
                        if (isset($_POST['add_co'])){
                          $sub=explode(" ",$_POST['course'])[2];
                          $sub_code=explode(" ",$_POST['course'])[3];
                          $sem=explode(" ",$_POST['course'])[6];
                          $year=explode(" ",$_POST['course'])[10];
                        $co1=$_POST['co1'];
                        $co2=$_POST['co2'];
                        $co3=$_POST['co3'];
                        $co4=$_POST['co4'];
                        $co5=$_POST['co5'];
                        $co6=$_POST['co6'];
                        $add_query="INSERT INTO `co_db`(`branch`, `sub_name`, `sub_code`, `sem`, `year`, `co1`, `co2`, `co3`, `co4`, `co5`, `co6`) VALUES
                         ('$branch','$sub','$sub_code','$sem','$year','$co1','$co2','$co3','$co4','$co5','$co6')";
                         $add_result = mysqli_query($conn,$add_query) or die("ERROR".mysqli_error($conn));
                        $dash_query = "UPDATE `dash_data` SET `co_spec`= 1  
                        WHERE `t_id`='$id' and `sub`='$sub' and `branch`='$branch' and `sem`='$sem' and  `year`='$year' ";
                        $dash_result = mysqli_query($conn,$dash_query) or die("ERROR".mysqli_error($conn));
                          echo'<script>alert("Record added Successfully")</script>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
              
              <!-- Modal -->
              <div class="modal fade" id="update_allo" tabindex="-1">
                    <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Course Outcomes</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form class="needs-validation" method="post" action="" style="margin:0;" novalidate>
                        <div class="modal-body" style="height:400px; overflow-y: scroll">
                        <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Course</label>
                          <select name="course" class="form-control custom-select" required>
                            <option value="" disabled selected>Choose Course</option>
                            <?php
                              while($row2 = mysqli_fetch_array($result2)){
                            ?>
                            <option><?echo "Subject : ".$row2['sub_name']." ".$row2['subject-code']." Semester : ".$row2['semester']." || Year : ".$row2['year']; ?></option>
                              <?}?>
                          </select>
                        </div>
                      </div>
                        <hr>
                        <div class="alert alert-warning" role="alert">
                          Only enter the CO's you want to update !!!!
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO1-Description</label>
                          <input type="text" class="form-control" name="co1" placeholder="CO1-Description"   >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO2-Description</label>
                          <input type="text" class="form-control" name="co2" placeholder="CO2-Description"   >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO3-Description</label>
                          <input type="text" class="form-control" name="co3" placeholder="CO3-Description"   >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO4-Description</label>
                          <input type="text" class="form-control" name="co4" placeholder="CO4-Description"   >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>CO5-Description</label>
                          <input type="text" class="form-control" name="co5" placeholder="CO5-Description"   >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>CO6-Description</label>
                          <input type="text" class="form-control" name="co6" placeholder="CO6-Description"   >
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-warning" name="upd_co">Add Course Outcome</button>
                        </div>
                        </form>
                        <?php
                        if (isset($_POST['upd_co'])){
                          $sub=explode(" ",$_POST['course'])[2];
                          $sub_code=explode(" ",$_POST['course'])[3];
                          $sem=explode(" ",$_POST['course'])[6];
                          $year=explode(" ",$_POST['course'])[10];
                        $co1=$_POST['co1'];
                        $co2=$_POST['co2'];
                        $co3=$_POST['co3'];
                        $co4=$_POST['co4'];
                        $co5=$_POST['co5'];
                        $co6=$_POST['co6'];

                  $upd_query="UPDATE `co_db` 
                  set 
                  `co1` = case when '$co1' = '' then `co1` else '$co1' end,
                  `co2` = case when '$co2' = '' then `co2` else '$co2' end,
                  `co3` = case when '$co3' = '' then `co3` else '$co3' end,
                  `co4` = case when '$co4' = '' then `co4` else '$co4' end,
                  `co5` = case when '$co5' = '' then `co5` else '$co5' end,
                  `co6` = case when '$co6' = '' then `co6` else '$co6' end
                    WHERE `branch`='$branch' and `sub_name`='$sub' and `sub_code`='$sub_code' and `sem`='$sem' and  `year`='$year' ";
                        
                         $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
                          echo'<script>alert("Record Updated Successfully")</script>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
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




<script>
	function login_error() {
	alert("Function not available");
	}
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