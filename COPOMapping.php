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
$id = $_SESSION['user_id'];
$desgn=$_SESSION['desgn'];
$query="SELECT DISTINCT * FROM $branch WHERE `teacher_id`='$id'";
$result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
$check = 'LAB';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Curriculum</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
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

                
    
                <div class="container-fluid" >
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
                    <a class="nav-link active" href="specifyCO.php" style="color: black;">Specify CO </a>
                    <a class="nav-link" href="COPOMapping.php" style="color: #007bff;font-weight: bold;">CO-PO Mapping</a>
                    <a class="nav-link" href="MarksCOMapping.php" style="color: black;">Marks-CO Mapping</a>
                    <a class="nav-link" href="MarksData.php" style="color: black;">Marks Data</a>
      </nav>
    </div>
    <div class='col-10' style=" margin-right:auto; margin-top:-6%; ">
    <form class="needs-validation"  method="post" action="" novalidate>
      <div class="container-fluid" style="width=50%;">
      
          <div class="form-row">
          <div class="form-group col-md-3" style="margin-top:-1%;">
          <select name="course" class="form-control custom-select" required>
                    <option value="" disabled selected >Choose Course</option>
                    <?php
                      while($row = mysqli_fetch_array($result)){
                    ?>
                <option><?echo "Subject : ".$row['sub_name']." ".$row['subject-code']." Semester : ".$row['semester']." || Year : ".$row['year']; ?></option>
                      <?}?>
                  </select>
                  
          </div>
        
          </div>
          
    </div>
    
            <table class="a" cellspacing="10" cellpadding="3" style="width:-10%;margin-top:3%;height:-10%; margin-right:10%;font-size:small;">
              <thead>
                <tr >
                  <th scope="col">CO\PO</th>
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
                  <th scope="row">CO1</th>
                  <td>
                  <select class="form-control custom-select" name="CO1-1" style="width:50px">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                            
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-2" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-3" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-4" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-5" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-6" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-7"style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-8" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-9" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-10" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-11" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-12" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-13" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO1-14" style="width:50px">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                </tr>
                <tr>
                  <th scope="row">CO2</th>
                  <td>
                  <select class="form-control custom-select" name="CO2-1">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                            
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-2">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-3">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-4">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-5">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-6">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-7">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-8">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                            
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-9">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-10">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-11">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-12">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-13">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO2-14">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                </tr>
                <tr>
                  <th scope="row">CO3</th>
                  <td>
                  <select class="form-control custom-select" name="CO3-1">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                            
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-2">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-3">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-4">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-5">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-6">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-7">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-8">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-9">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-10">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-11">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-12">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-13">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO3-14">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             
                  </td>
                </tr>
                <tr>
                      <th scope="row">CO4</th>
                      <td>
                  <select class="form-control custom-select" name="CO4-1">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                            
                  </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-2">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-3">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-4">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-5">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-6">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 	  
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-7">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-8">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-9">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-10">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-11">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-12">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-13">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                    </select>                                             </td>
                  <td>
                  <select class="form-control custom-select" name="CO4-14">
                  <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                    </select>                                             </td>
                </tr>
                <tr>
                  <th scope="row">CO5</th>
                  <td>
                    <select class="form-control custom-select" name="CO5-1">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                      </select>                                            
                    </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-2">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-3">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-4">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-5">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-6">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-7">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-8">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-9">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-10">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-11">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-12">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-13">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO5-14">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                             </td>
                </tr>
                <tr>
                      <th scope="row">CO6</th>
                      <td>
                    <select class="form-control custom-select" name="CO6-1">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                            
                    </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-2">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-3">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-4">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-5">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-6">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-7">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-8">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-9">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-10">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	 	  
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-11">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-12">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-13">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                    <td>
                    <select class="form-control custom-select" name="CO6-14">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>	   
                      </select>                                             </td>
                </tr>                   
              </tbody>
            </table><br>
        <!-- <button type="submit" class="btn btn-success" name='save_changes' style="margin: 1%;">Add Mappings</button>
        <button type="submit" class="btn btn-success" name='save_changes2' style="margin: 1%;">View Mappings</button>
        <button type="submit" class="btn btn-danger" name='save_changes1' style="margin-bottom:50%; margin-left:80%;">Remove Mappings</button>
         -->
        <button type="submit" class="btn btn-success" data-toggle="modal" name='save_changes' style="margin-right: 2%">Add Mappings</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" name='view_map' style="margin-right: 2%">View Mappings</button>
        <button type="submit" class="btn btn-danger" data-toggle="modal" name='remove_map'style="margin-right: 2%;">Remove Mappings</button>
        <button onclick="exportData()" class="btn btn-warning">Download CSV</button>
        </form>
        
<?php
    if(isset($_POST['view_map']))
    {
      $host="localhost";
      $user="root";
      $pass="";
      $db="co_po_map";
      $db1 = "college_project";
      $db2="copo_map_lab";
      $conn=new mysqli($host,$user,$pass,$db);
      $conn1=new mysqli($host,$user,$pass,$db1);
      $conn2=new mysqli($host,$user,$pass,$db2);
      $sub=explode(" ",$_POST['course'])[2];
      $sub_code=explode(" ",$_POST['course'])[3];
      $sem=explode(" ",$_POST['course'])[6];
      $year=explode(" ",$_POST['course'])[10];
      $tb_name=$sub.'|'.$sub_code;
      $tb_name1=$sub.'|'.$sub_code;
      $name=mysqli_real_escape_string($conn,$tb_name);
      $name1=mysqli_real_escape_string($conn2,$tb_name1);



      if(strpos($sub,$check)==TRUE){
        $select_query = "SELECT * FROM `".$name1."`";
       
        $result = mysqli_query($conn2,$select_query) or die("ERROR".mysqli_error($conn2));
  
        //  $mysqli_row = mysqli_fetch_assoc($result);?>
    
    
       <div class="row" style="margin-left: 1%; margin-right:1%">
        <div class="col-6" >
        <table class="table table-striped" id="tablecopo" style="margin-top: 5%">
          <thead>
            <tr>
              <th scope="col">CO Code</th>
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
    <?
       while ($mysqli_row = mysqli_fetch_array($result)) {
      ?>
    <tr>
    <td> <?echo $mysqli_row['co_code']?></td>
    <td> <?echo $mysqli_row['po1']?></td>
    <td> <?echo $mysqli_row['po2']?></td>
    <td> <?echo $mysqli_row['po3']?></td>
    <td> <?echo $mysqli_row['po4']?></td>
    <td> <?echo $mysqli_row['po5']?></td>
    <td> <?echo $mysqli_row['po6']?></td>
    <td> <?echo $mysqli_row['po7']?></td>
    <td> <?echo $mysqli_row['po8']?></td>
    <td> <?echo $mysqli_row['po9']?></td>
    <td> <?echo $mysqli_row['po10']?></td>
    <td> <?echo $mysqli_row['po11']?></td>
    <td> <?echo $mysqli_row['po12']?></td>
    <td> <?echo $mysqli_row['pso1']?></td>
    <td> <?echo $mysqli_row['pso2']?></td></tr>
  
    <? } ?>
  
    </tbody>
  </table>
        </div>
    <?}




      ###########################################################################

      if(strpos($sub,$check)==FALSE){
      $select_query = "SELECT * FROM `".$name."`";
     
      $result = mysqli_query($conn,$select_query) or die("ERROR".mysqli_error($conn));

      //  $mysqli_row = mysqli_fetch_assoc($result);?>
  
  
     <div class="row" style="margin-left: 1%; margin-right:1%">
      <div class="col-6" >
      <table class="table table-striped" id="tablecopo" style="margin-top: 5%">
        <thead>
          <tr>
            <th scope="col">CO Code</th>
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
  <?
     while ($mysqli_row = mysqli_fetch_array($result)) {
    ?>
  <tr>
  <td> <?echo $mysqli_row['co_code']?></td>
  <td> <?echo $mysqli_row['po1']?></td>
  <td> <?echo $mysqli_row['po2']?></td>
  <td> <?echo $mysqli_row['po3']?></td>
  <td> <?echo $mysqli_row['po4']?></td>
  <td> <?echo $mysqli_row['po5']?></td>
  <td> <?echo $mysqli_row['po6']?></td>
  <td> <?echo $mysqli_row['po7']?></td>
  <td> <?echo $mysqli_row['po8']?></td>
  <td> <?echo $mysqli_row['po9']?></td>
  <td> <?echo $mysqli_row['po10']?></td>
  <td> <?echo $mysqli_row['po11']?></td>
  <td> <?echo $mysqli_row['po12']?></td>
  <td> <?echo $mysqli_row['pso1']?></td>
  <td> <?echo $mysqli_row['pso2']?></td></tr>

  <? } ?>

  </tbody>
</table>
      </div>
  <?}?>
    <?
    }

?>

    </div>
    </div>
    </div>   


    <script>
function exportData(){


    var table = document.getElementById("tablecopo");
 

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
                column15

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
        link.setAttribute("download", "CO_PO_Corelation mapping.csv");
        document.body.appendChild(link);

        link.click();
}
</script>


<?php
if(isset($_POST['save_changes']))
{
  $host="localhost";
  $user="root";
  $pass="";
  $db="co_po_map";
  $db1 = "college_project";
  $db2="copo_map_lab";
  $conn=new mysqli($host,$user,$pass,$db);
  $conn1=new mysqli($host,$user,$pass,$db1);
  $conn2=new mysqli($host,$user,$pass,$db2);
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];
  $tb_name=$sub.'|'.$sub_code;
  $tb_name1=$sub.'|'.$sub_code;
  $name=mysqli_real_escape_string($conn,$tb_name);
  $name1=mysqli_real_escape_string($conn2,$tb_name1);


  if(strpos($sub, $check)==TRUE){
    $create_query="CREATE TABLE `".$name1."` ( co_code VARCHAR(30), po1 INT, po2 INT,po3 INT,
     po4 INT, po5 INT,po6 INT, po7 INT, po8 INT,po9 INT,
     po10 INT, po11 INT,po12 INT, pso1 INT, pso2 INT)";
    $result = mysqli_query($conn2,$create_query) or die("ERROR".mysqli_error($conn2));
    for ($x = 1; $x <= 6; $x++) {
      $num=strval($x);
      $course="CO".$num;
      $co=$course."-";
      $data= array();
      for ($i=1; $i<=14;$i++){
        $map = $co.$i;
        array_push($data,$_POST[$map]);
      }
      $insert_query="INSERT INTO `".$name1."` (`co_code`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, 
      `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`) 
      VALUES ('$course','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]',
      '$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]')";
      $insert_result = mysqli_query($conn2,$insert_query) or die("ERROR".mysqli_error($conn2));
  
      
    }
    $updquery = "UPDATE `dash_data` SET `co_po_map`= 1 WHERE sub = '$sub' AND `subject-code`='$sub_code'";
      $updres = mysqli_query($conn1,$updquery) or die("ERROR".mysqli_error($conn1));
    echo '<script>alert("Mapping added Successfully")</script>';
  }

  if(strpos($sub,$check)==FALSE){
  $create_query="CREATE TABLE `".$name."` ( co_code VARCHAR(30), po1 INT, po2 INT,po3 INT,
   po4 INT, po5 INT,po6 INT, po7 INT, po8 INT,po9 INT,
   po10 INT, po11 INT,po12 INT, pso1 INT, pso2 INT)";
  $result = mysqli_query($conn,$create_query) or die("ERROR".mysqli_error($conn));
  for ($x = 1; $x <= 6; $x++) {
    $num=strval($x);
    $course="CO".$num;
    $co=$course."-";
    $data= array();
    for ($i=1; $i<=14;$i++){
      $map = $co.$i;
      array_push($data,$_POST[$map]);
    }
    $insert_query="INSERT INTO `".$name."` (`co_code`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, 
    `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`) 
    VALUES ('$course','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]',
    '$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]')";
    $insert_result = mysqli_query($conn,$insert_query) or die("ERROR".mysqli_error($conn));

    
  }
  $updquery = "UPDATE `dash_data` SET `co_po_map`= 1 WHERE sub = '$sub' AND `subject-code`='$sub_code'";
    $updres = mysqli_query($conn1,$updquery) or die("ERROR".mysqli_error($conn1));
  echo '<script>alert("Mapping added Successfully")</script>';
  }

 
}
?>

<?php

if(isset($_POST['remove_map']))
{
  $host="localhost";
  $user="root";
  $pass="";
  $db="co_po_map";
  $db1 = "college_project";
  $db2="copo_map_lab";
  $conn=new mysqli($host,$user,$pass,$db);
  $conn1=new mysqli($host,$user,$pass,$db1);
  $conn2=new mysqli($host,$user,$pass,$db2);
  $sub=explode(" ",$_POST['course'])[2];
  $sub_code=explode(" ",$_POST['course'])[3];
  $sem=explode(" ",$_POST['course'])[6];
  $year=explode(" ",$_POST['course'])[10];
  $tb_name=$sub.'|'.$sub_code;
  $tb_name1=$sub.'|'.$sub_code;
  $name=mysqli_real_escape_string($conn,$tb_name);
  $name1=mysqli_real_escape_string($conn2,$tb_name1);

  if(strpos($sub,$check)==TRUE){
    for ($x = 1; $x <= 6; $x++) {
      $num=strval($x);
      $course="CO".$num;
      $co=$course."-";
      $data= array();
      for ($i=1; $i<=14;$i++){
        $map = $co.$i;
        array_push($data,$_POST[$map]);
      }
      
      $delete_query = " DROP TABLE IF EXISTS `".$name1."`";
      $result = mysqli_query($conn2,$delete_query) or die("ERROR".mysqli_error($conn2));
      
  
    }
    $updquery1 = "UPDATE `dash_data` SET `co_po_map`= 0 WHERE sub = '$sub' AND `subject-code`='$sub_code'";
    $updres = mysqli_query($conn1,$updquery1) or die("ERROR".mysqli_error($conn1));
   echo '<script>alert("Mapping removed successfully")</script>';
  }
#####################################################################
  if(strpos($sub,$check)==FALSE){
  for ($x = 1; $x <= 6; $x++) {
    $num=strval($x);
    $course="CO".$num;
    $co=$course."-";
    $data= array();
    for ($i=1; $i<=14;$i++){
      $map = $co.$i;
      array_push($data,$_POST[$map]);
    }
    
    $delete_query = " DROP TABLE IF EXISTS `".$name."`";
    $result = mysqli_query($conn,$delete_query) or die("ERROR".mysqli_error($conn));
    

  }
  $updquery1 = "UPDATE `dash_data` SET `co_po_map`= 0 WHERE sub = '$sub' AND `subject-code`='$sub_code'";
  $updres = mysqli_query($conn1,$updquery1) or die("ERROR".mysqli_error($conn1));
 echo '<script>alert("Mapping removed successfully")</script>';
}
}
?>
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