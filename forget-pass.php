<!DOCTYPE html>




<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=449f70efab40515c6436d26cfeeab333">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css?h=bd36a0e1e15ca19cbc401cc5f46ca8ca">
    <link rel="stylesheet" href="assets/css/untitled.css?h=89e52523c183d7d29065d6834ac06251">





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
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-password-image" style="background-image: url(&quot;assets/img/sies3.png?h=430aabda8f7926f94f558f54049fc6e6&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-2">Forgot Your Password?</h4>
                                        
                                    </div>
                                    <?php
                                    if($_GET['key'] || $_GET['token'])
                                    {
                                    include "db.php";
                                    $email = $_GET['key'];
                                    $token = $_GET['token'];
                                    $query = mysqli_query($conn,
                                    "SELECT * FROM `teacher_acc_db` WHERE `reset_link_token`='".$token."' and `EMAIL`='".$email."';"
                                    );
                                    $curDate = date("Y-m-d H:i:s");
                                    if (mysqli_num_rows($query) > 0) {
                                        $row= mysqli_fetch_array($query);
                                        if($row['exp_date'] >= $curDate){ 
                                    ?>
                                    <form name="frmChange" action="update-forget-password.php" method="post">
                                        
                                        <input type="hidden" name="email" value="<?php echo $email;?>">
                                        <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input type="password" name="newpass1" class="form-control" id="examplePasswordInput" onKeyUp="checkPasswordStrength();">
                                        </div> 
                                        <div id="password-strength-status"></div><br>              
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Confirm New Password</label>
                                        <input type="password" name="newpass2" class="form-control">
                                        </div>
                                        <input type="submit" value="submit" class="btn btn-primary">
                                    </form>
                                    <?php 
                                    } 
                                }
                                
                                else{
                                    echo '<script>alert("This forget password link has been expired")</script>';
                                }
                                }
                                ?>
                                    

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
</body>

</html>

