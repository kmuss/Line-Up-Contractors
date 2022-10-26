

<?php 
session_start();

// Checking if
// (1) The session variable type has not been set
// (2) The type is not "Student"
// If either of these are true, the user should not be able to view this page, so redirect them to index
if(!isset($_SESSION['accessLevel']) OR $_SESSION['accessLevel'] < 3) {
  header('Location: index.php');
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

    <title>Employee Availability</title>
  </head>
  <body>
  <?php require_once('navbaremployee.php'); ?>
  <form action="employeeavailability.php" method="POST">
    </a>
  <br>
  <center> <h1> Employee Availability </h1> </center>
  <br>
  <div class="mx-auto" style="width: 650px;">
   <!-- code here titles the page with Employee Availability and the font is large and bolded because it's a header and it's also centered aligned on the page as well -->
  
      <form>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="EmployeeID">Employee ID</label>
        <input name= "EmployeeID" type="Number" class="form-control" placeholder="EmployeeID">
        <br>
      </div>

        <!-- code for the employee input, we made sure the data type was Number because for our database, employee ID is going to a primary key, so using numbers better ensures data integrity; We also made the place holder display "Employee ID", so users are will understand exactly where to input this information -->
      <div class="form-group col-md-6">
        <label for="inputDate4">Date</label>
        <input name= "Date1" type="Date" class="form-control" placeholder="(mm/dd/yyyy)">
        <br>
      </div>
    </div>

      <!-- code for the employee input, we made sure the data type was Number because for our database, Job ID is going to a primary key, so using numbers better ensures data integrity; We also made the place holder display "Job ID", so users are will understand exactly where to input this information -->

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFirstName4">Week 1 Availability</label>
        <input type="text" required class="form-control" name="Week1" placeholder="Ex. M,T,W,Th,F">
      </div>
      <div class="form-group col-md-6">
        <label for="inputItemId4">Week 2 Availability</label>
        <input type="text" required class="form-control" name="Week2" placeholder="Ex. M,T,W,Th,F">
      </div>
    </div>
    <br>
    <div>
      <center>
       <input type="submit" class="btn btn-primary" name="submit" value="Submit">
     </center>
   </form>
 </div>
</div>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- hello code for a button, the button is center aligned and primary is the color option we went with -->

<?php require_once('dbhelper.php'); ?>
<?php 

if (isset($_POST['submit'])) {

  // Retrieves the information entered in the form
  $EmployeeID = $_POST['EmployeeID'];
  $Date1 = $_POST['Date1'];
  $Week1 = $_POST['Week1'];
  $Week2 = $_POST['Week2'];



      // Writes the SQL query


      // Uses the proper function from the helper codes to run the query
  $queryIdCheck = "SELECT EmployeeID FROM EmployeeInformation WHERE EmployeeId = '{$EmployeeID}'";

  $EmployeeAvailabilityIdCheck = "SELECT EmployeeAvailabilityId FROM EmployeeAvailability
      WHERE Date1 = '{$Date1}' AND EmployeeID = '{$EmployeeID}'";
      $resultIdCheck = getRows($queryIdCheck);
      $EmployeeAvailabilityId = getRows($EmployeeAvailabilityIdCheck);

      if(!$resultIdCheck){
          echo "<center><p> Invalid Employee ID</p></center>";
      }
      elseif ($EmployeeAvailabilityId and $EmployeeAvailabilityId[0] > 0) {
          echo "<center><p> You've already submitted for Week1 and Week2 for that date</p></center>";
      }

        else {
                // Writes the SQL query
           $query = "REPLACE INTO EmployeeAvailability (EmployeeID, Date1, Week1, Week2) VALUES ('{$EmployeeID}','{$Date1}','{$Week1}','{$Week2}');";
  runQuery($query);

      // Prints a sample message
  echo "<center><p>Employee Availability Successfully Updated.</p></center>";
}  
} 

?>  
</body>
</html>

