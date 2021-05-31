<html>
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
if($desgn=="HOD"){$post='Head of Department';}
else{$post='Teacher';}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Profile</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"style="font-size:110%;"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link" href="reports.php"style="font-size:110%;"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation">
                    <?php 
                        if($desgn=="HOD")
                        {
                        echo '<a class="nav-link" href="curriculum.php"style="font-size:110%;">';
                        }
                        else
                        {
                        echo'<a class="nav-link" href="specifyCO.php" style="font-size:110%;">';
                        }
                        ?>
                    <i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><?if($desgn=="HOD"){ echo'<a class="nav-link" href="download_reports.php"style="font-size:110%;"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a>';}?><a class="nav-link active" href="UserProfile.php"style="font-size:110%;"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
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
                    <h3>Profile</h3>
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
        <h4 style="text-align:center;margin:1%">PROFILE DETAILS</h4>
        <hr>
        <div class="row" style="padding-left:1%;padding-right:1%;padding-bottom:1%">
            <div class="col-4" style="border-right:0.1px solid rgb(226,226,226);height:60vh;">
                <div class="jumbotron">
                    <h3 class="display-5">Hello! Prof. <?echo $_SESSION["f_name"].' '.$_SESSION["s_name"];?></h3>
                    <p class="lead" style="margin-top: 5%"><strong>Id:</strong> <?echo $id?></p>
                    <p class="lead"><strong>Branch:</strong>  <?echo $branch?></p>
                    <p class="lead"><strong>Designation:</strong> <?echo $post?></p>

                    <!-- <hr class="my-2">
                    <p style="font-size:3%;margin-bottom:2%">You can update the profile here...</p>-->
                    <div class="row" style="margin-top:3%">
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#username_modal" style="margin-right: 1%;">Change User ID</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#desgn_modal" >Change Designation</button>
                    </div>
                        
                </div>
            </div>
            <div class="col-4" style="border-right:0.1px solid rgb(226,226,226);height:60vh">
                <h5 style="text-align:center;">SUBJECTS</h5>
                <div style="height:60vh; overflow-y: scroll;">
                <?php
                $q_count="SELECT COUNT(*) FROM $branch WHERE teacher_id='$id'";
                $result_q_count = mysqli_query($conn,$q_count) or die("ERROR".mysqli_error($conn));
                $row = mysqli_fetch_array($result_q_count);
                if($row['COUNT(*)'] == 0){echo '<div class="alert alert-info" role="alert">
                    No subjects allocated yet !!
                  </div>';}
                else{
                ?>
                <table class="table table-striped">
                    <thead style="background-color:white;position: sticky; top: 0;">
                        <tr>
                        <th scope="col">*</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Batch</th>
                        </tr>
                    </thead>
                    <tbody style="height:60vh; overflow-y: scroll;">
                    <?php  
                    $q_disp="SELECT * FROM $branch WHERE teacher_id='$id'";
                    $result_display = mysqli_query($conn,$q_disp) or die("ERROR".mysqli_error($conn));
                    $no=1;
                    while ( $row_display = mysqli_fetch_array($result_display) )
                        {
                    ?>
                        <tr>
                        <th scope="row"><?echo $no?></th>
                        <td><?echo $row_display['sub_name']?></td>
                        <td><?echo 'Sem : '.$row_display['semester'].' || Year : '.$row_display['year']?></td>
                        </tr>
                    <?php
                    $no=$no+1;
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-4">
                <h5 style="text-align:center;">TASKS</h5>
                <div style="height:60vh; overflow-y: scroll;">
                <?php
                $q_count="SELECT COUNT(*) FROM `alert_db` WHERE teacher_id='$id'";
                $result_q_count = mysqli_query($conn,$q_count) or die("ERROR".mysqli_error($conn));
                $row = mysqli_fetch_array($result_q_count);
                if($row['COUNT(*)'] == 0){echo '<div class="alert alert-info" role="alert">
                    No tasks as of now !!!
                  </div>';}
                else{
                ?>
                <table class="table table-striped">
                    <thead style="background-color:white;position: sticky; top: 0;">
                        <tr>
                        <th scope="col">*</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Note</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody style="height:60vh; overflow-y: scroll;">
                    <?php  
                    $alert_query="SELECT * FROM `alert_db` WHERE teacher_id='$id'";
                    $alert_fire = mysqli_query($conn,$alert_query) or die("ERROR".mysqli_error($conn));
                    $no=1;
                    while ( $row_display = mysqli_fetch_array($alert_fire) )
                        {if($row_display['status']==1){
                    ?>
                        <tr>
                        <th scope="row"><?echo $no?></th>
                        <td><?echo $row_display['sub']?></td>
                        <td><?echo $row_display['message'].'</br>'.'Batch : Sem- '.$row_display['sem'].'||Year- '.$row_display['year']?></td>
                        <td><button class="btn btn-primary" onclick="alert_ok(  '<?php echo $row_display['teacher_id'] ?>',
                                                                                '<?php echo $row_display['sub'] ?>',
                                                                                '<?php echo $row_display['sem'];?>',
                                                                                '<?php echo $row_display['year']; ?>',
                                                                                '<?php echo $branch; ?>')"><i class="fas fa-check"></i></button></td>
                        </tr>
                    <?php
                    $no=$no+1;}
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-User ID -->
    <div class="modal fade" id="username_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change User ID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" method="post" action="" novalidate >
            <div class="modal-body">
                    <div class="form-group">
                      <label>Enter Current User ID</label>
                      <input type="email" class="form-control" name="curr_id" placeholder="Current User ID" required>      
                    </div>
                    <hr>
                    <div class="form-group">
                      <label>Enter New User ID</label>
                      <input type="email" class="form-control" name="new_user_id" placeholder="New User ID" required>                
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  name="user_change" class="btn btn-primary">Change User ID</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    



<!--Modal Designation-->
<div class="modal fade" id="desgn_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" method="post" action="" novalidate >
            <div class="modal-body">
                    <div class="form-group">
                        
                      <label>Change Designation From</label>
                      
                                  
                                  <select id="desgn" name="curr_desgn" class="form-control custom-select" required>
                                  <option value="" disabled selected>Choose Designation</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="HOD">HOD</option>
                                    <!-- <option valu>Principal</option> -->
                                  </select>
                        
                        
                        <hr>
                        <label>Change Designation To</label>
                      
                                      <select id="desgn" name="new_desgn" class="form-control custom-select" required>
                                      <option value="" disabled selected>Choose Designation</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="HOD">HOD</option>
                                        <!-- <option valu>Principal</option> -->
                                      </select>
                                     
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  name="desgn_change" class="btn btn-primary">Change Designation</button>
            </div>
            </form>
            </div>
        </div>
    </div>

    
    <div id="result"></div>
</body>
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
    function alert_ok(id,sub,sem,year,branch){
        data = {sub:sub,sem:sem,t_id:id,branch:branch,year:year};
        $.post("alert_ok.php",data,
        function(data){
            $('#result').html(data)
        });
    }
</script>

    




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
if(isset($_POST['user_change']))
{
   $curr_id=$_POST['curr_id'];
   $new_user_id=$_POST['new_user_id'];
   $host="localhost";
   $user="root";
   $pass="";
   $db="college_project";
   $conn=new mysqli($host,$user,$pass,$db);
   $query = "SELECT * FROM `teacher_acc_db` WHERE EMAIL ='$id'";
   $result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
   $row = mysqli_fetch_array($result);

   if($row['EMAIL']==$curr_id)
   {
   
        $upd_query = "UPDATE `teacher_acc_db` SET `EMAIL`='$new_user_id' WHERE EMAIL='$id'";
        $upd_query1 = "UPDATE `$branch` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'";
        $upd_query2 = "UPDATE `assign_data` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'";
        $upd_query3 = "UPDATE `alert_db` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'";
        $upd_query4 = "UPDATE `dash_data` SET `t_id`='$new_user_id' WHERE t_id='$id'";
        $upd_query5 = "UPDATE `oral_data` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'"; 
        $upd_query6 = "UPDATE `sem_data` SET `teacher_id`= '$new_user_id' WHERE teacher_id = '$id'";
        $upd_query7 = "UPDATE `tw_data` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'";
        $upd_query8 = "UPDATE `ut2_data` SET `Teacher_ID`='$new_user_id' WHERE Teacher_ID='$id'";
        $upd_query9 = "UPDATE `ut_data` SET `Teacher_ID` = '$new_user_id' WHERE Teacher_ID='$id'";
        $upd_query10 = "UPDATE `ut_co_marks` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'";
        $upd_query11 = "UPDATE `ut2_co_marks` SET `teacher_id`='$new_user_id' WHERE teacher_id='$id'";

        $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
        $upd_result1 = mysqli_query($conn,$upd_query1) or die("ERROR".mysqli_error($conn));
        $upd_result2 = mysqli_query($conn,$upd_query2) or die("ERROR".mysqli_error($conn));
        $upd_result3 = mysqli_query($conn,$upd_query3) or die("ERROR".mysqli_error($conn));
        $upd_result4 = mysqli_query($conn,$upd_query4) or die("ERROR".mysqli_error($conn));
        $upd_result5 = mysqli_query($conn,$upd_query5) or die("ERROR".mysqli_error($conn));
        $upd_result6 = mysqli_query($conn,$upd_query6) or die("ERROR".mysqli_error($conn));
        $upd_result7 = mysqli_query($conn,$upd_query7) or die("ERROR".mysqli_error($conn));
        $upd_result8 = mysqli_query($conn,$upd_query8) or die("ERROR".mysqli_error($conn));
        $upd_result9 = mysqli_query($conn,$upd_query9) or die("ERROR".mysqli_error($conn));
        $upd_result10 = mysqli_query($conn,$upd_query10) or die("ERROR".mysqli_error($conn));
        $upd_result11 = mysqli_query($conn,$upd_query11) or die("ERROR".mysqli_error($conn));

        echo "<script type='text/javascript'>alert('User ID Changed Successfully !!!')
        window.location='index.php';
        </script>";
    

    
   }
   else
   {
        echo "<script type='text/javascript'>alert('Please Try Again !!!')
        window.location='UserProfile.php';</script>";
      
   }
}
?>




<?php
if(isset($_POST['desgn_change']))
{
   $curr_desgn = $_POST['curr_desgn'];
   $new_desgn=$_POST['new_desgn'];
   $host="localhost";
   $user="root";
   $pass="";
   $db="college_project";
   $conn=new mysqli($host,$user,$pass,$db);
   $query = "SELECT * FROM `teacher_acc_db` WHERE EMAIL ='$id'";
   $result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
   $row = mysqli_fetch_array($result);
   

   $hod_query="SELECT COUNT(*) FROM `teacher_acc_db` WHERE designation= 'HOD' AND branch='$branch'";
   $result1 = mysqli_query($conn,$hod_query) or die("ERROR".mysqli_error($conn));
   $row1 = mysqli_fetch_array($result1);

  

   if($curr_desgn == "Teacher" AND $row1['COUNT(*)'] == 0)
   {
        
        $upd_query = "UPDATE `teacher_acc_db` SET designation='$new_desgn' WHERE EMAIL='$id'";
        $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
        echo '<script>alert("User Designation Changed Successfully !!!");
        window.location="index.php";
        </script>';
      

    
   }
   elseif($curr_desgn=="HOD")
   {
            $upd_query = "UPDATE `teacher_acc_db` SET designation='$new_desgn' WHERE EMAIL='$id'";
            $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
            echo '<script>alert("User Designation Changed Successfully !!!");
            window.location="index.php";
            </script>';
   }
   else
   {
        echo "<script type='text/javascript'>alert('Please Try Again !!!')
        window.location='UserProfile.php';</script>";
      
   }
}
?>





</html>