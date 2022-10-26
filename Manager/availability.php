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
    $query = "SELECT i.FirstName, i.LastName, a.EmployeeID, a.Date1, a.Week1, a.Week2
FROM EmployeeAvailability a

INNER JOIN EmployeeInformation i ON a.EmployeeID = i.EmployeeID
;";
$records = getRows($query);
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Inventory</title>
</head>
<body> 

<div class="mx-auto" style="width: 650px;"> </div>

<table class="table">


<table class="table">
  <?php require_once('navbarmanager.php'); ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <br>
  <center> <h1> Availability </h1> </center>
  <br>
  <table class="table table-bordered">
 

       <?php
    if ($records) {

      echo "<th>FirstName</th><th>LastName</th><th>EmployeeID</th><th>Date</th><th>Week1</th><th>Week2</th>";
  
     foreach ($records as $record) {
        echo "<tr>";
        // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
        echo "<td>{$record['FirstName']}</td>";
        echo "<td>{$record['LastName']}</td>";
        echo "<td>{$record['EmployeeID']}</td>";
        echo "<td>{$record['Date1']}</td>";
        echo "<td>{$record['Week1']}</td>";
        echo "<td>{$record['Week2']}</td>";
        echo "</tr>";
      }
    } else {
      echo "<p>Employee Hasn't Updated Table.</p>";
    }
?>
</table>
  <br>
    </body>
    </html>