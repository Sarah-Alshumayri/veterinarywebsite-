<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'vet_clinic');
if ($mysqli->connect_errno) {
    echo "Connection Failed" . $mysqli->connect_error;
}

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
?>
