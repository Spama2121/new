<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardID = $_POST['cardID'];
    $merchantID = $_POST['merchantID'];
    $jumlahTransaksi = $_POST['jumlahTransaksi'];

    // Kurangi saldo mahasiswa
    $query = "UPDATE Mahasiswa SET saldoMahasiswa = saldoMahasiswa - $jumlahTransaksi WHERE cardID = $cardID";
    if (mysqli_query($connection, $query)) {
        // Tambahkan saldo merchant
        $query = "UPDATE Merchant SET saldoMerchant = saldoMerchant + $jumlahTransaksi WHERE merchantID = $merchantID";
        if (mysqli_query($connection, $query)) {
            echo json_encode(['status' => 'success', 'message' => 'Transaksi Berhasil']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Transaksi Gagal']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Transaksi Gagal']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>