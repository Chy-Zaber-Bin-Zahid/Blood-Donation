<?php 
    require_once('DBconnect.php');
    session_start();
    $email = $_SESSION['email'];

    if($_POST['Ban'] == "Ban"){
     
      $id = $_POST["id"];
      $ban = "Ban"; 
      $sql_add = "UPDATE user set `status` = '$ban'  where id = '$id'";
      mysqli_query($conn, $sql_add);
      header("Location: user.php");
    } 

    if ($_POST['Unban'] == "Unban"){
      $id = $_POST["id"];
      $unban = "Unban"; 
      $sql_add = "UPDATE user set `status` = '$unban'  where id = '$id'";
      mysqli_query($conn, $sql_add);
      header("Location: user.php");
    }

?>