<!DOCTYPE html>

<?php
if(isset($_POST['add_user'])){
 $fname = $_POST['f_name'];
 $sname = $_POST['s_name']; 
 $uid = $_POST['u_id'];
 $pass_add = $_POST['pass_add'];
 $desgn =$_POST['desgn'];
 $branch = $_POST['branch'];
 $host="localhost";
  $user="root";
  $pass="";
  $db="college_project";
  $conn=new mysqli($host,$user,$pass,$db);
  $fname = mysqli_real_escape_string($conn,$fname);
  $sname = mysqli_real_escape_string($conn,$sname);
  $uid = mysqli_real_escape_string($conn,$uid);
  $branch = mysqli_real_escape_string($conn,$branch);
  $pass_add = mysqli_real_escape_string($conn,$pass_add);
  $desgn = mysqli_real_escape_string($conn,$desgn);

 
  
  if($desgn== "Teacher" OR $desgn == "HOD"){
  $q1="SELECT COUNT(*) FROM `teacher_acc_db` WHERE EMAIL ='$uid'";
  $hod_query="SELECT COUNT(*) FROM `teacher_acc_db` WHERE designation= '$desgn' AND branch='$branch'";
  $query1="SELECT * FROM `teacher_acc_db` WHERE designation= '$desgn' AND branch='$branch'";
  
  $result1 = mysqli_query($conn,$query1) or die("ERROR".mysqli_error($conn));
  $row1 = mysqli_fetch_array($result1);


  $result = mysqli_query($conn,$q1) or die("ERROR".mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  $domain = explode('@',$uid)[1];
  if($row1['designation']=="HOD")
  {
    echo '<script>alert("Only one Account for HOD can be allocated in a particular branch!")</script>';

  }
  elseif($row['COUNT(*)'] == 0  AND $domain == 'gst.sies.edu.in'){
    
      $q_insert="INSERT INTO `teacher_acc_db`(`f_name`, `s_name`, `EMAIL`, `password`, `branch`, `designation`) VALUES ('$fname','$sname','$uid','$pass_add','$branch','$desgn')";
      $resultq = mysqli_query($conn,$q_insert) or die("ERROR".mysqli_error($conn));
      echo '<script>alert("Account Created Successfully")</script>';
  }
  
  elseif($row['COUNT(*)']!=0){
    echo '<script>alert("User Already Exists")</script>';
  }
  else{
    echo '<script>alert("Please Try Again")</script>';
  }
  }

}


?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OBE - Register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">
    <link rel="stylesheet" href="assets/css/test.css">
   





    <style>
    .demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
#password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
.medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
.weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
.strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
</style>
    
</head>


<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/sies3.png?h=a0a7d00bcd8e4f84f4d8ce636a8f94d4&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Sign Up!</h4>
                            </div>
                            <form class="user" method="post" action="" novalidate>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control" type="text" id="exampleFirstName" placeholder="First Name" name="f_name"></div>
                                    <div class="col-sm-6"><input class="form-control" type="text" id="exampleFirstName" placeholder="Last Name" name="s_name"></div>
                                </div>
                                <div class="form-group"><input class="form-control" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="User ID" name="u_id"></div>
                                <div class="form-group "><input class="form-control" type="password" id="examplePasswordInput" placeholder="Password" name="pass_add" onKeyUp="checkPasswordStrength();"></div>
                                <div id="password-strength-status"></div>
                                   
                                <br><hr>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                  
                                      <select id="desgn" name="desgn" class="form-control custom-select" required>
                                      <option value="" disabled selected>Choose Designation</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="HOD">HOD</option>
                                        <!-- <option valu>Principal</option> -->
                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                  
                                      <select id="branch" name="branch" class="form-control custom-select" required >
                                      <option value="" disabled selected>Choose Branch</option>
                                        <option>Computers</option>
                                        <option>IT</option>
                                        
                                        <!-- <option>College - Principal</option> -->
                                      </select>
                                    </div>
                                  </div>

                                <button class="btn btn-primary btn-block text-white btn-user" type="submit" name="add_user">Sign Up</button>
                                
                            </form>
                            
                            <div class="text-center"><a class="small" href="index.php">Login</a></div>
                            
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


<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function checkPasswordStrength() {
var number = /([0-9])/;
var alphabets = /([a-zA-Z])/;
var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
if($('#examplePasswordInput').val().length<6) {
$('#password-strength-status').removeClass();
$('#password-strength-status').addClass('weak-password');
$('#password-strength-status').html("Weak (should be atleast 6 characters.)");
} else {  	
if($('#examplePasswordInput').val().match(number) && $('#examplePasswordInput').val().match(alphabets) && $('#examplePasswordInput').val().match(special_characters)) {            
$('#password-strength-status').removeClass();
$('#password-strength-status').addClass('strong-password');
$('#password-strength-status').html("Strong");
} else {
$('#password-strength-status').removeClass();
$('#password-strength-status').addClass('medium-password');
$('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
}}}

</script>


    
</html>

