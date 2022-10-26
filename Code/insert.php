<?php require_once('dbhelper.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Testing Database Connectivity</title>
</head>
<body>
  <p>Insert Records into Database</p>
  <form action="insert.php" method="POST">
    <p><input type="text" name="FirstName" placeholder="First Name" required></p>
    <p><input type="text" name="LastName" placeholder="Last Name" required></p>
    <p><input type="text" name="Email" placeholder="Email" required></p>
    <p><input type="number" name="PhoneNumber" placeholder="Phone Number" required></p>
    <p><input type="text" name="Address1" placeholder="Address" required></p>
    <p><input type="text" name="Address2" placeholder="Address 2" required></p>
    <p><input type="text" name="City" placeholder="City" required></p>
    <p><input type="text" name="State" placeholder="State" required></p>
    <p><input type="number" name="Zip" placeholder="Zip" required></p>
    <p><input type="text" name="JobDescription" placeholder="Job Description" required></p>
    <label>State</label>
    <select name="State" required>
      <option value="MD">MD</option>
      <option value="VA">VA</option>
      <option value="CA">CA</option>
    </select>
    <input type="submit" name="submit" value="Add Record">
  </form>
  <?php 
    // Checks if the submit button has been pressed, note this is accessing the "name" attribute
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
      $Zip = $_POST['Zip'];
      $JobDescription = $_POST['JobDescription'];


      // Writes the SQL query
      $query = "INSERT INTO RequestQuote (FirstName, LastName, Email, PhoneNumber, Address1, Address2, City, State, Zip, JobDescription) VALUES ('{$FirstName}','{$LastName}','{$Email}','{$PhoneNumber}', '{$Address1}','{$Address2}','{$City}','{$State}'), '{$Zip}','{$JobDescription}';";
      
      // Uses the proper function from the helper codes to run the query
      runQuery($query);

      // Prints a sample message
      echo "<p>Successfully added record.</p>";
    }
  ?>

</body>
</html>