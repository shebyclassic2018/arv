
<?php
    include "../dbconn.php";
    session_start();

    $patientName = trim($_POST['fname']) . ' ' . trim($_POST['mname']) . ' ' . trim($_POST['lname']);
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

    // INSERT INTO PATIENT
    $stmt = "INSERT INTO user VALUES (null, '$patientName', '$gender', '$dob', '$role', '$branch', now(), 'cl12345')";
    $insert = $conn->query($stmt);
    $user_id = $conn->insert_id;
    echo mysqli_error($conn);

    // INSERT INTO ADDRESS
    $stmt = "INSERT INTO address VALUES (null, '$ward', '$state', '$region', '$country', '$user_id')";
    $insertAddress = $conn->query($stmt);
    echo mysqli_error($conn);

    // INSERT INTO PHONE
    $stmt = "INSERT INTO phone VALUES (null, '$phone', '$user_id')";
    $insertPhone = $conn->query($stmt);
    echo mysqli_error($conn);

    // INSERT INTO EMAIL
    $stmt = "INSERT INTO email VALUES (null,'$email', '$user_id')";
    $insertEmail = $conn->query($stmt);
    echo mysqli_error($conn);
    
    $_SESSION['alert'] = "Clinician Successfull Registered";

    if (isset($_SESSION['alert'])) {
        header('location: ../../register-clinician.php');
    }
?> 