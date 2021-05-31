<html>
<?php
// Start the session
session_start();
$host="localhost";
$user="root";
$pass="";
$db="college_project";
$id = $_SESSION['user_id'];
$desgn=$_SESSION["desgn"];
$conn=new mysqli($host,$user,$pass,$db);
$branch=$_SESSION['branch'];
$query="SELECT DISTINCT * FROM `$branch` WHERE `teacher_id`='$id'";
$result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
if(isset($_POST['can_cred'])){
  header("Location:index.php");            
  session_destroy();
  } 
if(isset($_POST["import"])){
  $data=array();
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];
  $label=array();
  $max=array();
  $min=array();
  $avg=array();
  $pass_arr=array();
  $count=0;
  $pass=(int)$_POST['pass_marks'];
  $r1=0;
  $r2=0;
  $r3=0;
  $r4=0;
  $pie_data=array();
  
  if($_POST['type']=='Semester'){
    $graph_query="SELECT * FROM `sem_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $graph_result = mysqli_query($conn,$graph_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($graph_result)){
      $sum=(int)$row['tee'];
      $count=$count+1;
      array_push($data,$sum);
      array_push($label,$row['PRN']); 
      if($sum>=(80*40/100) and $sum<(80*50/100)){
        $r1=$r1+1;
      }
      else if($sum>=(80*50/100) and $sum<(80*60/100)){
        $r2=$r2+1;
      }
      else if($sum>=(80*60/100)){
        $r3=$r3+1;
      }
      else{
        $r4=$r4+1;
      }     
    }
    $max = array_fill(0, $count, max($data));
    $min = array_fill(0, $count, min($data));
    $avg = array_fill(0,$count,array_sum($data)/$count);
    $pass_arr=array_fill(0,$count,$pass);
    array_push($pie_data,$r4,$r1,$r2,$r3);     
  }
  else if($_POST['type']=='Unit Test-1'){
    $graph_query="SELECT * FROM `ut_data` WHERE  `Teacher_id`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $graph_result = mysqli_query($conn,$graph_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($graph_result)){
      $sum = 0;
      $sum=(int)$row['1a']+(int)$row['1b']+(int)$row['1c']+(int)$row['1d']+(int)$row['1e']+(int)$row['1f']+
            (int)$row['2a']+(int)$row['2b']+(int)$row['3a']+(int)$row['3b'];
            array_push($data,$sum);
            array_push($label,$row['PRN']); 
            $count=$count+1;
            if($sum>=(20*40/100) and $sum<(20*50/100)){
              $r1=$r1+1;
            }
            else if($sum>=(20*50/100) and $sum<(20*60/100)){
              $r2=$r2+1;
            }
            else if($sum>=(20*60/100)){
              $r3=$r3+1;
            }
            else{
              $r4=$r4+1;
            }     
    }
    $max = array_fill(0, $count, max($data));
    $min = array_fill(0, $count, min($data));
    $avg = array_fill(0,$count,array_sum($data)/$count);
    $pass_arr=array_fill(0,$count,$pass);
    array_push($pie_data,$r4,$r1,$r2,$r3);     

  }
  else if($_POST['type']=='Unit Test-2'){
    $graph_query="SELECT * FROM `ut2_data` WHERE  `Teacher_id`='$id' AND `Semester`='$sem' AND `Subject`= '$sub' AND `year`='$year'";
    $graph_result = mysqli_query($conn,$graph_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($graph_result)){
      $sum = 0;
      $sum=(int)$row['1a']+(int)$row['1b']+(int)$row['1c']+(int)$row['1d']+(int)$row['1e']+(int)$row['1f']+
            (int)$row['2a']+(int)$row['2b']+(int)$row['3a']+(int)$row['3b'];
            array_push($data,$sum);
            array_push($label,$row['PRN']); 
            $count=$count+1;
            if($sum>=(20*40/100) and $sum<(20*50/100)){
              $r1=$r1+1;
            }
            else if($sum>=(20*50/100) and $sum<(20*60/100)){
              $r2=$r2+1;
            }
            else if($sum>=(20*60/100)){
              $r3=$r3+1;
            }
            else{
              $r4=$r4+1;
            }     
    }
    $max = array_fill(0, $count, max($data));
    $min = array_fill(0, $count, min($data));
    $avg = array_fill(0,$count,array_sum($data)/$count);
    $pass_arr=array_fill(0,$count,$pass);
    array_push($pie_data,$r4,$r1,$r2,$r3);     

  }
  else if($_POST['type']=='Assignments'){
    $graph_query="SELECT * FROM `assign_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $graph_result = mysqli_query($conn,$graph_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($graph_result)){
      array_push($data,$row['ques']);
      array_push($label,$row['PRN']);
      $count=$count+1;
      $sum = 0;
      $sum = $row['ques'];
      $total = 40;
      if($sum>=($total*40/100) and $sum<($total*50/100)){
        $r1=$r1+1;
      }
      else if($sum>=($total*50/100) and $sum<($total*60/100)){
        $r2=$r2+1;
      }
      else if($sum>=($total*60/100)){
        $r3=$r3+1;
      }
      else{
        $r4=$r4+1;
      }     
    }
    $max = array_fill(0, $count, max($data));
    $min = array_fill(0, $count, min($data));
    $avg = array_fill(0,$count,array_sum($data)/$count);
    array_push($pie_data,$r4,$r1,$r2,$r3);     
  }
  else if($_POST['type']=='Orals'){
    $graph_query="SELECT * FROM `oral_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $graph_result = mysqli_query($conn,$graph_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($graph_result)){
      array_push($data,$row['ques']);
      array_push($label,$row['PRN']);   
      $count=$count+1;
      $sum = 0;
      $sum = $row['ques'];
      $total = 40;
      if($sum>=($total*40/100) and $sum<($total*50/100)){
        $r1=$r1+1;
      }
      else if($sum>=($total*50/100) and $sum<($total*60/100)){
        $r2=$r2+1;
      }
      else if($sum>=($total*60/100)){
        $r3=$r3+1;
      }
      else{
        $r4=$r4+1;
      }     
    }
    $max = array_fill(0, $count, max($data));
    $min = array_fill(0, $count, min($data));
    $avg = array_fill(0,$count,array_sum($data)/$count);
    array_push($pie_data,$r4,$r1,$r2,$r3);     

  }
  else if($_POST['type']=='Termwork'){
    $graph_query="SELECT * FROM `tw_data` WHERE  `teacher_id`='$id' AND `sem`='$sem' AND `sub`= '$sub' AND `year`='$year'";
    $graph_result = mysqli_query($conn,$graph_query) or die("ERROR".mysqli_error($conn));
    while($row = mysqli_fetch_array($graph_result)){
      array_push($data,$row['ques']);
      array_push($label,$row['PRN']);
      $count=$count+1;
      $sum = 0;
      $sum = $row['ques'];
      $total = 40;
      if($sum>=($total*40/100) and $sum<($total*50/100)){
        $r1=$r1+1;
      }
      else if($sum>=($total*50/100) and $sum<($total*60/100)){
        $r2=$r2+1;
      }
      else if($sum>=($total*60/100)){
        $r3=$r3+1;
      }
      else{
        $r4=$r4+1;
      }   
    }
    $max = array_fill(0, $count, max($data));
    $min = array_fill(0, $count, min($data));
    $avg = array_fill(0,$count,array_sum($data)/$count);
    array_push($pie_data,$r4,$r1,$r2,$r3);     

  }
  echo "<script> window.onload = function() {graph()} </script>";
}
?>
<script type="text/javascript">
function graph(){
    var ctx = document.getElementById('Chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($label, JSON_NUMERIC_CHECK); ?>,
            datasets: [{
                label: 'Marks:',
                pointStyle:'crossRot',
                radius:5,
                tension:0,
                data: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>,
                backgroundColor:  'rgba(54, 162, 235, 0.2)',
                borderColor:'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },{
            label: 'Maximum Marks',
            data: <?php echo json_encode($max, JSON_NUMERIC_CHECK); ?>,
            type: 'line',
            backgroundColor: 'rgba(0,0,255,0)',
            borderColor:'green',
            borderWidth: 1.5,
            // this dataset is drawn on top
            order: 2
        },{
            label: 'Minimum Marks',
            data: <?php echo json_encode($min, JSON_NUMERIC_CHECK); ?>,
            type: 'line',
            backgroundColor: 'rgba(255,0,0,0)',
            borderColor:'red',
            borderWidth: 1.5,
            // this dataset is drawn on top
            order: 1
        },{
            label: 'Average Marks',
            data: <?php echo json_encode($avg, JSON_NUMERIC_CHECK); ?>,
            type: 'line',
            backgroundColor: 'rgba(255,255,0,0)',
            borderColor:'blue',
            borderWidth: 1.5,
            // this dataset is drawn on top
            order: 1
        },{
            label: 'Passing Marks',
            data: <?php echo json_encode($pass_arr, JSON_NUMERIC_CHECK); ?>,
            type: 'line',
            backgroundColor: 'rgba(255,255,0,0)',
            borderColor:'orange',
            borderWidth: 1.5,
            // this dataset is drawn on top
            order: 1
        }
        ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('Chart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [{
        data:<?echo json_encode($pie_data, JSON_NUMERIC_CHECK);?>,
        backgroundColor:['rgba(255, 159, 64, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(75, 192, 192, 0.5)'
        ],
        borderColor:['rgba(255, 159, 64, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(54, 162, 235,1)',
        'rgba(75, 192, 192, 1)'
        ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Marks<40% ',
        '40%<=Marks<50% ',
        '50%<=Marks<60% ',
        '60%<Marks '
    ]
        }
    });
}
</script>

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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php" style="font-size:110%"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link active" href="reports.php" style="font-size:110%"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation">
                    <?php 
                      if($desgn=="HOD")
                      {
                        echo '<a class="nav-link" href="curriculum.php" style="font-size:110%">';
                      }
                      else
                      {
                        echo'<a class="nav-link" href="specifyCO.php" style="font-size:110%;">';
                      }
                      ?>
                    
                    <i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><?if($desgn=="HOD"){ echo'<a class="nav-link" href="download_reports.php" style="font-size:110%"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a>';}?><a class="nav-link" href="UserProfile.php" style="font-size:110%"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"style="color:black;" ><img class="border rounded-circle img-profile" src="images/hi.png"/>&nbsp;&nbsp;<?php echo '<strong>'.$_SESSION["f_name"].' '.$_SESSION["s_name"].'</strong>'?><span class="d-none d-lg-inline mr-2 text-gray-600 small"></span></a>
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
          <a class="nav-link active" href="#" style="color:#007bff;font-weight: bold;">Subject Analysis</a>
          <a class="nav-link" href="values.php" style="color:black;">Threshold Values</a>
          <a class="nav-link" href="COreports.php" style="color: black;">CO Attainment Table</a>
          <a class="nav-link" href="POreports.php" style="color: black;">PO Attainment Table</a>
         
          </nav>
        </div>
      <div class='col-10' style="padding-top:1%; margin-right:auto; margin-top:-8%; " >
      <form class="needs-validation" method="post" action="" enctype="multipart/form-data" style="margin-left: 2.5%" novalidate> 
      <p style="font-size:large;">Please enter the details for Subject Level Analysis:</p>
        <div class="form-row" style="margin-top: 2%">
          <div class="form-group col-md-3">
          <select name="type" class="form-control custom-select" required>
              <option value="" disabled selected>Choose Format of Examination</option>
              <option>Unit Test-1</option>
              <option>Unit Test-2</option>
              <option>Semester</option>
            <option>Assignments</option>
            <option>Orals</option>
            <option>Termwork</option>	  
          </select>
          </div>
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
      <input type="number" class="form-control" name="pass_marks" placeholder="Enter Passing marks">
      </div>
      <div class="form-group col-md-3">
      <button class="btn btn-primary" name="import" style="width: 100%">Show Analysis</button>
      </div>
      </div>
      </form>
      </div>
      </div>
      <hr>
      <div class="row" style="margin-top: 1.5%;margin-left: 1%;margin-right:1%"> 
        <div class="col-6" style="border-right: 1px solid rgba(0,0,0,0.2);"> 
          <canvas id="Chart1" width="100%" height="60vh" ></canvas>
        </div>
        <div class="col-6">
          <canvas id="Chart2" width="100%" height="60vh" ></canvas>
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