<html>

<?php
// Start the session
session_start();
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
$result1 = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));

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
                <ul class="nav navbar-nav text-light" id="accordionSidebar"style="margin-top:10%;">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"style="font-size:110%;"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link active" href="reports.php"style="font-size:110%;"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
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
        <a class="nav-link active" href="reports.php" style="color: black;">Subject Analysis</a>
          <a class="nav-link" href="values.php" style="color:black;">Threshold Values</a>
          <a class="nav-link" href="COreports.php" style="color: black;">CO Attainment Table</a>
          <a class="nav-link" href="POreports.php" style="color:black;">PO Attainment Table</a>
          <a class="nav-link" href="upload_reports.php" style="color:#007bff;font-weight: bold;">Upload Reports</a>

        </nav>
      </div>
    <div class='col-10' style="padding:1%; ">

      <!-- <p style="font-size:large;">Click the exclamation for Format:   <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-exclamation" aria-hidden="true"></i></button></p>  -->
      <form class="needs-validation" method="post" action="" enctype="multipart/form-data" style="margin-left:0.5%" novalidate> 
        <div class="form-row" style="margin-top:-8%;">
        <div class="form-group" style="margin-right: 1%">
          <select name="course" class="form-control custom-select" required>
                    <option value="" disabled selected>Choose Course</option>
                    <?php
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <option><?echo "Subject : ".$row['sub_name']." ".$row['subject-code']." Semester : ".$row['semester']." || Year : ".$row['year']; ?></option>
                      <?}?>
                  </select>
          </div>
          <div class="form-group" style="margin-right: 1%">
          <select name="type" class="form-control custom-select" required>
              <option value="" disabled selected>Choose Report Type</option>
              <option>CO Attainment Table</option>
              <option>PO Attainment Table</option>  
          </select>
          </div>
       
			<div class="form-group" style="margin-right: 1%">
			<div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file" required>
            <label class="custom-file-label" for="customFile">Choose file</label>
			</div>
      </div>
      <div class="form-group" style="margin-right: 1%">
      <button class="btn btn-success" name="import">Upload</button>
      </div>
      </div>
      </form>
      <button class="btn btn-primary" data-toggle="modal"  data-target="#disp_modal">Show Uploaded Reports</button>

<!-- Modal -->
<div class="modal fade" id="disp_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Display Uploaded Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" method="post" action="" novalidate>
      <div class="modal-body">
      <div class="form-row">
          <div class="form-group" style="width: 100%">
          <select name="type" class="form-control custom-select" required>
            <option value="" disabled selected>Choose Report</option>
            <option>CO Attainment Table</option>
            <option>PO Attainment Table</option>  
          </select>
          </div>
      </div>
      <div class="form-row" >
      <div class="form-group" style="width: 100%">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="show">Display Reports</button>
      </div>
      </form>
    </div>
  </div>
</div>

<br>
<!-- File Import -->
<?php  
$connect = mysqli_connect($host,$user,$pass,$db);
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
if(isset($_POST["import"]))
{
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];

 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
  $handle = fopen($_FILES['file']['tmp_name'], "r");
  if($_POST['type']=='CO Attainment Table')
  {
   while($data = fgetcsv($handle))
   {
    $co_code = mysqli_real_escape_string($connect, $data[0]);
    $internal = mysqli_real_escape_string($connect, $data[1]);
    $external = mysqli_real_escape_string($connect, $data[2]);
    $overall = mysqli_real_escape_string($connect, $data[3]);
  

    $query = "INSERT INTO `co_att`(`co_code`, `Teacher_ID`, `Subject`, `Semester`,`year`,`internal`,`external`,`overall`)
      VALUES ('$co_code','$id','$sub','$sem','$year','$internal','$external','$overall')";
    $check=mysqli_query($connect, $query);
    if ($check == false){
      echo "error" .$connect-> error;
    }
   }
   echo "<script>alert('CO Attainment: Uploaded Successfully!');</script>";
  }

  elseif($_POST['type']=='PO Attainment Table')
  {
    while($data = fgetcsv($handle))
   {
    $po_code = mysqli_real_escape_string($connect, $data[0]);
    $weighted = mysqli_real_escape_string($connect, $data[1]);
    $threshold = mysqli_real_escape_string($connect, $data[2]);

    $query = "INSERT INTO `po_att`(`po_code`, `Teacher_ID`, `Subject`, `Semester`,`year`, `weighted`, `threshold`)
      VALUES ('$po_code','$id','$sub','$sem','$year','$weighted','$threshold')";
    $check=mysqli_query($connect, $query);
    if ($check == false){
      echo "error" .$connect-> error;
    }
   }
   echo "<script>alert('PO Attainment: Uploaded Succesfully');</script>";
  }
  
  }
}
}
elseif (isset($_POST["show"])) {
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];


if($_POST['type']=='CO Attainment Table')
 {
  $query = "SELECT * FROM `co_att` WHERE `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
  $result = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));

  ?>
  <div style="height:400px; overflow-y: scroll; margin-top:2%" >
  
  <table class="table" >
  <thead style="background-color:white;position: sticky; top: 0; border-top: 1px solid gray;">
    <tr>
      <th scope="col">CO Code</th>
      <th scope="col">Subject</th>
      <th scope="col">Semester</th>
      <th scope="col">Internal</th>
      <th scope="col">External</th>
      <th scope="col">Overall</th>
    </tr>
  </thead>
  <tbody>
    <?php
  while($rows=mysqli_fetch_array($result)){
    ?>
    <tr>
    <td><?php echo $rows['co_code']?></td>
    <td><?php echo $rows['Subject']?></td>
    <td><?php echo $rows['Semester']?></td>
    <td><?php echo $rows['internal']?></td>
    <td><?php echo $rows['external']?></td>
    <td><?php echo $rows['overall']?></td>
    </tr>
    <?php
  	}
}
elseif($_POST['type']=='PO Attainment Table')
{
  $query = "SELECT * FROM `po_att` WHERE `Teacher_ID`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
  $result = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));

  ?>
  <div style="height:400px; overflow-y: scroll; margin-top:2%" >
  
  <table class="table" >
  <thead style="background-color:white;position: sticky; top: 0; border-top: 1px solid gray;">
    <tr>
      <th scope="col">PO/PSO Code</th>
      <th scope="col">Subject</th>
      <th scope="col">Semester</th>
      <th scope="col">PO Weighted Average</th>
      <th scope="col">PO Threshold Base</th>

    </tr>
  </thead>
  <tbody>
    <?php
  while($rows=mysqli_fetch_array($result)){
    ?>
    <tr>
    <td><?php echo $rows['po_code']?></td>
    <td><?php echo $rows['Subject']?></td>
    <td><?php echo $rows['Semester']?></td>
    <td><?php echo $rows['weighted']?></td>
    <td><?php echo $rows['threshold']?></td>
    </tr>
    <?php
  	}
}
}

	?>
</tbody>
</table>

</div>
</div>
</div>
</div>

<!-- Sample modal -->

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" >Sample CSV</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h5>Unit Test Format:</h5>
        <div class="alert alert-info" role="alert">
        <h6>Save the File with .csv Extension !!!</h6>
        </div>
        <div class="alert alert-info" role="alert">
          <h6>Do not add the headers in the CSV file !!!</h6>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
            <th scope="col">PRN</th>
            <th scope="col">1a</th>
            <th scope="col">1b</th>
            <th scope="col">1c</th>
            <th scope="col">1d</th>
            <th scope="col">1e</th>
            <th scope="col">1f</th>
            <th scope="col">2a</th>
            <th scope="col">2b</th>
            <th scope="col">3a</th>
            <th scope="col">3b</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/5</td>
              <td>/5</td>
              <td>/5</td>
              <td>/5</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/2</td>
              <td>/5</td>
              <td>/5</td>
              <td>/5</td>
              <td>/5</td>
            </tr>
          </tbody>
        </table>
        <hr>
        <h5>Semester Format:</h5>
        <div class="alert alert-info" role="alert">
          <h6>Do not add the headers in the CSV file !!!</h6>
        </div>        <table class="table table-bordered">
          <thead>
            <tr>
            <th scope="col">PRN</th>
            <th scope="col">Semester Marks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>-</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>-</td>
            </tr>
          </tbody>
        </table>
        <hr>
        <h5>Orals Format:</h5>
        
        <div class="alert alert-info" role="alert">
        
          <h6>Do not add the headers in the CSV file !!!</h6>
        </div>        <table class="table table-bordered">
          <thead>
            <tr>
            <th scope="col">PRN</th>
            <th scope="col">Orals Marks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>-</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>-</td>
            </tr>
          </tbody>
        </table>
        <hr>
        <h5>Assignments Format:</h5>
        <div class="alert alert-info" role="alert">
          <h6>Do not add the headers in the CSV file !!!</h6>
        </div>        <table class="table table-bordered">
          <thead>
            <tr>
            <th scope="col">PRN</th>
            <th scope="col">Assignments Marks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>-</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>-</td>
            </tr>
          </tbody>
        </table>
        <hr>
        <h5>Termwork Format:</h5>
        <div class="alert alert-info" role="alert">
          <h6>Do not add the headers in the CSV file !!!</h6>
        </div>        <table class="table table-bordered">
          <thead>
            <tr>
            <th scope="col">PRN</th>
            <th scope="col">Termwork Marks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>-</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>-</td>
            </tr>
            
          </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
    </div>
  </div>
</div>

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
	function login_error() {
	alert("Function not available");
	}
</script>

<script>
  $('#customFile').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
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