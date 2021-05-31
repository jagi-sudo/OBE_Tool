<?php
if(isset($_POST['password']) || $_POST['reset_link_token'] || $_POST['email'])
{
include "db.php";
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$new_pass1 = $_POST['newpass1'];
$new_pass2 = $_POST['newpass2'];
$query = mysqli_query($conn,"SELECT * FROM `teacher_acc_db` WHERE `reset_link_token`='".$token."' and `EMAIL`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
  if($new_pass1 == $new_pass2){

    mysqli_query($conn,"UPDATE teacher_acc_db set  password='" . $new_pass2 . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE EMAIL='" . $emailId . "'");
    echo '<script type="text/javascript">
        alert("Congratulations! Your password has been updated successfully!");
        window.location = "index.php";
      </script>';

  }
  else{
    echo '<script type="text/javascript">
    alert("Check if Passwords Match!");
    window.location = "forget-pass.php";
    </script>';
    }

}
}
?>