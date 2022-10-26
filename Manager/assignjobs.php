
<?php 
session_start();

// Checking if
// (1) The session variable type has not been set
// (2) The type is not "Student"
// If either of these are true, the user should not be able to view this page, so redirect them to index
if(!isset($_SESSION['accessLevel']) OR $_SESSION['accessLevel'] < 5) {
  header('Location: index.php');
}

?>
<?php require_once('dbhelper.php');



 // Writing the SQL Query
    $query = "SELECT a.ApprovedJobId, a.JobID, r.FirstName, r.LastName,r.Email, r.PhoneNumber, r.Address1, r.Address2, r.City, r.State, r.ZIP, r.JobDescription  
FROM RequestQuote r

INNER JOIN ApprovedJobs a ON a.JobID = r.CustomerID

WHERE a.Decision = 'Approved'
;";
$records = getRows ($query);
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Job Assignments</title>
</head>
<body> 
  <?php require_once('navbarmanager.php'); ?>
  
</a>
</div>

<br>
<center> <h1> Job Assignments </h1> </center>
<br>
<div class="mx-auto" style="width: 650px;"> </div>




<table class="table">
  <?php
    if ($records) {

      echo "<th>Approved JobID</th><th>JobID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Address 1</th><th>Address 2</th><th>City</th><th>State</th><th>ZIP</th><th>Job Description</th>";
  
     foreach ($records as $record) {
        echo "<tr>";
        // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
        echo "<td>{$record['ApprovedJobId']}</td>";
        echo "<td>{$record['JobID']}</td>";
        echo "<td>{$record['FirstName']}</td>";
        echo "<td>{$record['LastName']}</td>";
        echo "<td>{$record['Email']}</td>";
        echo "<td>{$record['PhoneNumber']}</td>";
        echo "<td>{$record['Address1']}</td>";
        echo "<td>{$record['Address2']}</td>";
        echo "<td>{$record['City']}</td>";
        echo "<td>{$record['State']}</td>";
        echo "<td>{$record['ZIP']}</td>";
        echo "<td>{$record['JobDescription']}</td>";
        echo "</tr>";
      }
    } else {
      echo "<p>No Record found in table.</p>";
    }
?>
</table>
</body>
</html>
  
    <form action="assignjobs.php" method="POST">
<center>    
<?php require_once('dbhelper.php'); 

    $sql = "SELECT ApprovedJobId FROM ApprovedJobs ORDER BY ApprovedJobId;";
$row = getRows ($sql);

?>

    <form action="jobstatus.php" method="POST">
      <center>
      <?php require_once('dbhelper.php'); 

    $sql = "SELECT ApprovedJobId FROM ApprovedJobs ORDER BY ApprovedJobId;";
    $row = getRows ($sql);
  ?>

    <div class="form-group col-md-2">
    <select name="ApprovedJobId" class="form-control" id="ApprovedJobId">
      <option value=''>Approved JobID</option>
      <?php
       foreach ($row as $rows) { 
        echo "<option>{$rows['ApprovedJobId']}</option>";
      }
        ?>
       

    </select>

  </div>

      <div class="form-group col-md-4">
    
            <select name="EmployeeName" class="form-control">
              <option selected>Employee Name</option>
              <option>Kemal Mussa</option>
              <option>Joel Guardado</option>
              <option>Zain Abideen</option>
              <option>Michael Appiah</option>
              <option>Ishraq C</option>
            </select>
          </div>
           <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div>
</form>
  </center>





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
      
      $ApprovedJobId = $_POST['ApprovedJobId'];
      $EmployeeName = $_POST['EmployeeName'];    
      $query = "SELECT EmployeeName FROM AssignedJobs WHERE EmployeeName = '{$EmployeeName}'";
      $queryId = "SELECT JobID FROM AssignedJobs WHERE ApprovedJobId = '{$ApprovedJobId}'";
      $queryIdCheck = "SELECT JobId FROM ApprovedJobs WHERE ApprovedJobId = '{$ApprovedJobId}'";
      
      $result = getRows($query);
      $resultId = getRows($queryId);
      $resultIdCheck = getRows($queryIdCheck);

      if(!$resultIdCheck){
          echo "<p> Job does not exist mate</p>";
      }

      elseif ($resultId and $resultId[0]>0) {
          echo "<p> Job has already been assigned, please select another Job to assign</p>";
      }

      elseif ($result and $result[0] > 0) {
          echo "<p> Employee already has work assigned, your request could not be submitted. Please select another Employee that is available </p>";
        }
      else {
                // Writes the SQL query
           $query = "INSERT INTO AssignedJobs (EmployeeName, ApprovedJobId) VALUES ('{$EmployeeName}','{$ApprovedJobId}'); ";
            runQuery($query);
            echo "<p>Job Assigned Successfully.</p>";
      }

      // Writes the SQL query
      //$query = "INSERT INTO AssignedJobs (EmployeeName, ApprovedJobId) VALUES ('{$EmployeeName}','{$ApprovedJobId}'); ";
      
      //echo"<p> bad assssss </p>";
      
      // Uses the proper function from the helper codes to run the query
      //runQuery($query);


      // Prints a sample message

      //echo "<p>Job Assigned Successfully.</p>";

    }
  ?>




