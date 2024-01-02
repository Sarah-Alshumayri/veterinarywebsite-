<?php include('php_code.php'); ?>
<?php

//staff can edit from table info
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

    if (isset($record) == ["0"]) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $appointment_note = $n['appointment_note'];
        $date = $n['date'];
    }
}
?>
<html>

<head>
    <title>Doctor's Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_2.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
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
    <hr class="featurette-divider">

    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
    <div class="text-center p-2">
        <a class="fw-normal " href="index2.php">
            <h4 class="featurette-heading fw-normal lh-1">Click here if you want to see the new appointments </h4>
        </a>
    </div>

    <table class=" container text-center table table-striped table-bordered border-primary p-5 pt-0">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Appointment Note</th>
                <th scope="col">Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td>
                <?php echo $row['name']; ?>
            </td>
            <td>
                <?php echo $row['appointment_note']; ?>
            </td>
            <td>
                <?php echo $row['date']; ?>
            </td>
            <td>
                <a class="btn btn-info" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" href="php_code.php?del=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>


    <form method="post" action="php_code.php">
        <div class=" container text-center modal-body p-5 pt-0">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="name" value="<?php echo $name; ?>">
                <label>Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="appointment_note"
                    value="<?php echo $appointment_note; ?>">
                <label>Appointment Note</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="date" value="<?php echo $date; ?>">
                <label>Date</label>
            </div>


            <div class="input p-2">
                <?php if ($update == true): ?>
                <button class="btn btn-outline-secondary" type="submit" name="update">update</button>
                <?php else: ?>
                <button class="btn btn-outline-success" type="submit" name="save" onclick="displayInfo()">Save</button>
                <a class="btn btn-outline-secondary" href="logout.php" type="submit" name="logout">Log Out</a>

                <?php endif ?>
            </div>
            <script>
                function displayInfo() {
                    alert("by clicking here your entered information will be saved.");

                }
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