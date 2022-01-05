<?php
require "../dbconn.php";
header('Content-Type:application/json');

$message = $conn->query("SELECT * FROM message WHERE status = 'Pending'");
$phone = "";
$content = "";
$smsId = "";

foreach ($message as $msg) {
    $phone .= $msg['recipient']."-";
    $content .= $msg['content']."<!>";
    $smsId .= $msg['id'] . "-";
}
$arr = [
    'message' => [
        $phone, $content, $smsId
    ]
];
echo json_encode($arr);