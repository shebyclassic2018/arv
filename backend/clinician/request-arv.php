<?php
require "../dbconn.php";
session_start();

$branch_id = $_SESSION['branch_id'];
echo $today = date('Y-m-d');

$select = $conn->query("SELECT * FROM arv_request WHERE branch_id = '$branch_id' AND date = '$today' AND status = 'Pending'");
if (mysqli_num_rows($select) == 0) {
    $insert = $conn->query("INSERT INTO arv_request VALUES (null, '$today', '$branch_id', 'Pending')");
    if ($insert){
       $_SESSION['alert'] = "Request sent"; 
    } else {
        $_SESSION['alert'] = "Request not sent " . mysqli_error($conn); 
    }
} else {
    $_SESSION['alert'] = "Request already sent wait for response"; 
}

header("location: ../../verify-patient.php");