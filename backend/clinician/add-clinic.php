<?php
session_start();
require "../dbconn.php";
$clinic = $_POST['clinic'];
$insert = $conn->query("INSERT INTO branch VALUES (null, '$clinic')");

if($insert) {
    $_SESSION['alert'] = "Clinic added";
} else {
    $_SESSION['alert'] = "Clinic not added";
}
header("location: ../../add-clinic.php");