<?php
$conn = new mysqli("localhost", "root", "", "cinema_db");

if ($conn->connect_error) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$userName = $data['userName'];
$seats = $data['seats'];

foreach ($seats as $seat) {
    $query = "INSERT INTO reservations (seat, user_name) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $seat, $userName);
    $stmt->execute();
}

echo "จองที่นั่งสำเร็จ!";
$conn->close();
?>
