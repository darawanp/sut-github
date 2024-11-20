<?php
$conn = new mysqli("localhost", "root", "", "cinema_db");

if ($conn->connect_error) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

$query = "SELECT seat FROM reservations";
$result = $conn->query($query);

$seats = [];
while ($row = $result->fetch_assoc()) {
    $seats[] = [
        "id" => $row['seat'],
        "reserved" => true
    ];
}

echo json_encode($seats);

$conn->close();
?>
