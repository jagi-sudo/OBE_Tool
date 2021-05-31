<!DOCTYPE html>
<?php

if(isset($_POST['submit_cred'])){
  $user_id =$_POST["InputEmail"];
  $password=$_POST["InputPassword"];
  $host="localhost";
  $user="root";
  $pass="";
  $db="college_project";
  $conn=new mysqli($host,$user,$pass,$db);
  $user_id =mysqli_real_escape_string($conn,$user_id);
  $password=mysqli_real_escape_string($conn,$password);
  $link = "<script>window.open('dashboard.php', target='_self')</script>";
  $ct_query = "SELECT COUNT(*) FROM `teacher_acc_db` WHERE EMAIL ='$user_id'";
  $ct_result = mysqli_query($conn,$ct_query) or die("ERROR".mysqli_error($conn));
  $ct_row = mysqli_fetch_array($ct_result);
  if($ct_row['COUNT(*)'] !=0)
  { 
    $query="SELECT * FROM `teacher_acc_db` WHERE EMAIL ='$user_id'";
    $result = mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if($row['EMAIL'] == $user_id AND $row['password']== $password){
      session_start();
      $_SESSION["user_id"] = $row['EMAIL'];
      $_SESSION["desgn"] = $row['designation'];
      $_SESSION["branch"] = $row['branch'];
      $_SESSION["f_name"]= $row['f_name'];
      $_SESSION["s_name"]= $row['s_name'];
    }
   
    if (!filter_var($user_id, FILTER_VALIDATE_EMAIL)){
     $user_idErr="Invalid User ID Format!";
    }
    elseif($row['password'] != $password){
      echo '<script>alert("Password Entered Is Incorrect")</script>';
    }
  }
  else{
    echo '<script>alert("User not found !!")</script>';
  }
}



?>

<!--HTML CODE FOR THE FRONTEND -->
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">
    <link rel="stylesheet" href="assets/css/test.css">
    
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/sies3.png?h=bf42541dbfae7f64886c1bad71d4d4d3&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">OBE Tool Login</h4>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group"><input class="form-control" type="email" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter ID" name="InputEmail"></div>
                                        <div class="form-group"><input class="form-control" type="password" id="InputPassword" placeholder="Password" name="InputPassword"></div>
                                        <div class="form-group">
                                           
                                        </div>
                                        
                                        
                                        
                                        <?php 
          
          if(session_status() == PHP_SESSION_NONE){ 
          
          echo '<button class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit_cred">Login</button>';

          echo'<br><div class="text-center"><a class="small" href="register.php">Sign Up</a></div>';
         }
          else {
            echo $link;
          
           
          }
          ?>
            
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php" >Forgot Password?</a></div>
                                   



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js?h=83e266cb1712b47c265f77a8f9e18451"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js?h=e46528792882c54882f660b60936a0fc"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js?h=6d33b44a6dcb451ae1ea7efc7b5c5e30"></script>
    <script src="alertify/alertify.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>


</html>


