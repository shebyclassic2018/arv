<?php
include "../dbconn.php";
session_start();

$branch_id = $_SESSION['branch_id'];
$patientID = trim($_POST['pid']);
$patientID = substr($patientID, 2, 10);
$qty = $_POST['qty'];
$rdate = $_POST['rdate'];
$weight = $_POST['weight'];

// get total arvs in store
$select = $conn->query("SELECT sum(quantity) as total FROM arv_store");
foreach($select as $row){}
$arvinStock = $row['total'];

// get total supplied arvs
$select = $conn->query("SELECT sum(quantity_used) as total FROM record");
foreach($select as $row){}
$userARVs = $row['total'];

// Remaining ARVs in stock
$remainsARVs = $arvinStock - $userARVs;

// get clinician detail to store in patient_doctor model
$user_id = $_SESSION['user_id'];

$stmt = "SELECT 
        u.id as uid,
        u.name as uname,
        sex,
        pno AS phone,
        ward,
        country,
        district,
        region,
        dob,
        b.name as branch,
        type,
        address AS email,
        DATE(created_at) AS date
    FROM 
        user u,
        address a,
        phone p,
        email e,
        role r, 
        branch b
    WHERE
        r.id = u.role_id AND
        u.branch_id = b.id AND
        u.id = p.user_id AND
        u.id = e.user_id AND 
        u.id = a.user_id AND
        r.type IN ('clinician', 'administrator') AND 
        u.id = '$user_id'
    ORDER BY u.id DESC";

if ($remainsARVs >= $qty && $remainsARVs > 0) {
    $clinician = $conn->query($stmt);

    foreach ($clinician as $key => $row) {
        $uname = $row['uname'];
        $phone = $row['phone'];
        $email = $row['email'];
        $branch = $row['branch'];
    }

    // insert into record model
    $insert = $conn->query("INSERT INTO record VALUES (null,'$qty', '$weight' , now(), '$rdate', '$patientID', '$branch_id')");
    echo mysqli_error($conn);

    $rid = $conn->insert_id; 
    msgCollector($conn, $today);
    

    // insert into patient_doctor model
    $insert = $conn->query("INSERT INTO patient_doctor VALUES (null, '$patientID', '$user_id', '$uname', '$phone', '$email', '$branch','$rid')");
    echo mysqli_error($conn);

    $_SESSION['success'] = "Record added";
    if (isset($_SESSION['success'])) {
        header('location: ../../serve-patient.php?pid=PT' . $patientID);
    }
} else {
    $_SESSION['danger'] = "Insufficient stock";
    if (isset($_SESSION['danger'])) {
        header('location: ../../serve-patient.php?pid=PT' . $patientID);
    }
}

