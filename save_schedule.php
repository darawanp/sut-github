<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $conn = new mysqli("localhost", "root", "", "schedule_db");

    foreach ($data as $entry) {
        $date = $entry["date"];
        $times = implode(",", $entry["times"]); // รวมช่วงเวลาเป็น String
        $sql = "INSERT INTO schedules (date, times) VALUES ('$date', '$times')";
        $conn->query($sql);
    }

    echo "ข้อมูลถูกบันทึกแล้ว";
}
?>
