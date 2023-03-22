<?php 
  require_once('DBconnect.php');
  session_start();
  $email = $_SESSION['email'];
     
     if(isset($_POST['submit'])){
       $text = $_POST['text'];
       
       
       $sql_table = "SELECT f_name, l_name, `group` from user where email = '$email'";
       $result_table = mysqli_query($conn, $sql_table);
       if(mysqli_num_rows($result_table) != 0){
         while($row = mysqli_fetch_assoc($result_table) ){
   
   ?>
           <?php 
 
           $name = $row['f_name']." ".$row['l_name'];
           $group = $row['group'];
          //  $store3 = date("Y/m/d")." ".date("h:i:sa");
          date_default_timezone_set('Asia/Dhaka');

          $store3 = date("Y/m/d | H:i:s | A");
           
           $sql_add = "INSERT INTO chat VALUES ('$name', '$email', '$text', '$group','$store3')";
 
           mysqli_query($conn, $sql_add);
 
           header("Location: look.php");
           
           }}
               
           }?>
 