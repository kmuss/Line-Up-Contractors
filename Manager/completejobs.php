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
    $query = "SELECT q.CustomerID, q.FirstName, q.LastName, q.Email, q.PhoneNumber, q.JobDescription, a.ApprovedJobId  
FROM RequestQuote q

INNER JOIN ApprovedJobs a ON a.JobID = q.CustomerID
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

  <title>Completed Jobs Ready For Invoice</title>
</head>
<body> 
  <?php require_once('navbarmanager.php'); ?>
    
</a>
</div>

<br>
<center> <h1> Completed Jobs Ready For Invoice </h1> </center>
<br>
<div class="mx-auto" style="width: 350px;"> </div>

<table class="table">
  <?php
    if ($records) {

      echo "<th>CustomerID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Job Description</th><th>Approved Job ID</th>";
  
     foreach ($records as $record) {
        echo "<tr>";
        // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
        echo "<td>{$record['CustomerID']}</td>";
        echo "<td>{$record['FirstName']}</td>";
        echo "<td>{$record['LastName']}</td>";
        echo "<td>{$record['Email']}</td>";
        echo "<td>{$record['PhoneNumber']}</td>";
        echo "<td>{$record['JobDescription']}</td>";
        echo "<td>{$record['ApprovedJobId']}</td>";
        echo "</tr>";
      }
    } else {
      echo "<p>No Record found in table.</p>";
    }
?>
</table>
</body>
</html>


 <form action="completejobs.php" method="POST">
      <center>
      <?php require_once('dbhelper.php'); 

$query = "SELECT q.CustomerID
FROM RequestQuote q

INNER JOIN ApprovedJobs a ON a.JobID = q.CustomerID
INNER JOIN JobStatus j ON j.ApprovedJobId = a.ApprovedJobId

WHERE j.Status = 'Complete'
;";
$row = getRows($query);
  ?>

  <label for="price">Customer ID</label>
    <div class="form-group col-md-3">
    <select name="CustomerID" class="form-control" id="ApprovedJobId">
      <option value=''>Select Customer ID</option>
      <?php
       foreach ($row as $rows) { 
        echo "<option>{$rows['CustomerID']}</option>";
      }
        ?>
       </select>
    </div>    
          
<div class="form-group col-md-3">
            <label for="price">Price</label>

 <input type="Number" name="Price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="form-control" value="data-type=" placeholder="$1,000,000.00"> <br>                 
 <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          </div>
      </form>

  <?php require_once('dbhelper.php'); ?>
    <?php 
     

      // Checks if the submit button has been pressed, note this is accessing the "name" attribute
       // echo isset($_POST['submit']);
      if (isset($_POST['submit'])) {
       

        // Retrieves the information entered in the form
        
        $CustomerID = $_POST['CustomerID'];
        $Price = $_POST['Price'];    


        // Writes the SQL query
        $querys = "REPLACE INTO Invoice (CustomerID, Price) VALUES ('{$CustomerID}','{$Price}');" ;
        
        // Uses the proper function from the helper codes to run the query
        runQuery($querys);

        // Prints a sample message

        echo "<p>Invoice Has Been Sent To Customer.</p>";
      }
    ?>
