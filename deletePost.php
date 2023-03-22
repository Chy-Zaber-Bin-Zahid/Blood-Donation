<?php
  require_once('DBconnect.php');
session_start();
$email = $_SESSION['email'];


  if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM urgent WHERE id = $id And email = '$email'";
    mysqli_query($conn, $sql);
    header("Location: emergency.php");
  }
?>