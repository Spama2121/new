<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Merchant WHERE emailMerchant = '$email' AND passwordMerchant = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika login berhasil
        $row = mysqli_fetch_assoc($result);
        
        $Data = [
            'emailMerchant' => $row['emailMerchant'],
            'merchantID' => $row['merchantID'],
            'namaMerchant' => $row['namaMerchant']
        ];

        echo json_encode(['status' => 'success', 'message' => 'Login Berhasil', 'data' => $Data]);
    } else {
        // Jika login gagal
        echo json_encode(['status' => 'error', 'message' => 'Login Gagal']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>