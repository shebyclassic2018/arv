<?php
include "../dbconn.php";
session_start();

$user_id = $_SESSION['user_id'];
$req_id = $_GET['req'];
$qty = $_POST['qty'];
$branch = $_POST['branch'];
$date = $_POST['adate'];

$insert = $conn->query("INSERT INTO arv_store VALUES (null, '$qty', '$date', '$branch', '$user_id')");
echo mysqli_error($conn);

if ($insert){
    $_SESSION['success'] = "Batch added";
    $update = $conn->query("UPDATE arv_request SET status = 'Supplied'");
} else {
    $_SESSION['danger'] = "Batch not added";
}

header("location: ../../arv-store.php?req_id=$req_id&branch_id=$branch");