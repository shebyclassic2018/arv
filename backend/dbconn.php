<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'arv_patient';

$conn = new mysqli ($host, $username, $password, $dbname);

$now = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
$today = $now->format('Y-m-d');


msgCollector($conn, $today);


function msgCollector($conn, $today) {
    $messageCollector = $conn->query("SELECT * FROM record r, user u, phone p WHERE r.pid = u.id AND p.user_id = u.id");
    $obj = new DateTime();
    foreach ($messageCollector as $row) {
        $returnDateStamp = strtotime($row['return_date']);
        $MessageDayStamp = $returnDateStamp - (86400);
        $obj->setTimestamp($MessageDayStamp);
        $oneDayBefore = $obj->format('Y-m-d');

        $MessageDayStamp = $returnDateStamp - (2 * 86400);
        $obj->setTimestamp($MessageDayStamp);
        $twoDayBefore = $obj->format('Y-m-d');

        $MessageDayStamp = $returnDateStamp - (3 * 86400);
        $obj->setTimestamp($MessageDayStamp);
        $threeDayBefore = $obj->format('Y-m-d');

        $recipient = $row['pno'];
        $name = $row['name'];

    if ($today == $oneDayBefore) {
        $content = "Habari ndugu " .$name. ". imebaki siku moja (1) ya kurudi zahanati kwa ajili ya kupata dawa nyingine. Zingatia kufika zahanati kesho. uwe na afya njema";
        $check = $conn->query("SELECT recipient, status, DATE(sent_at) AS created_at FROM message WHERE recipient = '$recipient' AND DATE(sent_at) = '$today'");
        if (mysqli_num_rows($check) == 0){
            $insert = $conn->query("INSERT INTO message VALUES (null, '$recipient','$content', 'Pending', now())");
        }
    } else if ($today == $twoDayBefore) {
        $content = "Habari ndugu " .$name. ". zimebaki siku mbili (2) za kurudi zahanati kwa ajili ya kupata dawa nyingine. Zingatia kufika zahanati. uwe na afya njema";
        $check = $conn->query("SELECT recipient, status, DATE(sent_at) AS created_at FROM message WHERE recipient = '$recipient' AND DATE(sent_at) = '$today'");
        if (mysqli_num_rows($check) == 0){
            $insert = $conn->query("INSERT INTO message VALUES (null, '$recipient','$content', 'Pending', now())");
        }
    } else if ($today == $threeDayBefore) {
        $content = "Habari ndugu " .$name. ". zimebaki siku tatu (3) za kurudi zahanati kwa ajili ya kupata dawa nyingine. Zingatia kufika zahanati. uwe na afya njema";
        $check = $conn->query("SELECT recipient, status, DATE(sent_at) AS created_at FROM message WHERE recipient = '$recipient' AND DATE(sent_at) = '$today'");
        if (mysqli_num_rows($check) == 0){
            $insert = $conn->query("INSERT INTO message VALUES (null, '$recipient','$content', 'Pending', now())");
        }
    }
    }
}