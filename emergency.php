<?php     require_once('DBconnect.php');
    session_start();
    $email = $_SESSION['email'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css link -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/e.css">
  <title>Blood House BD | Blood For Everyone</title>
</head>
<body>
  <header class="header">
    <nav>
      <div class="nav-img-title">
        <a class="nav-car-title" href="home.php"> <img class="nav-car-img" src="images/navicon.png" alt="navicon">Blood House BD</a>
      </div>
      <div class="nav-left-box">
        <a class="nav-left" href="home.php">Log Out</a>
      </div>
    </nav>
  </header>

  <!-- profile, search section -->
  <section class="profile-section">
    <a class="profile-a" href="profile.php">Profile</a>
    <div class="profile-div inside">
    <a class="div-a" href="emergency.php">Emergency Blood Needed</a><span class="profile-emer">0</span>
    </div>
    <a class="profile-a" href="look.php">Look For Blood</a>
    <?php
    if ($email == "admin47@gmail.com"){?>
      <a class="profile-a" href="user.php">Users</a>
      <?php
    }
    ?>
    <form action="dashboardUser.php" method="post" class="profile-div filter">
      <select class="profile-drop" id="cars" name="group">
          <option name="from" value="All">All</option>
          <option name="from" value="O+">O+</option>
          <option name="from" value="O-">O-</option>
          <option name="from" value="A+">A+</option>
          <option name="from" value="A-">A-</option>
          <option name="from" value="B+">B+</option>
          <option name="from" value="B-">B-</option>
          <option name="from" value="AB+">AB+</option>
          <option name="from" value="AB-">AB-</option>
      </select>
      <select class="profile-drop"  id="cars" name="active">
          <option name="from" value="All">All</option>
          <option name="from" value="Available">Available</option>
          <option name="from" value="Unavailable">Unavailable</option>
      </select>
      <input type="submit" value="Submit" class="profile-in" name="submit">
    </form>
  </section>

  <!-- mail part -->
  <section class="section-full grid grid-col-2">
    <div class="mail-main">
    <?php 
            $sql_add = "SELECT `status` from user where email = '$email'";
            $result = mysqli_query($conn, $sql_add);
            $row = mysqli_fetch_assoc($result);
            if($row['status'] == "Ban"){
              ?>
              <h1 class="eme-title ban">You Are Banned From Posting Any Emergency Post!</h1>
              <?php
            }
            ?>
    <form action="mail.php" method="post" class="contact-right" enctype="multipart/form-data">
            <h3 class="send-title">
              Emergency Post
            </h3>
            <p class="fill">Fill all the input!</p>
            <!-- <input
              class="email"
              type="text"
              required
              placeholder="Email Address"
            /> -->
            <input class="name" name="patient" required placeholder="Patient Name" />
            <input class="subject" name="subject" type="text" required placeholder="Subject" />
            <input class="phone" name="phone" type="tel" required placeholder="Phone No." />
            <textarea
            class="message"
            id="msg"
            minlength="10"
            rows="2"
            placeholder="Address"
            spellcheck="false"
            name="text"
            ></textarea>
            <h1 class="patient">Patient Health Document (PDF)</h1>
            <input class="phone pdf" type="file" name="pdf_file" accept=".pdf" required>
            <select class="phone change" id="cars" name="blood">
          <option name="from" value="O+">O+</option>
          <option name="from" value="O-">O-</option>
          <option name="from" value="A+">A+</option>
          <option name="from" value="A-">A-</option>
          <option name="from" value="B+">B+</option>
          <option name="from" value="B-">B-</option>
          <option name="from" value="AB+">AB+</option>
          <option name="from" value="AB-">AB-</option>
      </select>
            <input <?php 
            $sql_add = "SELECT `status` from user where email = '$email'";
            $result = mysqli_query($conn, $sql_add);
            $row = mysqli_fetch_assoc($result);
            if($row['status'] == "Ban"){
              echo "disabled";
            }
            ?> onclick="submit()" class="contact-btn" type="submit" value="Send" name="submit"></input>
          </form>
    </div>
    <div class="mail-show">

      <div class="mail-design">
      <?php 


     //Reset and Update line by line start from 1 and increament by 1 at id
     $query=mysqli_query($conn,"select * from urgent");
     $number=1;
     while($row=mysqli_fetch_array($query)){
         $id=$row['id'];//PLEASE CHANGE ACCORDING TO YOUR DATABASE AUTO-INCREAMENT ID
         $sql = "UPDATE urgent SET id=$number WHERE id=$id";
         if($conn->query($sql) == TRUE){
             // echo "Record RESET succesfully<br>";
         }
         $number++;
     }
     //Alter the increment to the latest number(bigger number)
     $sql = "ALTER TABLE urgent AUTO_INCREMENT =1"; //CHANGE TABLE NAME
     if($conn->query($sql) == TRUE){
         // echo "Record ALTER succesfully";
     }else{
         // echo"Error ALTER record: " . $conn->error;
     } 

      
      $sql_table = "SELECT * from urgent order by id desc";
      $result_table = mysqli_query($conn, $sql_table);
    

      if(mysqli_num_rows($result_table) != 0){
      while($row = mysqli_fetch_assoc($result_table) ){

?>

        <form  action="deletePost.php" method="post" class="mail-show-sub">

              <h1 class="eme-title">Emergency Post Number: <?php echo $row['id'];?></h1>
              <h1>Patient Name: <span class="sub-span"><?php echo $row['name'];?></span></h1>
              <h1>Subject: <span class="sub-span"><?php echo $row['sub'];?></span></h1>
              <h1>Contract Number: <span class="sub-span"><?php echo "0",$row['phone'];?></span></h1>
              <h1>Blood Group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
              <h1>Address: <span class="sub-span"><?php echo $row['message'];?></span></h1>
              <h1>Searcher Email: <span class="sub-span"><?php echo $row['email'];?></span></h1>
              <a class="pdf-down" target="_blank" href="<?php echo "upload/".$row['pdf'];?>">Download Patient Health Document ⬇</a>
              <?php
              if($email == $row['email'] || $email == "admin47@gmail.com"){
                ?>
                <div class="delete">
                  <label class="del-lable" for="">Post Id:</label>
                  <input class="delete-input" name="id" required placeholder="Enter Post Number" type="number">
                  <input type="submit" class="emg-btn" name="delete" value="Delete">
                </div>
              <?php
              }?>
              <p class="time">
              <?php 
              echo $row['time']; 
              ?>
              </p>
      </form>
              

              <?php }} ?>
      </div>
    
    </div>
  </section>



 



  <!-- js part -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>