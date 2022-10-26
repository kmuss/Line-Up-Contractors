

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
  $query = "SELECT aj.EmployeeName, aj.ApprovedJobId, a.JobID, r.FirstName, r.LastName,r.Email, r.PhoneNumber, r.Address1, r.City, r.State, r.ZIP, r.JobDescription  
  FROM RequestQuote r

  INNER JOIN ApprovedJobs a ON a.JobID = r.CustomerID
  INNER JOIN AssignedJobs aj ON aj.ApprovedJobId = a.ApprovedJobId

  WHERE a.Decision = 'Approved'


  ;";
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

      <title>Employee Availability</title>
    </head>
    <body>
    <?php require_once('navbaremployee.php'); ?>
      
  </a>
  </div>

  <br>
  <center> <h1> Job Status </h1> </center>
  <br>
  <div class="mx-auto" style="width: 350px;"> </div>

  <table class="table">
    <?php
      if ($records) {

        echo "<th>Employee Name</th><th>Appr. JobID</th><th>#</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Address 1</th><th>City</th><th>State</th><th>ZIP</th><th>Job Description</th>";
    
       foreach ($records as $record) {
          echo "<tr>";
          // Accesses and prints the values inside the uid, name, and year columns, for every row in the database
      
          echo "<td>{$record['EmployeeName']}</td>";
          echo "<td>{$record['ApprovedJobId']}</td>";
          echo "<td>{$record['JobID']}</td>";
          echo "<td>{$record['FirstName']}</td>";
          echo "<td>{$record['LastName']}</td>";
          echo "<td>{$record['Email']}</td>";
          echo "<td>{$record['PhoneNumber']}</td>";
          echo "<td>{$record['Address1']}</td>";
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

    <form action="jobstatus.php" method="POST">
      <center>
      <?php require_once('dbhelper.php'); 

    $sql = "SELECT ApprovedJobId FROM ApprovedJobs ORDER BY ApprovedJobId;";
    $row = getRows ($sql);
  ?>

    <div class="form-group col-md-4">
      <label for="inputState">Approved Job ID</label>
    <select name="ApprovedJobId" class="form-control" id="ApprovedJobId">
      <option value=''>Select Approved Job ID</option>
      <?php
       foreach ($row as $rows) { 
        echo "<option>{$rows['ApprovedJobId']}</option>";
      }
        ?>
       </select>
    </div>    
          
<div class="form-group col-md-4">
            <label for="inputState">Job Status</label>
            <select name="Status" class="form-control">
              <option value=''>Update Job Status</option>
              <option>In Progress</option>
               <option>Complete</option>
            </select>
          </div>
                 <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          </div>
          <br>
          <br>
          <a href="updatedjobstatus.php"><button type="button" class="btn btn-secondary">View Updated Job Status</button></a>
          <br>
      </form>
      <br>
  <?php require_once('dbhelper.php'); ?>
    <?php 
     

      // Checks if the submit button has been pressed, note this is accessing the "name" attribute
       // echo isset($_POST['submit']);
      if (isset($_POST['submit'])) {
       

        // Retrieves the information entered in the form
        
        $ApprovedJobId = $_POST['ApprovedJobId'];
        $Status = $_POST['Status'];    


        // Writes the SQL query
        $query = "REPLACE INTO JobStatus (ApprovedJobId, Status) VALUES ('{$ApprovedJobId}','{$Status}');" ;
        
        // Uses the proper function from the helper codes to run the query
        runQuery($query);

        // Prints a sample message

        echo "<p>Job Status Successfully Updated.</p>";
      }
    ?>
