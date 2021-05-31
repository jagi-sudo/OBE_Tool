<html>

<?php
// Start the session
session_start();
$host="localhost";
$user="root";
$pass="";
$db="college_project";
$id = $_SESSION['user_id'];
$branch=$_SESSION['branch'];
$desgn=$_SESSION['desgn'];
$conn=new mysqli($host,$user,$pass,$db);
$query="SELECT  * FROM `po_db` WHERE branch = '$branch'";
$result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));

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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php" style="font-size:110%;"><i class="fab fa-dashcube"></i>&nbsp; Dashboard</a><a class="nav-link" href="reports.php"style="font-size:110%;"><i class="fas fa-file-invoice"></i>&nbsp; Reports</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="curriculum.php"style="font-size:110%;"><i class="fas fa-book-open"></i><span>&nbsp; Curriculum</span></a><a class="nav-link active" href="download_reports.php"style="font-size:110%;"><i class="fas fa-file-download"></i><span>&nbsp;Download Reports</span></a><a class="nav-link" href="UserProfile.php"style="font-size:110%;"><i class="fas fa-user"></i><span>&nbsp; Profile</span></a></li>
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
                    <h3>Download Reports</h3>
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

    <div class='col-10' style="padding:1%; ">

      <p style="font-size:large;">Download Reports From Here!  </p> 
      <form class="needs-validation" method="post" action="" enctype="multipart/form-data" style="margin-left:0.5%" novalidate> 
        <div class="form-row" style="margin-top:-8%;">
          
          <div class="form-group" style="margin-right: 1%">
          <select name="course" class="form-control custom-select" required>
                    <option value="" disabled selected>Choose Program</option>
                    <?php
                      while($row = mysqli_fetch_array($result)){
                    ?>
                    <option><?echo $row['branch']." ".$row['year']; ?></option>
                      <?}?>
                  </select>
          </div>
			
      <div class="form-group" style="margin-right: 1%">
      <button class="btn btn-primary" name="show">Generate</button>
      </div>
      </div>
      </form>
      



  </div>
</div>
<?php
    if(isset($_POST['show']))
    {
      $host="localhost";
      $user="root";
      $pass="";
     
      $db1 = "college_project";
     
      $conn=new mysqli($host,$user,$pass,$db1);
      $year=explode(" ",$_POST['course'])[1];
      #print_r($year);

    
      $select_query = "SELECT * FROM `po_att` WHERE `year`='$year' AND `po_code`='Target' OR `po_code`='PO Threshold Base'";
     
      $result = mysqli_query($conn,$select_query) or die("ERROR".mysqli_error($conn));

      //  $mysqli_row = mysqli_fetch_assoc($result);?>
  
  
     
      <table class="table table-striped" id="tablecopo" style="margin-top: 5%">
        <thead>
          <tr>
            <th scope="col">Course</th>
            <th scope="col">Semester</th>
            <th scope="col">Year</th>
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
        <td> <?echo $mysqli_row['Subject']?></td>
        <td> <?echo $mysqli_row['Semester']?></td>
        <td> <?echo $mysqli_row['year']?></td>
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
        <td> <?echo $mysqli_row['pso2']?></td>
       
        
        </tr>

  <? } ?>

  </tbody>
</table>
<button onclick="exportData()" class="btn btn-warning">Download CSV <i class="fa fa-download"></i></button>
      
    <?
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


      
 </div>
    </div>
    </div>  
<script>
	function login_error() {
	alert("Function not available");
	}
</script>


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
      column16 = row.cells[15].innerText;
      column17 = row.cells[16].innerText;

 

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
              column16,
              column17,
    

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
        link.setAttribute("download", "CO_PO_Attainment_Table.csv");
        document.body.appendChild(link);

        link.click();
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