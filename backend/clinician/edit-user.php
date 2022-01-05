<?php
require "../dbconn.php";
$uid = $_POST['user_id'];
echo $type = $_POST['type'];
// exit;

    $name = $_POST['fname'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $region = $_POST['region'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $ward = $_POST['ward'];
    $role = $_POST['role'];
    $branch = $_POST['branch'];

    if ($type != 'clinician') {
        $role = 1;
        $branch = 1;
    }

$update = $conn->query("UPDATE user SET role_id = '$role', branch_id = '$branch', name = '$name', sex='$gender', dob='$dob' WHERE id='$uid'");
$update = $conn->query("UPDATE address SET country = '$country', region = '$region', district='$state', ward='$ward' WHERE user_id='$uid'");
$update = $conn->query("UPDATE email SET address = '$email' WHERE user_id='$uid'");
$update = $conn->query("UPDATE phone SET pno = '$phone' WHERE user_id='$uid'");

if ($update) {
    if($type == 'clinician') {
        header("location: ../../registered-clinician.php");
    } else {
        header("location: ../../registered-patient.php");
    }
} 