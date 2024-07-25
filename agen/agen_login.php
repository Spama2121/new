<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Agen WHERE emailAgen = '$email' AND passwordAgen = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika login berhasil
        echo json_encode(['status' => 'success', 'message' => 'Login Berhasil']);
    } else {
        // Jika login gagal
        echo json_encode(['status' => 'error', 'message' => 'Login Gagal']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>