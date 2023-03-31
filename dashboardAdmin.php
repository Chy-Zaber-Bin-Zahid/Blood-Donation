<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css link -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/adminDash.css">
  <link rel="stylesheet" href="media/dashaq.css">
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
    <form action="dashboardAdmin.php" method="post" class="profile-div filter">
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

  <!-- all donar show part -->
  <section class="section-donar">
    <div class="main-donar grid grid-col-3">

<?php 

    if(isset($_POST['submit'])){
      $group = $_POST['group'];
      $active = $_POST['active'];
      
      
      $sql_table = "SELECT * from user";
      $result_table = mysqli_query($conn, $sql_table);

      if(mysqli_num_rows($result_table) != 0){
      while($row = mysqli_fetch_assoc($result_table) ){

?>
        <?php $store = $row['group'];
        $store1 = $row['active'];

          // if($group == "All" && $active == "All"){
          //   header("Location: dashboardUser.php");
          // }

          if($group == $store && $active == $store1){
          
        ?>
            <div class="sub-donar">
              <h1>Donar Name: <span class="sub-span"><?php echo $row['f_name'], " " ,$row['l_name'];?></span></h1>
              <h1>Email: <span class="sub-span"><?php echo $row['Email'];?></span></h1>
              <h1>Phone Number: <span class="sub-span"><?php echo "0",$row['p_number'];?></span></h1>
              <h1>Blood group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
              <h1>Gender: <span class="sub-span"><?php echo $row['Gender'];?></span></h1>
              <h1>Birth Date: <span class="sub-span"><?php echo $row['b_date'];?></span></h1>
              <?php
              if ($row['active'] == "Available") {
                ?>
                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: lime;"><?php echo $row['active'];?></span></h1>
                <?php
              } else {
              ?>

                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: red;"><?php echo $row['active'];?></span></h1>
                <?php
              }
              ?>
            </div>

            <?php }?>


            <?php 
          if($group == $store && $active == "All"){
          
        ?>
            <div class="sub-donar">
              <h1>Donar Name: <span class="sub-span"><?php echo $row['f_name'], " " ,$row['l_name'];?></span></h1>
              <h1>Email: <span class="sub-span"><?php echo $row['Email'];?></span></h1>
              <h1>Phone Number: <span class="sub-span"><?php echo "0",$row['p_number'];?></span></h1>
              <h1>Blood group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
              <h1>Gender: <span class="sub-span"><?php echo $row['Gender'];?></span></h1>
              <h1>Birth Date: <span class="sub-span"><?php echo $row['b_date'];?></span></h1>
              <?php
              if ($row['active'] == "Available") {
                ?>
                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: lime;"><?php echo $row['active'];?></span></h1>
                <?php
              } else {
              ?>

                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: red;"><?php echo $row['active'];?></span></h1>
                <?php
              }
              ?>
            </div>

            <?php }?>

            <?php 
          if($group == "All" && $active == $store1){
          
        ?>
            <div class="sub-donar">
              <h1>Donar Name: <span class="sub-span"><?php echo $row['f_name'], " " ,$row['l_name'];?></span></h1>
              <h1>Email: <span class="sub-span"><?php echo $row['Email'];?></span></h1>
              <h1>Phone Number: <span class="sub-span"><?php echo "0",$row['p_number'];?></span></h1>
              <h1>Blood group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
              <h1>Gender: <span class="sub-span"><?php echo $row['Gender'];?></span></h1>
              <h1>Birth Date: <span class="sub-span"><?php echo $row['b_date'];?></span></h1>
              <?php
              if ($row['active'] == "Available") {
                ?>
                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: lime;"><?php echo $row['active'];?></span></h1>
                <?php
              } else {
              ?>

                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: red;"><?php echo $row['active'];?></span></h1>
                <?php
              }
              ?>
            </div>

            <?php }?>

            <?php 
          if($group == "All" && $active == "All"){
          
        ?>
            <div class="sub-donar">
              <h1>Donar Name: <span class="sub-span"><?php echo $row['f_name'], " " ,$row['l_name'];?></span></h1>
              <h1>Email: <span class="sub-span"><?php echo $row['Email'];?></span></h1>
              <h1>Phone Number: <span class="sub-span"><?php echo "0",$row['p_number'];?></span></h1>
              <h1>Blood group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
              <h1>Gender: <span class="sub-span"><?php echo $row['Gender'];?></span></h1>
              <h1>Birth Date: <span class="sub-span"><?php echo $row['b_date'];?></span></h1>
              <?php
              if ($row['active'] == "Available") {
                ?>
                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: lime;"><?php echo $row['active'];?></span></h1>
                <?php
              } else {
              ?>

                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: red;"><?php echo $row['active'];?></span></h1>
                <?php
              }
              ?>
            </div>

            <?php }?>


            
     

<?php }}} else{ 
      ?>
              <?php $sql_table = "SELECT * from user";
      $result_table = mysqli_query($conn, $sql_table);

      if(mysqli_num_rows($result_table) != 0){
      while($row = mysqli_fetch_assoc($result_table) ){ 
        ?>

            <div class="sub-donar">
              <h1>Donar Name: <span class="sub-span"><?php echo $row['f_name'], " " ,$row['l_name'];?></span></h1>
              <h1>Email: <span class="sub-span"><?php echo $row['Email'];?></span></h1>
              <h1>Phone Number: <span class="sub-span"><?php echo "0",$row['p_number'];?></span></h1>
              <h1>Blood group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
              <h1>Gender: <span class="sub-span"><?php echo $row['Gender'];?></span></h1>
              <h1>Birth Date: <span class="sub-span"><?php echo $row['b_date'];?></span></h1>
              <?php
              if ($row['active'] == "Available") {
                ?>
                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: lime;"><?php echo $row['active'];?></span></h1>
                <?php
              } else {
              ?>

                <h1>Status: <span class="sub-span" style="color: black; padding: .1rem 1rem; background-color: red;"><?php echo $row['active'];?></span></h1>
                <?php
              }
              ?>
            </div>

        <?php 
        }}} 
        ?>

    </div>
  </section>

  <!-- js part -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>