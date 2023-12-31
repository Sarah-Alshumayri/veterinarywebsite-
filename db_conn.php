<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'vet_clinic';

$mysqli = new mysqli('localhost', 'root', '', 'vet_clinic');
if ($mysqli->connect_errno) {
    echo "Connection Failed" . $mysqli->connect_error;
}