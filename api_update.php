<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw  = file_get_contents("php://input");
    $data = json_decode($raw, true);

    if ($data && isset($data['roll_no'])) {
        $stmt = $conn->prepare("
            INSERT INTO students (roll_no, zprn, name, pc_no, status, active_window, alert_msg, last_seen)
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
            ON DUPLICATE KEY UPDATE
                zprn = VALUES(zprn),
                name = VALUES(name),
                pc_no = VALUES(pc_no),
                status = VALUES(status),
                active_window = VALUES(active_window),
                alert_msg = VALUES(alert_msg),
                last_seen = NOW()
        ");

        $stmt->bind_param(
            "sssssss",
            $data['roll_no'],
            $data['zprn'],
            $data['name'],
            $data['pc_no'],
            $data['status'],
            $data['active_window'],
            $data['alert_msg']
        );

        $stmt->execute();
        $stmt->close();

        echo json_encode(["status" => "success", "message" => "Heartbeat logged"]);
        exit;
    }

    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid JSON payload"]);
    exit;
}

$conn->query("UPDATE students SET status='Inactive' WHERE TIMESTAMPDIFF(SECOND, last_seen, NOW()) > 30");

$result = $conn->query("SELECT * FROM students ORDER BY pc_no ASC");
$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode($students);
?>