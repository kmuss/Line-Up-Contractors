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

<?php require_once('dbhelper.php');



 // Writing the SQL Query
    $query = "SELECT aj.EmployeeName, aj.ApprovedJobId, r.FirstName, r.LastName,r.Email, r.PhoneNumber, r.Address1, r.City, r.State, r.ZIP, r.JobDescription, j.Status
  FROM RequestQuote r

  INNER JOIN ApprovedJobs a ON a.JobID = r.CustomerID
  INNER JOIN AssignedJobs aj ON aj.ApprovedJobId = a.ApprovedJobId
  INNER JOIN JobStatus j ON j.ApprovedJobId = aj.ApprovedJobId;";
$records = getRows ($query);
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Updated Job Status</title>
</head>
<body> 

<div class="mx-auto" style="width: 650px;"> </div>

<table class="table">


<table class="table">
  <?php require_once('navbarmanager.php'); ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <br>
  <center> <h1> Updated Job Status </h1> </center>
  <br>
  <table class="table">
    <?php
      if ($records) {

        echo "<th>Employee Name</th><th>Appr. JobID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Address 1</th><th>City</th><th>State</th><th>ZIP</th><th>Job Description</th><th>Status</th>";
    
       foreach ($records as $record) {
          echo "<tr>";
          // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
      
          echo "<td>{$record['EmployeeName']}</td>";
          echo "<td>{$record['ApprovedJobId']}</td>";
          echo "<td>{$record['FirstName']}</td>";
          echo "<td>{$record['LastName']}</td>";
          echo "<td>{$record['Email']}</td>";
          echo "<td>{$record['PhoneNumber']}</td>";
          echo "<td>{$record['Address1']}</td>";
          echo "<td>{$record['City']}</td>";
          echo "<td>{$record['State']}</td>";
          echo "<td>{$record['ZIP']}</td>";
          echo "<td>{$record['JobDescription']}</td>";
          echo "<td>{$record['Status']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<p>No Record found in table.</p>";
      }
  ?>
  </table>
  <br>
    </body>
    </html>
