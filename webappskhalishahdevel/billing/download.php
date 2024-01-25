<?php
include '../conf/conf.php';
include '../phpqrcode/qrlib.php';

// Ambil data dari formulir
$usere = $_POST['usere'];
$passwordte = $_POST['passwordte'];
$petugas = $_POST['petugas'];
$tanggal = $_POST['tanggal'];

// Periksa kredensial
if ((USERHYBRIDWEB == $usere) && (PASHYBRIDWEB == $passwordte)) {
    // ... (Kode PDF Anda di sini)

    // Simpan dan kirim file PDF untuk diunduh
    $fileContent = '';  // Gantilah ini dengan konten file PDF Anda
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="billing_' . date('Ymd') . '_' . $petugas . '.pdf"');
    echo $fileContent;
} else {
    exit(header("Location:../index.php"));
}
?>
