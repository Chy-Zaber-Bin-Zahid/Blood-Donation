<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css link -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/u.css">
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
    <a class="profile-a" href="look.php">Look For Blood</a>
    <a class="profile-a" href="user.php">Users</a>
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

  <!-- ban part -->
  <section class="section-ban grid grid-col-2">
    <div class="user-show grid grid-col-3">
      <h1 class="user-title">Id</h1>
      <h1 class="user-title">Name</h1>
      <h1 class="user-title">Email</h1>
      <?php 
      $sql_chat = "SELECT `id`,`f_name`,`l_name`,`email` from user order by id asc";
      $result_chat = mysqli_query($conn, $sql_chat);
      if(mysqli_num_rows($result_chat) != 0){
        while($row_chat = mysqli_fetch_assoc($result_chat) ){ ?>
        <p class="user-p"><?php echo $row_chat['id'];?></p>
        <p class="user-p"><?php echo $row_chat['f_name'], " " ,$row_chat['l_name'];?></p>
        <p class="user-p"><?php echo $row_chat['email'];?></p>
        <?php
        }}
      ?>
    </div>
    <div class="ban-main">
        <div class="grid grid-col-2 ban-form" >
          <form method="post" action="ban.php">
            <h1>Ban User</h1>
            <input placeholder="User Id" name="id" type="number">
            <input class="ban-btn" name="Ban" value="Ban" type="submit">
          </form>
          <form method="post" action="ban.php">
            <h1>Unban User</h1>
            <input placeholder="User Id"  name="id" type="number">
            <input class="ban-btn unban" name="Unban" value="Unban" type="submit">
          </form>
        </ >
    </div>
  </section>
  


 

  <script src="js/script.js"></script>
  </body>
</html>

