<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'vet_clinic');

// initialize variables
$name = "";
$appointment_note = "";
$date = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $appointment_note = $_POST['appointment_note'];
    $date = $_POST['date'];
    


    mysqli_query($db, "INSERT INTO info (name, appointment_note,date) VALUES ('$name', '$appointment_note','$date')");
    $_SESSION['message'] = "Information saved";
    header('location: index.php');
}


// ...


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $appointment_note = $_POST['appointment_note'];
    $date = $_POST['date'];

    mysqli_query($db, "UPDATE info SET name='$name', appointment_note='$appointment_note',date='$date' WHERE id=$id");
    $_SESSION['message'] = "Information updated!";
    header('location: index.php');
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM info WHERE id=$id");
    $_SESSION['message'] = "Information deleted!";
    header('location: index.php');
}
