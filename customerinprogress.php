<?php 
session_start();

// Checking if
// (1) The session variable type has not been set
// (2) The type is not "Student"
// If either of these are true, the user should not be able to view this page, so redirect them to index
if(!isset($_SESSION['accessLevel']) OR $_SESSION['accessLevel'] < 1) {
  header('Location: index.php');
}

?>


<?php require_once('dbhelper.php');



 // Writing the SQL Query


$query = "SELECT q.CustomerID, l.username, q.FirstName, q.LastName, q.Email, q.PhoneNumber, q.JobDescription
FROM CustomerLogin l

INNER JOIN RequestQuote q ON l.Email=q.Email

INNER JOIN ApprovedJobs a ON a.JobID = q.CustomerID
INNER JOIN JobStatus j ON j.ApprovedJobId = a.ApprovedJobId

WHERE j.Status = 'In Progress'
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

  <title>Job In Progress</title>
</head>
<body> 
  <?php require_once('navbarcustomer.php'); ?>
    
</a>
</div>

<br>
<center> <h1>Job In Progress</h1> </center>
<br>
<div class="mx-auto" style="width: 350px;"> </div>

<table class="table">
  <?php

    if ($records) {

      echo "<th>CustomerID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Job Description</th>";
  
     foreach ($records as $record) {
      if ($record['username']==$_SESSION['username'] ) {


        echo "<tr>";
        // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
        echo "<td>{$record['CustomerID']}</td>";
        echo "<td>{$record['FirstName']}</td>";
        echo "<td>{$record['LastName']}</td>";
        echo "<td>{$record['Email']}</td>";
        echo "<td>{$record['PhoneNumber']}</td>";
        echo "<td>{$record['JobDescription']}</td>";
        echo "</tr>";
         }
      }
    } else {
      echo "<p>No Job is in progress</p>";
    }
?>
</table>
</body>
</html>