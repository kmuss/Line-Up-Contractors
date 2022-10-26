
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

<?php  
if (isset($_SESSION['username'])) {
          echo "<p>user <em>{$_SESSION['username']}</em> is logged in</p>";
        }

?>


<?php require_once('dbhelper.php');



 // Writing the SQL Query


$query = "SELECT l.username, q.FirstName, q.LastName, q.Email, q.Address1, q.Address2, q.PhoneNumber, q.JobDescription, i.Price
FROM CustomerLogin l

INNER JOIN RequestQuote q ON l.Email=q.Email
INNER JOIN ApprovedJobs a ON a.JobID = q.CustomerID
INNER JOIN Invoice i ON q.CustomerID = i.CustomerID
INNER JOIN JobStatus j ON j.ApprovedJobId = a.ApprovedJobId

WHERE j.Status = 'Complete'
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

  <title>Invoice</title>
</head>
<body> 
  <?php require_once('navbarcustomer.php'); ?>
    
</a>
</div>

<br>
<center> <h1>Invoice </h1> </center>
<br>
<div class="mx-auto" style="width: 350px;"> </div>

<table class="table">
  <?php
    if ($records) {

      echo "<th>First Name</th><th>Last Name</th><th>Email</th><th>Address1</th><th>Address2</th><th>Phone Number</th><th>Job Description</th><th>Price</th>";
  
     foreach ($records as $record) {
      if ($record['username']==$_SESSION['username'] ) {


        echo "<tr>";
        // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
        echo "<td>{$record['FirstName']}</td>";
        echo "<td>{$record['LastName']}</td>";
        echo "<td>{$record['Email']}</td>";
        echo "<td>{$record['Address1']}</td>";
        echo "<td>{$record['Address2']}</td>";
        echo "<td>{$record['PhoneNumber']}</td>";
        echo "<td>{$record['JobDescription']}</td>";
        echo "<td>{$record['Price']}</td>";

        echo "</tr>";
         }
      }
    } else {
      echo "<p>No Record found in table.</p>";
    }
?>
</table>

<br>

  <div class="mx-auto" style="width: 650px;">
    <div>
      <a href="checkout.php"><button type="button" class="btn btn-primary btn-lg btn-block">Payment</button></a>
  </div>
</div>
</body>
</html>



