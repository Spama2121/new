<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaMerchant = $_POST['namaMerchant'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO Merchant (namaMerchant, emailMerchant, passwordMerchant) VALUES ('$namaMerchant', '$email', '$password')";
    if (mysqli_query($connection, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Daftar Berhasil']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Daftar Gagal']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>