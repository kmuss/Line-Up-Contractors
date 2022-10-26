<?php
  // NOTE: YOU MAY LOGIN WITH username "user1" or "user2" and password "password"

  require_once('dbhelper.php');
  // start a session, so that we can use the $_SESSION array to store information across pages about a logged in user
  session_start();

  //if already logged in, redirect to homepage
  if(isset($_SESSION['username'])) {
    header('Location: customer.php');
  }

   // check if the form was submitted by checking to see if PHP automatically set the $_POST variable
   // if the form was submitted, we want to run the code to verify their login.
   // if not, none of the code inside this block runs --> we skip it and don't do anything
  if (isset($_POST['submit'])) {

    $usernameFromForm = $_POST['username'];
    $passwordFromForm = $_POST['password'];

    // construct your query--> note that this does not actually do anything! We need to run the query below.
    $query = "SELECT username, password FROM CustomerLogin WHERE username = '{$usernameFromForm}'";

    // runs the query and returns the one record. We know there should only be one person with a given username
    $record = getOneRow($query);

    // Checks if the username & password from the form matches what is in the DB
    if ($record['username'] == $usernameFromForm AND password_verify($passwordFromForm, $record['password'])) {
      // they are authenticated --> store the session variable to log them in
      $_SESSION['username'] = $usernameFromForm;

      // NEED ANOTHER SESSION VARIABLE - stores the type of user that is logged in
      $_SESSION['accessLevel'] = 2;

      // redirect them to the homepage
      header('Location: customer.php');
    } else {
      // display invalid error message
      $errorMessage = "Invalid username or password.";
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

  <title>Customer Login</title>
</head>
<body> 
  <?php require_once('navbar.php'); ?>

  <!-- User selects dropdown and selects employee which then transfers to employee login page -->

  <br>
  <center> <h1> Customer Login </h1> </center>
  <br>
  <div class="mx-auto" style="width: 400px;">
    <form action="customerlogin.php" method="POST">
      <fieldset>
        <?php
          // if there is an errorMessage (from above), display it
          if (isset($errorMessage)){
            echo "<p>".$errorMessage."</p>";
          }
        ?>

      <div class="form-group">
      <label for="exampleInputemail">Username</label>
        <input type="text"  placeholder="Enter your username" name="username" class="form-control" required>
        <small  class="form-text text-muted">We'll never share your username with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
      </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button></a>
        </fieldset>
    </form>
  </div>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
</body>
</html>


