<?php
$contents=$_POST['cc'];
$id=$_POST['id'];
$sub=$_POST['subj'];
$sem=$_POST['semester'];
$year=$_POST['years'];


$file = fopen("CO.csv","w");

foreach ($contents as $line) {
  fputcsv($file, $line);
}

fclose($file);

$host="localhost";
$user="root";
$pass="";
$db="college_project";
$conn=new mysqli($host,$user,$pass,$db);

$handle = fopen("CO.csv", "r");
while($data = fgetcsv($handle))
   {
    $co_code = mysqli_real_escape_string($conn, $data[0]);
    $internal = mysqli_real_escape_string($conn, $data[1]);
    $external = mysqli_real_escape_string($conn, $data[2]);
    $overall = mysqli_real_escape_string($conn, $data[3]);
  

    $query = "INSERT INTO `co_att`(`co_code`, `Teacher_ID`, `Subject`, `Semester`,`year`,`internal`,`external`,`overall`)
      VALUES ('$co_code','$id','$sub','$sem','$year','$internal','$external','$overall')";
    $insert_query=mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
   }
   
unlink("CO.csv");
if(isset($insert_query))
{
        echo '<script>alert("CO Attainment Uploaded Successfully !!")</script>';
}

?>