<html>

<head>
  <title> Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style_2.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      background-color: #e6e5e5;
    }
  </style>
</head>

<body class="continer ">
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
  <?php 
  include('db_conn.php');
  // session_start();
  // $mysqli = new mysqli('localhost', 'root', '', 'vet_clinic');
  // if ($mysqli->connect_errno) {
  //   echo "Connection Failed" . $mysqli->connect_error;
  // }
  // initialize variables
  $name = "";
  $email = "";
  $number = "";
  $servise = "";
  $id = 0;
  $update = false;

  if (isset($_POST['save'])) {
    $name = $_POST['name']; //Getting the name of the pet owner who wants to book an appointment
    $email = $_POST['email']; //Getting the email to be contacted 
    $number = $_POST['number']; //Getting the number to be contacted 
    $service = $_POST['service']; //Getting the service needed by the pet owner
  
    //Insert the order details into the database
    $query = "INSERT INTO appointment (name, email,number,service) VALUES ('$name', '$email','$number','$service')";
    //If all the input was filled this alert will appear
    if ($mysqli->query($query)) {
      echo '
        <div class=" alert alert-success alert-dismissible fade show fixed-top " role-"alert">
            <i class="bi bi-truck"></i> Our Doctors will contact you soon!
            <button type-"button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
      echo "Error" . $query . "<br>" . $mysqli->error;
    }
  }
  $mysqli->close();
  ?>

  <script>
    function validateform() {
      let x = document.forms["myform"]["name"].value;
      let y = document.forms["myform"]["email"].value;
      let z = document.forms["myform"]["number"].value;
      let w = document.forms["myform"]["service"].value;

      if (x == "") {
        alert("You must enter your Name!")
        return false;
      } else if (y == "") {
        alert("You must enter your Email!")
        return false;
      } else if (z == "") {
        alert("You must enter your Number!")
        return false;
      } else if (w == "") {
        alert("You must enter your Service!")
        return false;
      }
    }
  </script>


  <hr class="featurette-divider">
  <!-- inputs -->
  <form method='post' action='/project/appointment.php' name="myform" action="abc.jsp" onsubmit="return validateform()">

    <form action='appointment.php' method='POST'>
      <h3 class="text-center p-2">Book An Appointment</h3>

      <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-3" id="fuallname" placeholder="Enter fuallname" name="name">
        <label>Full name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control rounded-3" id="email" placeholder="Enter email" name="email">
        <label>Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-3" id="number" placeholder="Enter number" name="number">
        <label>phone Number</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-3" id="service" placeholder="Enter service" name="service">
        <label>service</label>
      </div>

      <div class=" text-center input p-2">
        <button class="btn btn-outline-success" type="submit" name="save">Schedule a
          visit</button>
        <form onreset="message()">
          <button class="btn btn-outline-secondary" type="reset" name="save">Reset</button>
        </form>

        <hr class="my-4">
        <script>


        </script>
      </div>
    </form>

    <hr class="featurette-divider">

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