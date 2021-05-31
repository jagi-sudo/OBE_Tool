<?php
$contents=$_POST['cc'];
$id=$_POST['id'];
$sub=$_POST['subj'];
$sem=$_POST['semester'];
$year=$_POST['years'];


$file = fopen("PO.csv","w");

foreach ($contents as $line) {
  fputcsv($file, $line);
}

fclose($file);

$host="localhost";
$user="root";
$pass="";
$db="college_project";
$conn=new mysqli($host,$user,$pass,$db);

$handle = fopen("PO.csv", "r");
while($data = fgetcsv($handle))
   {
    $po_code = mysqli_real_escape_string($conn, $data[0]);
    $po1 = mysqli_real_escape_string($conn, $data[1]);
    $po2 = mysqli_real_escape_string($conn, $data[2]);
    $po3 = mysqli_real_escape_string($conn, $data[3]);
    $po4 = mysqli_real_escape_string($conn, $data[4]);
    $po5 = mysqli_real_escape_string($conn, $data[5]);
    $po6 = mysqli_real_escape_string($conn, $data[6]);
    $po7 = mysqli_real_escape_string($conn, $data[7]);
    $po8 = mysqli_real_escape_string($conn, $data[8]);
    $po9 = mysqli_real_escape_string($conn, $data[9]);
    $po10 = mysqli_real_escape_string($conn, $data[10]);
    $po11 = mysqli_real_escape_string($conn, $data[11]);
    $po12 = mysqli_real_escape_string($conn, $data[12]);
    $pso1 = mysqli_real_escape_string($conn, $data[13]);
    $pso2 = mysqli_real_escape_string($conn, $data[14]);
  

    $query = "INSERT INTO `po_att`(`po_code`, `Teacher_ID`, `Subject`, `Semester`,`year`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, 
    `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`)
      VALUES ('$po_code','$id','$sub','$sem','$year','$po1','$po2','$po3','$po4','$po5','$po6','$po7','$po8','$po9','$po10','$po11','$po12','$pso1','$pso2')";
    $insert_query=mysqli_query($conn,$query) or die("ERROR".mysqli_error($conn));
   }
   unlink("PO.csv");
if(isset($insert_query))
{
        echo '<script>alert("PO Attainment Uploaded Successfully !!")</script>';
}

?>