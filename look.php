<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css link -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lk.css">
  <link rel="stylesheet" href="media/lookqu.css">
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
    <div class="profile-div inside top-e">
    <a class="div-a" href="emergency.php">Emergency Blood Needed</a>
    <?php 
    require_once('DBconnect.php');
    session_start();
    $email = $_SESSION['email'];

    $sql = "SELECT COUNT(*) as count FROM urgent";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['count'] != "0") {
          ?>
          <span class="profile-emer"><?php echo $row['count']; ?></span>
        
        
  <?php
}
    ?>
    </div>
    <a class="profile-a top" href="look.php">Look For Blood</a>
    <?php
    if ($email == "admin47@gmail.com"){?>
      <a class="profile-a" href="user.php">Users</a>
      <?php
    }
    ?>
    <form action="dashboardUser.php" method="post" class="profile-div filter top">
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
  
  <!-- chat part -->
  <section class="section-chat">
    <div class="shout-box">
      <div class="shout-show">

      <?php 
          require_once('DBconnect.php');
          // session_start();
          // $email = $_SESSION['email'];



          $sql_chat = "SELECT `name`,`message`,`group`,`date` from chat";
          $result_chat = mysqli_query($conn, $sql_chat);
          if(mysqli_num_rows($result_chat) != 0){
            while($row_chat = mysqli_fetch_assoc($result_chat) ){ ?>
      <div class="end">
        <h1 class="shout-message"><?php $name = $row_chat['name']; $store = "(".$row_chat['group']."): "; echo $name;?> <span class="shout-blood"><?php echo $store;?></span> <span class="shout-span"><?php echo $row_chat['message']?></span>
        </h1>
        <h1 class="date"><?php echo $row_chat['date'];?></h1>
        </div>
<?php }} ?>
      </div>
      <form action="href.php" method="post" class="show-form">
        <textarea placeholder="Shout 📣" required name="text" id=""  class="shout-text"></textarea>
        <input type="submit" class="shout-btn" name="submit" value="Send">
      </form>
    </div>
  </section>

 

  <script src="js/script.js"></script>
  </body>
</html>

