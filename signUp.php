<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css link -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/signUp.css">
  <link rel="stylesheet" href="media/signupq.css">
  <title>Blood House BD | Blood For Everyone</title>
</head>
<body>
  <header class="header">
    <nav>
    <div class="nav-img-title">
        <a class="nav-car-title" href="home.php"> <img class="nav-car-img" src="images/navicon.png" alt="navicon">Blood House BD</a>
      </div>
      <div class="nav-left-box">
        <a class="nav-left" href="home.php">Home</a>
        <a class="nav-left" href="signIn.php">Sign in</a>
      </div>
    </nav>
  </header>

  <section class="sec-1">
        <form class="sign-up-main grid grid-col-2"  method = "post" id="login-area" enctype="multipart/form-data">
            <div class="two-part left-part common">
                <img class="left-img" src="images/signupbackground1.jpg" alt="">
            </div>
            <div class="two-part right-part common right">
                <div class="right-first right-back">
                    <h1 class="signup-title">First Name</h1>
                    <input class="input-box" type="text" placeholder="First Name" name = "fname">
                    <h1 class="signup-title">Last Name</h1>
                    <input class="input-box" type="text" placeholder="Last Name" name = "lname">
                    <h1 class="signup-title">Email</h1>
                    <input class="input-box" type="text" placeholder="Email" name = "email">
                    <h1 class="signup-title">Date of Birth</h1>
                    <input class="input-box" type="date" placeholder="Birth Date" name = "bdate">
                    <div>
                        <input class="btn btn-dark" name="submit" type="submit" value = "Sign Up">
                        <h4 style="color: gray;">Already a member? <a href="signIn.php"><span class="btn-span" style="color: black;">Sign In</span></a></h4>
                    </div>
                </div>
                <div class="right-last right-back">
                    <h1 class="signup-title">Password</h1>
                    <input class="input-box" type="password" placeholder="Password" name = "pass">
                    <h1 class="signup-title">Phone Number</h1>
                    <input class="input-box" type="tel" placeholder="Phone Number" name = "num">
                    <h1 class="signup-title">Blood Group</h1>
                    <select class="input-box" class="mechanic" id="cars" name="group">
                      <option name="from" value="O+">O+</option>
                      <option name="from" value="O-">O-</option>
                      <option name="from" value="A+">A+</option>
                      <option name="from" value="A-">A-</option>
                      <option name="from" value="B+">B+</option>
                      <option name="from" value="B-">B-</option>
                      <option name="from" value="AB+">AB+</option>
                      <option name="from" value="AB-">AB-</option>
                      </select>
                    <h1 class="signup-title">Your Health Document (PDF)</h1>
                    <input class="input-file" type="file" name="pdf_file" accept=".pdf">
                    <h1 class="signup-title">Gender</h1>
                    <input type="radio" value="Male" name = "gender">
                    <label class="gen-text" for="male">Male</label><br>
                    <input type="radio" value="Female" name = "gender">
                    <label class="gen-text" for="female">Female</label><br>
                    <input type="radio" value="Other" name = "gender">
                    <label class="gen-text" for="other">Other</label>

                </div>
            </div>
        </form>
    </section>

    <?php 
    require_once('DBconnect.php');
    session_start();
    
    if(isset($_POST['submit'])){
      $fn = $_POST['fname'];
      $ln = $_POST['lname'];
      $e = $_POST['email'];
      $bd = $_POST['bdate'];
      $p = $_POST['pass'];
      $n = $_POST['num'];
      $group = $_POST['group'];
      $g = $_POST['gender'];
      $pdf = $_FILES['pdf_file']['name'];
      $tmp = $_FILES['pdf_file']['tmp_name'];
      $upload = 'upload/'.$pdf;
      $active = "Available";
      $status = "Unban";


        $sql = "SELECT * from user WHERE email = '$e' AND password = '$p'";

        //Execute
        $result = mysqli_query($conn, $sql);

        //latest id
        $sql_id = "SELECT count(*) from user";
        $result_id = mysqli_query($conn, $sql_id);
        $rows = mysqli_num_rows($result_id);
        if($rows>0){
        while($row = mysqli_fetch_assoc($result_id) ){
            $id =  $row['count(*)'] + 1;
        }}

        $sql_add = "INSERT INTO user VALUES ('$id', '$fn', '$ln', '$e', '$bd', '$p', '$n', '$group', '$pdf', '$g', '$active', '$status')";

        // check if it returns an empty set
        if(mysqli_num_rows($result) > 0){
            include 'exist.php';
        }else{
            mysqli_query($conn, $sql_add);
            move_uploaded_file($tmp,$upload);
            $_SESSION['email'] = $e;
            include 'success.php';
        }
    }
    ?>
    
    
  </body>
</html>