<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardID = $_POST['cardID'];
    $jumlahTopup = $_POST['jumlahTopup'];

    $query = "UPDATE Mahasiswa SET saldoMahasiswa = saldoMahasiswa + $jumlahTopup WHERE cardID = $cardID";
    if (mysqli_query($connection, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Top-up Berhasil']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Top-up Gagal']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>