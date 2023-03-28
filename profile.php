<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css link -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/pfc.css">
  <link rel="stylesheet" href="media/profileq.css">
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
  
  <!-- info part -->
  <section class="section-info">
  <div class="info grid grid-col-2">
  <?php 
    require_once('DBconnect.php');
      $sql_table = "SELECT * from user where email = '$email'";
      $result_table = mysqli_query($conn, $sql_table);

      if(mysqli_num_rows($result_table) != 0){
      while($row = mysqli_fetch_assoc($result_table) ){

?>            
              <h1>Your Id: <span class="sub-span"><?php echo $row['id'];?></span></h1>
              <h1>Donar Name: <span class="sub-span"><?php echo $row['f_name'], " " ,$row['l_name'];?></span></h1>
              <h1>Email: <span class="sub-span"><?php echo $row['Email'];?></span></h1>
              <h1>Phone Number: <span class="sub-span"><?php echo "0",$row['p_number'];?></span></h1>
              <h1>Password: <span class="sub-span"><?php echo $row['Password'];?></span></h1>
              <h1>Blood Group: <span class="sub-span blood"><?php echo $row['group'];?></span></h1>
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
              <?php }}?>
  </div>
  <form method="post" class="edit grid grid-col-2">
    
    
          <div>
            <h1>Your First Name</h1>
            <input class="edit-input" required placeholder="Name" type="text" name="f_name"></input>
          </div>

          <div>
          <h1>Your Last Name</h1>
          <input class="edit-input" required placeholder="Name" type="text" name="l_name"></input>
          </div>
          
          <div>
          <h1>Phone Number</h1>
          <input class="edit-input" required placeholder="Phone" type="number" name="phone"></input>
          </div>

          <div>
          <h1>Password</h1>
          <input class="edit-input" required placeholder="Password" type="text" name="pass"></input>
          </div>
         

          <div>
          <h1>Blood Group</h1>
          <select class="edit-input" id="cars" name="group">
                      <option name="from" value="O+">O+</option>
                      <option name="from" value="O-">O-</option>
                      <option name="from" value="A+">A+</option>
                      <option name="from" value="A-">A-</option>
                      <option name="from" value="B+">B+</option>
                      <option name="from" value="B-">B-</option>
                      <option name="from" value="AB+">AB+</option>
                      <option name="from" value="AB-">AB-</option>
          </select>
          </div>
         
          <div>
          <h1>Birth Date</h1>
          <input class="edit-input" required type="date" name="bd"></input>
          </div>
         
          <div>
          <h1 class="status">Status</h1>
          <select class="edit-input"  id="cars" name="active">
            <option name="from" value="Available">Available</option>
            <option name="from" value="Unavailable">Unavailable</option>
          </select>
          </div>
    
          

        

          

          <div>
          <h1>Gender</h1>
          <input type="radio" value="Male" name = "gender">
          <label class="gen-text" for="male">Male</label><br>
          <input type="radio" value="Female" name = "gender">
          <label class="gen-text" for="female">Female</label><br>
          <input type="radio" value="Other" name = "gender">
          <label class="gen-text" for="other">Other</label>
          </div>

          <div class="edit-div-btn">
          <input type="submit" value="Edit" name="submit" class="edit-btn">
          </div>
  </form>
  <?php 

    if(isset($_POST['submit'])){
      $f_name = $_POST['f_name'];
      $l_name = $_POST['l_name'];
      $phone = $_POST['phone'];
      $pass = $_POST['pass'];
      $group = $_POST['group'];
      $bd = $_POST['bd'];
      $active = $_POST['active'];
      $gender = $_POST['gender'];

      $sql_add = "UPDATE user set f_name = '$f_name', l_name = '$l_name', p_number = '$phone', `password` = '$pass', b_date = '$bd', `group` ='$group', gender = '$gender', active = '$active'  where Email = '$email'";

      mysqli_query($conn, $sql_add);
      header("Location: profile.php");
      
    }?>
  </section>

</body>
</html>