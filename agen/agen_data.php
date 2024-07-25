<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM Agen";
    $result = mysqli_query($connection, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode(['status' => 'success', 'Data Agen' => $data]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>