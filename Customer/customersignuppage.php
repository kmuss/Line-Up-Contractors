<?php require_once('dbhelper.php'); ?>
  <?php 
   

session_start();

// Checks if submit has been pushed
if(isset($_POST['submit'])) {

  // GET DETAILS FROM FORM
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password1 = $_POST['password1'];
  // Using the default PHP hash function method to encrypt my password
  $hash = password_hash($password, PASSWORD_DEFAULT);


  // Before inserting into my DB, I need to check if the user already exists
  // First, I select one row from my DB, where the usernames match
      $usernamecheck = "SELECT username FROM CustomerLogin WHERE username = '{$username}'";
      $emailcheck = "SELECT email FROM CustomerLogin WHERE email = '{$email}'";

      $result = getRows($usernamecheck);
      $resultId = getRows($emailcheck);

  // If statment to check if the user exists
  if ($result and $result[0]>0) {
          echo "<p> Username already exhists, please user another username</p>";
      }

    elseif ($resultId and $resultId[0] > 0) {
          echo "<p> Email already exhists, please use another email address </p>";
        }
    elseif ($password != $password1) {
          echo "<p> password does not match, please try again </p>";
        }
    else {
    // Else, meaning the user does not exist, I use INSERT to add them into my DB
    // Inserts the username & encrypted password value into my DB
      echo "<p> Account Succesfully Created</p>";
    $query = "INSERT INTO CustomerLogin (username, email, password) VALUES ('{$username}','{$email}','{$hash}');";

    runQuery($query);

    // Boolean value saying that I have registered, this changes the output of the HTML page

    $registered = TRUE;
    echo "<script> location.href='customerlogin.php';</script>";
  }
}

?>






<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Customer Sign Up</title>
</head>
<body> 
  
  <?php require_once('navbar.php'); ?>

    <center> <h1> Customer Sign Up</h1> </center>
      <br/>
      <form action="customersignuppage.php" method="POST">
      <br>
      <div class="mx-auto" style="width: 650px;">
<!--This code creates a input form for customers to request a quote and a button to submit-->
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="inputFirstName4">Username</label>
            <input type="text" required class="form-control" name="username" placeholder="UserName">
          </div>
          <div class="form-group col-md-6">
            <label for="inputLastName4">Email</label>
            <input type="Email" required class="form-control" name="email" placeholder="Email">
          </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Password</label>
            <input type="password" required class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPhoneNumber4">Re-enter Password</label>
            <input type="password" required class="form-control" name="password1" placeholder="Re-Enter Password">
          </div>
        </div>
        </div>
      </label>
    </div>
  </div>
  <br>
  <center>
  <a href="index.php">
  <button type="submit" class="btn btn-primary" name="submit" value="Continue">Continue</button></a>
  </center> 
  </form>

</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
</body>
</html>






