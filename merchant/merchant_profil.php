<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['merchantID'])) {
        $merchantID = $_GET['merchantID'];

        $query = "SELECT namaMerchant, saldoMerchant FROM merchant WHERE merchantID = $merchantID";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(['status' => 'success', 'data' => $row]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Merchant not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing merchantID parameter']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>