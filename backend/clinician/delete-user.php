<?php
require "../dbconn.php";
    $user_id = $_GET['user_id'];
    $type = $_GET['type'];

    $delete = $conn->query("DELETE FROM user WHERE id = '$user_id'");

    if ($delete) {
        $_SESSION['alert'] = "Clinician Successful deleted";
    } else {
        $_SESSION['danger'] = "Clinician not deleted";
    }

    if ($delete) {
        if($type == 'clinician') {
            header("location: ../../registered-clinician.php");
        } else {
            header("location: ../../registered-patient.php");
        }
    } 