<!DOCTYPE html>
<html lang="en">


<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Pasien Rawat Jalan.xls");

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rawat Jalan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<?php
include 'koneksi.php';

try {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

$query = "SELECT reg_periksa.no_reg, reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.jam_reg," .
    "reg_periksa.kd_dokter, dokter.nm_dokter, reg_periksa.no_rkm_medis, pasien.nm_pasien, poliklinik.nm_poli," .
    "reg_periksa.p_jawab, reg_periksa.almt_pj, reg_periksa.hubunganpj, reg_periksa.biaya_reg, reg_periksa.stts, penjab.png_jawab, concat(reg_periksa.umurdaftar,' ',reg_periksa.sttsumur)as umur, " .
    "reg_periksa.status_bayar, reg_periksa.status_poli, reg_periksa.kd_pj, reg_periksa.kd_poli, pasien.no_tlp " .
    "FROM reg_periksa " .
    "INNER JOIN dokter ON reg_periksa.kd_dokter=dokter.kd_dokter " .
    "INNER JOIN pasien ON reg_periksa.no_rkm_medis=pasien.no_rkm_medis " .
    "INNER JOIN poliklinik ON reg_periksa.kd_poli=poliklinik.kd_poli " .
    "INNER JOIN penjab ON reg_periksa.kd_pj=penjab.kd_pj " .
    "WHERE reg_periksa.status_lanjut='Ralan' AND " .
    "reg_periksa.tgl_registrasi BETWEEN '" . $_POST['tgl_awal'] . "' AND '" . $_POST['tgl_akhir'] . "'";


    $stmt = $koneksi->prepare($query);

    try {
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<p>Jumlah Data: " . count($result) . "</p>";

        echo '<table border="1">
                <tr>
                    <th>Dokter Dituju</th>
                    <th>No RM</th>
                    <th>Pasien</th>
                    <th>Poliklinik</th>
                    <th>Jenis Bayar</th>
                    <th>Status Bayar</th>
                    <th>No Telpn Pasien</th>
                    
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>';

        foreach ($result as $row) {
            echo '<tr>
                    <td>' . $row['nm_dokter'] . '</td>
                    <td>' . $row['no_rkm_medis'] . '</td>
                    <td>' . $row['nm_pasien'] . '</td>
                    <td>' . $row['nm_poli'] . '</td>
                    <td>' . $row['png_jawab'] . '</td>
                    <td>' . $row['status_bayar'] . '</td>
                    <td>' . $row['no_tlp'] . '</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                  </tr>';
        }

        echo '</table>';
    } catch (Exception $e) {
        echo "Notif : " . $e->getMessage();
    } finally {
        if ($stmt != null) {
            $stmt->closeCursor();
        }
    }
} catch (Exception $e) {
    echo "Notifikasi : " . $e->getMessage();
}
?>
</body>

</html>
