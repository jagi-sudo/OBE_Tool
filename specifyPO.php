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
if (isset($_POST['add_po'])){
$year=explode(" ",$_POST['course'])[0];
$po1=$_POST['po1'];
$po2=$_POST['po2'];
$po3=$_POST['po3'];
$po4=$_POST['po4'];
$po5=$_POST['po5'];
$po6=$_POST['po6'];
$po7=$_POST['po7'];
$po8=$_POST['po8'];
$po9=$_POST['po9'];
$po10=$_POST['po10'];
$po11=$_POST['po11'];
$po12=$_POST['po12'];
$pso1=$_POST['pso1'];
$pso2=$_POST['pso2'];
$add_query="INSERT INTO `po_db` (`branch`, `year`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, 
`po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`) VALUES 
  ('$branch','$year','$po1','$po2','$po3','$po4','$po5','$po6',
  '$po7','$po8','$po9','$po10','$po11','$po12','$pso1','$pso2')";
  $add_result = mysqli_query($conn,$add_query) or die("ERROR".mysqli_error($conn));
  $dash_query = "UPDATE `dash_data` SET `po_spec`= 1  WHERE year='$year'";
  $dash_result = mysqli_query($conn,$dash_query) or die("ERROR".mysqli_error($conn));
  echo'<script>alert("Record added Successfully")</script>';
}
if (isset($_POST['update_po'])){
  $year=explode(" ",$_POST['course'])[0];
  $po1=$_POST['po1'];
  $po2=$_POST['po2'];
  $po3=$_POST['po3'];
  $po4=$_POST['po4'];
  $po5=$_POST['po5'];
  $po6=$_POST['po6'];
  $po7=$_POST['po7'];
  $po8=$_POST['po8'];
  $po9=$_POST['po9'];
  $po10=$_POST['po10'];
  $po11=$_POST['po11'];
  $po12=$_POST['po12'];
  $pso1=$_POST['pso1'];
  $pso2=$_POST['pso2'];
  
  
  $upd_query="UPDATE `po_db` 
                      set 
                      `po1` = case when '$po1' = '' then `po1` else '$po1' end,
                      `po2` = case when '$po2' = '' then `po2` else '$po2' end,
                      `po3` = case when '$po3' = '' then `po3` else '$po3' end,
                      `po4` = case when '$po4' = '' then `po4` else '$po4' end,
                      `po5` = case when '$po5' = '' then `po5` else '$po5' end,
                      `po6` = case when '$po6' = '' then `po6` else '$po6' end,
                      `po7` = case when '$po7' = '' then `po7` else '$po7' end,
                      `po8` = case when '$po8' = '' then `po8` else '$po8' end,
                      `po9` = case when '$po9' = '' then `po9` else '$po9' end,
                      `po10` = case when '$po10' = '' then `po10` else '$po10' end,
                      `po11` = case when '$po11' = '' then `po11` else '$po11' end,
                      `po12` = case when '$po12' = '' then `po12` else '$po12' end,
                      `pso1` = case when '$pso1' = '' then `pso1` else '$pso1' end,
                      `pso2` = case when '$pso2' = '' then `pso2` else '$pso2' end


 WHERE year='$year'";
$dash_query = "UPDATE `dash_data` SET `po_spec`= 1  WHERE year='$year'";
$dash_result = mysqli_query($conn,$dash_query) or die("ERROR".mysqli_error($conn));
  $upd_result = mysqli_query($conn,$upd_query) or die("ERROR".mysqli_error($conn));
  
  echo'<script>alert("Record Updated Successfully")</script>';
  }
$query="SELECT  * FROM `po_db` WHERE branch = '$branch'";
$result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
$result1 = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));

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
                <?php if($_SESSION['desgn']==3){?>
                    <a class="nav-link" href="#" onclick=login_error() style="color: black; display: none">Set Curriculum</a>
                    <a class="nav-link" href="#" onclick=login_error() style="color: black; display: none">Specify PO</a>
                  <?php
                  }else
                  {?>
                   <?php if($desgn=='HOD'){ echo'<a class="nav-link" href="curriculum.php" style="color: black;">Set Curriculum</a>
                  <a class="nav-link" href="specifyPO.php" style="color: #007bff;font-weight: bold;">Specify PO</a>';}?>
                  <?}?>
                    <a class="nav-link active" href="specifyCO.php" style="color:black; ">Specify CO </a>
                    <a class="nav-link" href="COPOMapping.php" style="color: black;">CO-PO Mapping</a>
                    <a class="nav-link" href="MarksCOMapping.php" style="color: black;">Marks-CO Mapping</a>
                    <a class="nav-link" href="MarksData.php" style="color: black;">Marks Data</a>

                </nav>
                </div>
                <div class='col-10' style=" margin-right:auto; margin-top:-8%; ">
                <div class="container-fluid">
                  <div class="row">
                  <form class="needs-validation" method="post" action="" novalidate>
                  <div class="form-row" style="margin: 2%;margin-top:3%">
                  <div class="form-group" style="margin-left: 1%">
                  <select name="course" class="form-control custom-select" required>
                    <option value="" disabled selected>Choose Program</option>
                    <?php
                      while($row = mysqli_fetch_array($result)){
                    ?>
                    <option><?echo $row['branch']." ".$row['year']; ?></option>
                      <?}?>
                  </select>
                  </div>
                  <button type="submit" name="show_po" class="btn btn-primary" style="margin-left: 1%;margin-bottom:1%">View PO Specifications</button>
                  </div>
                  </form>
                  </div>
                  </div>
                  <?if(isset($_POST['show_po'])){?>
                    <div style="height:50vh; overflow-y: scroll;margin-left: 1%">
                    <table class="table table-striped">
                      <thead style="background-color:white;position: sticky; top: 0;"> 
                        <tr>
                          <th scope="col">PO/PSO Code</th>
                          <th scope="col">Program Outcome || Program Specific Outcome</th>
                        </tr>
                        <?php
                        $year=explode(" ",$_POST['course'])[1];
                        $search_query="SELECT `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2` FROM `po_db`  
                        WHERE `branch`='$branch' and `year`='$year' ";
                        $search_result= mysqli_query($conn,$search_query) or die("ERROR".mysqli_error($conn));
                        $search_row = mysqli_fetch_array($search_result);           
                        ?>
                      </thead>
                      <tbody>
                        <tr>
                        <th scope="row">PO1</th>
                        <td><?echo $search_row['po1']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PO2</th>
                          <td><?echo $search_row['po2']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PO3</th>
                          <td><?echo $search_row['po3']?></td>
                        </tr>  
                        <tr>
                        <th scope="row">PO4</th>
                        <td><?echo $search_row['po4']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PO5</th>
                          <td><?echo $search_row['po5']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PO6</th>
                          <td><?echo $search_row['po6']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PO7</th>
                          <td><?echo $search_row['po7']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PO8</th>
                          <td><?echo $search_row['po8']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PO9</th>
                          <td><?echo $search_row['po9']?></td>
                        </tr>    
                        <tr>
                          <th scope="row">PO10</th>
                          <td><?echo $search_row['po10']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PO11</th>
                          <td><?echo $search_row['po11']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PO12</th>
                          <td><?echo $search_row['po12']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PSO1</th>
                          <td><?echo $search_row['pso1']?></td>
                        </tr> 
                        <tr>
                          <th scope="row">PSO2</th>
                          <td><?echo $search_row['pso2']?></td>
                        </tr>                                    
                      </tbody>
                    </table>
                    </div>
                    
                  <?}
                  else{
                  ?>
                  <div class="alert alert-info" role="alert" style="margin-left: 1%">
                  Please enter the above details to view the PO / PSO specifications
                  </div>
                 <? }?>
                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#add_po" style="margin-left: 1%;margin-top:1%;margin-right:2%">Add Program Outcomes</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update_allo" style="margin-top:1%;">Update Program Outcomes</button>

              
              
              <!-- Modal -->
                  <div class="modal fade" id="add_po" tabindex="-1">
                    <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Program Outcomes</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form class="needs-validation" method="post" action="" style="margin:0;"  novalidate>
                        <div class="modal-body" style="height:400px; overflow-y: scroll">
                        <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Course</label>
                          <select name="course" class="form-control custom-select" required>
                            <option value="" disabled selected>Choose the Program Year</option>
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
                      </div>
                        <hr>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO1-Description</label>
                          <input type="text" class="form-control" name="po1" placeholder="PO1-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO2-Description</label>
                          <input type="text" class="form-control" name="po2" placeholder="PO2-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO3-Description</label>
                          <input type="text" class="form-control" name="po3" placeholder="PO3-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO4-Description</label>
                          <input type="text" class="form-control" name="po4" placeholder="PO4-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO5-Description</label>
                          <input type="text" class="form-control" name="po5" placeholder="PO5-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO6-Description</label>
                          <input type="text" class="form-control" name="po6" placeholder="PO6-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO7-Description</label>
                          <input type="text" class="form-control" name="po7" placeholder="PO7-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO8-Description</label>
                          <input type="text" class="form-control" name="po8" placeholder="PO8-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO9-Description</label>
                          <input type="text" class="form-control" name="po9" placeholder="PO9-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO10-Description</label>
                          <input type="text" class="form-control" name="po10" placeholder="PO10-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO11-Description</label>
                          <input type="text" class="form-control" name="po11" placeholder="PO11-Description" required> 
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO12-Description</label>
                          <input type="text" class="form-control" name="po12" placeholder="PO12-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PSO1-Description</label>
                          <input type="text" class="form-control" name="pso1" placeholder="PSO1-Description" required>
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PSO2-Description</label>
                          <input type="text" class="form-control" name="pso2" placeholder="PSO2-Description" required>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="add_po">Add Program Outcome</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

              
              <!-- Modal -->
              <div class="modal fade" id="update_allo" tabindex="-1">
                    <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Program Outcomes</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form class="needs-validation" method="post" action="" style="margin:0;"  novalidate>
                        <div class="modal-body" style="height:400px; overflow-y: scroll">
                        <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Course</label>
                          <select name="course" class="form-control custom-select" required>
                            <option value="" disabled selected>Choose the Program Year</option>
                            <?php
                              while($row = mysqli_fetch_array($result1)){
                            ?>
                            <option><?echo $row['year']; ?></option>
                              <?}?>
                          </select>
                        </div>
                      </div>
                        <hr>
                        <div class="alert alert-warning" role="alert">
                          Only enter the PO's you want to update !!!!
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO1-Description</label>
                          <input type="text" class="form-control" name="po1" placeholder="PO1-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO2-Description</label>
                          <input type="text" class="form-control" name="po2" placeholder="PO2-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO3-Description</label>
                          <input type="text" class="form-control" name="po3" placeholder="PO3-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO4-Description</label>
                          <input type="text" class="form-control" name="po4" placeholder="PO4-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%">
                          <label>PO5-Description</label>
                          <input type="text" class="form-control" name="po5" placeholder="PO5-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO6-Description</label>
                          <input type="text" class="form-control" name="po6" placeholder="PO6-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO7-Description</label>
                          <input type="text" class="form-control" name="po7" placeholder="PO7-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO8-Description</label>
                          <input type="text" class="form-control" name="po8" placeholder="PO8-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO9-Description</label>
                          <input type="text" class="form-control" name="po9" placeholder="PO9-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO10-Description</label>
                          <input type="text" class="form-control" name="po10" placeholder="PO10-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO11-Description</label>
                          <input type="text" class="form-control" name="po11" placeholder="PO11-Description"  > 
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO12-Description</label>
                          <input type="text" class="form-control" name="po12" placeholder="PO12-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PO10-Description</label>
                          <input type="text" class="form-control" name="po10" placeholder="PO10-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PSO1-Description</label>
                          <input type="text" class="form-control" name="pso1" placeholder="PSO1-Description"  >
                        </div>
                        <div class="form-row" style="margin-top: 2%"> 
                          <label>PSO2-Description</label>
                          <input type="text" class="form-control" name="pso2" placeholder="PSO2-Description"  >
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-warning" name="update_po">Update Program Outcome</button>
                        </div>
                        </form>
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