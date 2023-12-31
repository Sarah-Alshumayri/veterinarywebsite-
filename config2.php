<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'vet_clinic');


// initialize variables
$title = "";
$content = "";


if (isset($_POST['save'])) {
    $title = $_POST['title']; //Getting the name of the pet owner who wants to book an appointment
    $content = $_POST['content']; //Getting the email to be contacted 

    //Insert the order details into the database
    mysqli_query($db, "INSERT INTO articles (title, content) VALUES ('$title', '$content')");
}
