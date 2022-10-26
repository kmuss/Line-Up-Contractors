<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img class="slides" src="https://www.lucontractors.com/wp/wp-content/uploads/2016/12/logo_new.png" style="width: 5%">
    <!-- logo width is 5 percent and this also includes the image address -->
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
    
          <li class="nav-item">
          <a class="nav-link" href="customersignuppage.php">Customer Sign Up</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown">
            Login
          </a>
          <div class="dropdown-menu">
             <a class="dropdown-item" href="employeelogin.php">Employee</a>
             <a class="dropdown-item" href="managerlogin.php">Manager</a>
             <a class="dropdown-item" href="customerlogin.php">Customer</a>
            </div>
          </li>
        </ul>
    </nav>
  </body>
</html>