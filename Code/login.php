<?php
ini_set('display_errors', 1);

include('db_conn.php');

// create the connection 
$con = new mysqli($db_host, $db_user, $db_pass, $db_database);

if ($con->connect_errno) {
  echo "Failed to connect to MySQL: " . $con->connect_error;
  exit();
}

// Perform query 

if (isset($_POST['Login'])) {


  $email = $_POST['email'];
  $pass = $_POST['password'];

  $query = "SELECT ID ,acc_type FROM staff WHERE Email = ? AND Password = sha1(?)";

  if ($stmt = $con->prepare($query)) {
    $stmt->bind_param('ss', $email, $pass);
    $stmt->execute();

    $result = $stmt->get_result();
    $num_rows = $result->num_rows;


    if ($num_rows == 0)

      echo '<script type ="text/javascript">  alert("your Email or Password is wrong please try again");</script>';
    else { //if num_rows is 1:
      $row = $result->fetch_row();
      $acc_type = $row[1]; //fetches the account type of the user.

      if ($acc_type == 'staff') {
        $id = $row[0];
        $_SESSION['id'] = $id; //assigns the user id to a session.
        header("location:index.php"); //Redirects the user to the index page where he/she  is available for insert,edit,delet the infotmation.
        exit();
      } else if ($acc_type == 'reception') {
        $admin_id = $row[0];
        $_SESSION['reception'] = $reception; //assigns the reception id to a session.

        header("location:appointment_data.php"); //Redirects the reception to the appointment_data  page which only the reception has access to.
        exit();
      }

    }

    while ($row = $result->fetch_row()) {
      $retrieved_email = $row[0];
      echo $retrieved_email;
    }

  }
}


$con->close();
?>


<html>

<head>
  <title>Soft Tuoch Clinic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style_2.css">
  <style>
    body {
      background-color: #e6e5e5;
    }
  </style>

</head>

<body class="continer">

  <!-- Navbar Start -->
  <header class="mb-auto">
    <nav id="navbar" class="navbar navbar-expand-sm ">
      <div class="container-fluid">
        <nav class="navbar">
          <div class="container">
            <a class="navbar-brand" href="Home.html">
              <img src="images/logo.png" alt="Bootstrap" width="90" height="90">
            </a>
          </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link fw-bold py-1 px-2 active" aria-current="page" href="Home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold py-1 px-2" href="AboutUs.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold py-1 px-2 " href="Services.html">Services</a>
            </li>

            <li class="nav-item">
              <a class="nav-link fw-bold py-1 px-2 " href="login.php">Log IN</a>
            </li>

            <li class="nav-item">
              <a class="nav-link fw-bold py-1 px-2 " href="Contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--Navbar End-->

  <script>
    function validateform() {
      let x = document.forms["myform"]["email"].value;
      let y = document.forms["myform"]["password"].value;
      if (x == "") {
        alert("You must enter your Email!")
        return false;
      } else if (y == "") {
        alert("You must enter your password!")
        return false;
      }
    }
  </script>
  <hr class="featurette-divider">

  <form method='post' action='/project/login.php' name="myform" action="abc.jsp" onsubmit="return validateform()">
    <h3 class="text-center p-2">Log IN</h3>

    <div class="form-floating mb-3">
      <input type="text" class="form-control rounded-3" id="email" placeholder="name@example.com" name="email">
      <label>Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="password">
      <label>Password</label>
    </div>

    <div class=" text-center input p-2">
      <button class="btn btn-outline-success" type="submit" name="Login">Log in</button>
      <button class="btn btn-outline-secondary" type="reset" name="save">Reset</button>
      <div>
        <hr class="my-3">
        <small class="text-muted">By clicking Log in, you agree to the terms of use.</small>
      </div>
    </div>

  </form>

  <!--footer-->

  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

      <a href="Home.html"
        class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="images/logo.png" alt="Bootstrap" width="90" height="90">

        <use xlink:href="#bootstrap" />
        </svg>
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="Home.html" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="AboutUs.html" class="nav-link px-2 text-muted">About us</a></li>
        <li class="nav-item"><a href="Services.html" class="nav-link px-2 text-muted">Services</a></li>
        <li class="nav-item"><a href="login.php" class="nav-link px-2 text-muted">Log IN</a></li>
        <li class="nav-item"><a href="Contact.html" class="nav-link px-2 text-muted">Contact</a></li>
      </ul>
    </footer>
  </div>
</body>

</html>