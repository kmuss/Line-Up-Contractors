


<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Quote Request</title>
</head>
<body> 
  
  <?php require_once('navbarcustomer.php'); ?>

    <center> <h1> Request Quote </h1> </center>
      <br/>
      <form action="quoterequest.php" method="POST">
      <br>
      <div class="mx-auto" style="width: 650px;">
<!--This code creates a input form for customers to request a quote and a button to submit-->
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="inputFirstName4">First Name</label>
            <input type="text" required class="form-control" name="FirstName" placeholder="First Name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputLastName4">Last Name</label>
            <input type="text" required class="form-control" name="LastName" placeholder="Last Name">
          </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" required class="form-control" name="Email" placeholder="Email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPhoneNumber4">Phone Number</label>
            <input type="Number" required class="form-control" name="PhoneNumber" placeholder="Phone Number">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address 1</label>
          <input type="text" required class="form-control" name="Address1" placeholder="1234 Main St">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" name="Address2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" required class="form-control" name="City">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select name="State" class="form-control">
              <option selected>Choose...</option>
              <option>MD</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="Number" required class="form-control" name="ZIP">
          </div>
          <label for="exampleFormControlTextarea1">Job Description</label>
          <textarea type="text"class="form-control" name="JobDescription" rows="3" style="width: 1000px;">  </textarea>
          </div>
        </div>
      </label>
    </div>
  </div>
  <br>
  <center>
  <input type="submit" class="btn btn-primary" name="submit" value="Submit"> </center>
  </form>
</a>
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




<?php require_once('dbhelper.php'); ?>
  <?php 
   

    // Checks if the submit button has been pressed, note this is accessing the "name" attribute
     // echo isset($_POST['submit']);
    if (isset($_POST['submit'])) {
     

      // Retrieves the information entered in the form
      $FirstName = $_POST['FirstName'];
      $LastName = $_POST['LastName'];
      $Email = $_POST['Email'];
      $PhoneNumber = $_POST['PhoneNumber'];
      $Address1 = $_POST['Address1'];
      $Address2 = $_POST['Address2'];
      $City = $_POST['City'];
      $State = $_POST['State'];
      $ZIP = $_POST['ZIP'];
      $JobDescription = $_POST['JobDescription'];


      $emailcheck = "SELECT email FROM CustomerLogin WHERE email = '{$Email}'";

     
      $resultId = getRows($emailcheck);

  // If statment to check if the user exists
  if (!$resultId) {
          echo "<p> Email Does Not Exists, please Use an Email Associated With Your Account</p>";
      // Writes the SQL query
        }
          else {
      $query = "INSERT INTO RequestQuote (FirstName, LastName, Email, PhoneNumber, Address1, Address2, City, State, ZIP, JobDescription) VALUES ('{$FirstName}','{$LastName}','{$Email}','{$PhoneNumber}', '{$Address1}','{$Address2}','{$City}','{$State}', '{$ZIP}','{$JobDescription}');";
      
      // Uses the proper function from the helper codes to run the query
      runQuery($query);

      // Prints a sample message

      echo "<center><p>Quote Submitted.</p></center>";
    }
  }
  ?>

</body>
</html> 
