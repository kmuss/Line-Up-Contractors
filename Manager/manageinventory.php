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

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Manage Inventory</title>
</head>
<body> 
  <?php require_once('navbarmanager.php'); ?>
      <form action="manageinventory.php" method="POST">
      <br>

      <center> <h1> Managing Inventory </h1> </center>
      <br>
      <div class="mx-auto" style="width: 850px;">

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputItemId4">Item Name</label>
            <input type="text" required class="form-control" name="ItemName" placeholder="Item Name">
          </div>
          <div class="form-group col-md-4">
            <label for="inputQuanity4">Quantity</label>
            <input type="Number" required class="form-control" name="Quantity" placeholder="Quantity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputDescription4">Description</label>
            <input type="text" required class="form-control" name="Description" placeholder="Description">
          </div>
        </div>

      </label>
    </div>
  </div>

  <br>
  <center>
    <input type="submit" class="btn btn-primary" name="submit" value="Add Inventory"> 
      <a href="inventory.php"><button type="button" class="btn btn-primary">View Inventory</button></a>

        
    <a href="editinventory.php"><button type="button" class="btn btn-primary">Edit Inventory</button></a>
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
      $ItemName = $_POST['ItemName'];
      $Quantity = $_POST['Quantity'];
      $Description = $_POST['Description'];
    


      // Writes the SQL query
      $query = "INSERT INTO Inventory (ItemName, Quantity, Description) VALUES ('{$ItemName}','{$Quantity}','{$Description}');";
      
      // Uses the proper function from the helper codes to run the query
      runQuery($query);

      // Prints a sample message

      echo "<p>Item Successfully Added.</p>";
    }
  ?>

</body>
</html> 



