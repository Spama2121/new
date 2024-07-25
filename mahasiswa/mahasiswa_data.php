<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaMahasiswa = $_POST['namaMahasiswa'];
    $saldoMahasiswa = $_POST['saldoMahasiswa'];
    $cardID = $_POST['cardID'];

    $query = "INSERT INTO Mahasiswa (namaMahasiswa, saldoMahasiswa, cardID) VALUES ('$namaMahasiswa', $saldoMahasiswa, '$cardID')";
    if (mysqli_query($connection, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Mahasiswa Berhasil Ditambahkan']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Mahasiswa Gagal Ditambahkan']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>