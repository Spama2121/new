<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaAgen = $_POST['namaAgen'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO Agen (namaAgen, emailAgen, passwordAgen) VALUES ('$namaAgen', '$email', '$password')";
    if (mysqli_query($connection, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Daftar Berhasil']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Daftar Gagal']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'error']);
}
?>