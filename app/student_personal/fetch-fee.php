<?php
$connect = mysqli_connect("localhost", "root", "", "ams");
  if(isset($_POST['subject_Id'])){

  $subjectId = $_POST['subject_Id'];

  $studentName = "SELECT subject_fee from subjects WHERE subject_id = '$subjectId'";
  $result=mysqli_query($connect,$studentName);
  $row=mysqli_fetch_assoc($result);

  echo json_encode($row);
}
?>