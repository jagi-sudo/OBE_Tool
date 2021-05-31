<!DOCTYPE html>
<?php
// Start the session
session_start();
$desgn=$_SESSION["desgn"];
$branch=$_SESSION["branch"];
$id = $_SESSION['user_id'];
$host="localhost";
$user="root";
$pass="";
$db="college_project";
$conn=new mysqli($host,$user,$pass,$db);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"></a>
                   
                <div><img src="images/logo.png" style="margin-right:-15%; height:120px; width:200px; position:relative; top: -50px;" alt="obe tool"></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar" style="margin-top:10%;">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php" style="font-size:110%"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link" href="reports.php"style="font-size:110%"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation">
                    <?php 
                      if($desgn=="HOD")
                      {
                        echo '<a class="nav-link" href="curriculum.php" style="font-size:110%">';
                      }
                      else
                      {
                        echo'<a class="nav-link" href="specifyCO.php"style="font-size:110%;">';
                      }
                      ?>
                    <i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><?if($desgn=="HOD"){ echo '<a class="nav-link" href="download_reports.php"style="font-size:110%"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a>';}?><a class="nav-link" href="UserProfile.php"style="font-size:110%"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
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
                    <h3 >Dashboard</h3>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                            
                            <a class="dropdown-toggle nav-link" style="color:black;" data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="images/hi.png"/>&nbsp;&nbsp;<?php echo '<strong>'.$_SESSION["f_name"].' '.$_SESSION["s_name"].'</strong>'?><span class="d-none d-lg-inline mr-2 text-gray-600 small"></span></a>
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
                    <form class="needs-validation" method="post" action="" novalidate>
            <div class="form-row" style="margin-top: -6%">
            <div class="form-group" style="margin-left: 0.5%;margin-right:1%">
                <select name="course" class="form-control custom-select" required>
                  <option value="" disabled selected>Choose Course</option>
                  <?php
                  if($desgn=="Teacher")
                  {
                    $q_sub="SELECT * FROM `dash_data` WHERE t_id='$id'";
                  }
                  else if($desgn=="HOD"){
                    $q_sub="SELECT * FROM `dash_data` WHERE 1";
                  }
                  $sub_display = mysqli_query($conn,$q_sub) or die("ERROR".mysqli_error($conn));
                    while($row1 = mysqli_fetch_array($sub_display)){
                  ?>
                <option name="details"><?echo "Subject : ".$row1['sub']." ".$row1['subject-code']." Semester : ".$row1['sem']." || Year : ".$row1['year']; ?></option>
                    <?}?>
                </select>
              </div>
              <div class="form-group" style="margin-right: 1%">
              <button class="btn btn-success" name="search">Search</button>
              </div>
              <div class="form-group">
              <button class="btn btn-danger" name="remove">Remove from Dashboard</button>
              </div>
              </div>
         </form>
        <div class="row" >
          <div class='col-12' style="height:60vh; overflow-y: scroll;">
          <table class="table table-striped">
            <thead style="background-color:white;position: sticky; top: 0;">
              <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Subject</th>
                <th scope="col"<?if($desgn=="Teacher"){echo'style="display: none"';}?>>Teacher</th>
                <th scope="col">Semester-Year</th>
                <th scope="col">CO Specification</th>
                <th scope="col">PO Specification</th>
                <th scope="col">CO-PO Mapping</th>
                <th scope="col">Marks Mapping</th>
                <?php
                if($desgn=="HOD"){
                  echo '<th scope="col">Send Alert</th>';
                }
                ?>
              </tr>
            </thead>
            <?php  
            
            if($desgn=="Teacher"){
              $q_disp="SELECT * FROM `dash_data` WHERE t_id='$id'";
            }
            else if($desgn=="HOD"){
              $q_disp="SELECT * FROM `dash_data` WHERE branch='$branch'";
            }
            if(isset($_POST['search'])){
              $sub=explode(" ",$_POST['course'])[2];
              $sub_code=explode(" ",$_POST['course'])[3];
              $sem=explode(" ",$_POST['course'])[6];
              $year=explode(" ",$_POST['course'])[10];
              $q_disp="SELECT * FROM `dash_data` WHERE sub='$sub' AND sem='$sem' AND year='$year' AND branch='$branch'";
            }
                  $result_display = mysqli_query($conn,$q_disp) or die("ERROR".mysqli_error($conn));
                  $no=1;
                  while ( $row_display = mysqli_fetch_array($result_display) )
                    {
                    ?>
                    <tr>
                    <td><?echo $no; ?></td>
                    <td><?echo $row_display['sub']; ?></td>
                    <td <?if($desgn=="Teacher"){echo'style="display: none"';}?>><?echo $row_display['f_name']." ".$row_display['s_name']; ?></td>
                    <td><?echo "Semester : ".$row_display['sem']." || Year : ".$row_display['year']; ?></td>
                    <td><?php
                    if($row_display['co_spec']==1){echo '<i class="fas fa-check-circle"></i>';}
                    else{echo '<i class="fas fa-times-circle"></i>';}
                      ?>
                    </td>
                    <td><?php
                    if($row_display['po_spec']==1){echo '<i class="fas fa-check-circle"></i>';}
                    else{echo '<i class="fas fa-times-circle"></i>';}
                      ?>
                    </td>
                    <td><?php
                    if($row_display['co_po_map']==1){echo '<i class="fas fa-check-circle"></i>';}
                    else{echo '<i class="fas fa-times-circle"></i>';}
                      ?>
                    </td>
                    <td><?php
                    if($row_display['marks_map']==1){echo '<i class="fas fa-check-circle"></i>';}
                    else{echo '<i class="fas fa-times-circle"></i>';}
                      ?>
                    </td>
                    <?php
                if($desgn=="HOD"){?>
                  <td scope="col">
                  <button type="button" class="btn btn-primary" onclick="setEventId('<?php echo $row_display['t_id'] ?>',
                                                                                    '<?php echo $row_display['sub'] ?>',
                                                                                    '<?php echo 'Semester : '.$row_display['sem'].' || Year : '.$row_display['year']; ?>',
                                                                                    '<?echo $row_display['f_name'].' '.$row_display['s_name']; ?>',
                                                                                    '<?echo $branch; ?>')"
                  data-toggle="modal" data-target="#alert_modal" name="alert">Send</button>
                  </td>
                <?}?>
                  </tr>
                  <?php
                  $no = $no +1;
                  }?>
          </table>
        </div>
    </div> 
  </div>
  <div class="modal fade" id="alert_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alerts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
       <h6><strong>Teacher-Id</strong> : <span id='t_id'></span></h6>
       <h6><strong>Teacher</strong> : <span id='t_name'></span></h6>
       <h6><strong>Course</strong> : <span id='sub'></span>  <span id='sem'></span></h6>
       <div class="form-group">
          <textarea class="form-control" id="msg" name="msg" rows="3" placeholder="You can enter any personalized alert for the teacher over here !!!"></textarea>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary"  onclick="passVal()" data-dismiss="modal">Send Alert</button>
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


<?php

if(isset($_POST['remove']))
{
 
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];
  
    $del_query = "DELETE FROM `dash_data` WHERE sub='$sub' AND sem='$sem' AND year='$year' AND branch='$branch'";

    $del_result_dash = mysqli_query($conn,$del_query) or die("ERROR".mysqli_error($conn));

    if(isset($del_result_dash))
    {
      echo '<script>alert("Entry Removed From Dashboard Successfully!");
      window.location = ("dashboard.php");
      </script>';
    }
}


?>
















    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js?h=83e266cb1712b47c265f77a8f9e18451"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js?h=e46528792882c54882f660b60936a0fc"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js?h=6d33b44a6dcb451ae1ea7efc7b5c5e30"></script>
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
<script type="text/javascript">
var teacher_id;
var subject;
var semester;
var name;
var dept;
    function setEventId(t_id,sub,sem,t_name,branch){
      document.querySelector("#t_id").innerHTML = t_id;
      document.querySelector("#sub").innerHTML = sub;
      document.querySelector("#sem").innerHTML = sem;
      document.querySelector("#t_name").innerHTML = t_name; 
      teacher_id=t_id;
      subject=sub;
      semester=sem;
      dept=branch;
    }
    function current(){
      alert("Under Development !!")
    }
    
    function passVal(){
       var msg = document.getElementById("msg").value;
       var data = {sub:subject,sem:semester,t_id:teacher_id,branch:dept,mess:msg};
        $.post("alert_insert.php",data,
        function(data){
            $('#result').html(data)
        });
    }
   </script>
   <div id='result'></div>
</body>

</html>