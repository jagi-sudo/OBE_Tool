<?php
if(isset($_POST['password-reset-token']) || $_POST['email'])
{
    include "db.php";
    
     
    
    $emailId = $_POST['email'];
 
    $result = mysqli_query($conn,"SELECT * FROM teacher_acc_db WHERE EMAIL='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
    $update = mysqli_query($conn,"UPDATE teacher_acc_db set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE EMAIL='" . $emailId . "'");
 
    $link = "<a href='http://localhost/forget-pass.php?key=".$emailId."&amp;token=".$token."'>Click To Reset password</a>";
 
    require_once('phpmailer/PHPMailerAutoload.php');
 
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->isSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "obesiesgst@gmail.com";
    // GMAIL password
    $mail->Password = "Siesgstobe_123";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='obesiesgst@gmail.com';
    $mail->FromName='SIES';
    $mail->AddAddress($emailId);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      
        echo '<script type="text/javascript">
        alert("Check Your Email and Click on the link sent to your email");
        window.location = "index.php";
      </script>';
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo '<script> alert("Invalid Email Address. Go back")</script>';
  }
}
?>