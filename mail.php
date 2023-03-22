<?php 

    require_once('DBconnect.php');
    session_start();
    // require_once('PHPMailer/PHPMailerAutoload.php');
    $email = $_SESSION['email'];
    if(isset($_POST['submit'])){
      $patient = $_POST['patient'];
      $subject = $_POST['subject'];
      $phone = $_POST['phone'];
      $message = $_POST['text'];
      $pdf = $_FILES['pdf_file']['name'];
      $tmp = $_FILES['pdf_file']['tmp_name'];
      $upload = 'upload/'.$pdf;
      $blood = $_POST['blood'];

      
      date_default_timezone_set('Asia/Dhaka');

          $store3 = date("Y/m/d | H:i:s | A");


        // $sql = "SELECT * from user WHERE email = '$email'";

        // //Execute
        // $result = mysqli_query($conn, $sql);

        //latest id
        $sql_id = "SELECT count(*) from urgent";
        $result_id = mysqli_query($conn, $sql_id);
        $rows = mysqli_num_rows($result_id);
        if($rows>0){
        while($row = mysqli_fetch_assoc($result_id) ){
            $id =  $row['count(*)'] + 1;
        }}

        $sql_add = "INSERT INTO urgent VALUES ('$id','$patient', '$subject', '$phone', '$blood', '$message','$pdf', '$store3', '$email')";

        mysqli_query($conn, $sql_add);
        move_uploaded_file($tmp,$upload);
        // include 'success.php';
        header("Location: emergency.php");

        // check if it returns an empty set
        // if(mysqli_num_rows($result) > 0){
        //     include 'emergency.php';
        // }else{

        // }

        






        
    }
    ?>