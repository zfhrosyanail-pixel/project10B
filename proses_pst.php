<?php
// File proses_post_sanitasi.php

// Fungsi sanitasi (untuk mencegah XSS)
function bersihkan($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); 
}

// ----------------------------------------------------
// VALIDASI SISI SERVER (Nama & Umur)
// ----------------------------------------------------

// Ambil data mentah (raw) dari POST
$nama_raw = trim($_POST['nama'] ?? '');
$umur_raw = trim($_POST['umur'] ?? '');

// 1. Validasi Nama
if (empty($nama_raw)) {
    die("Error: Nama tidak boleh kosong.");
}
// Mengecek apakah Nama mengandung angka (0-9).
if (preg_match('/[0-9]/', $nama_raw)) {
    die("Error: Nama tidak boleh diisi angka.");
}

// 2. Validasi Umur
if (empty($umur_raw)) {
    die("Error: Umur tidak boleh kosong.");
}
// Mengecek apakah Umur adalah nilai numerik (hanya angka)
if (!is_numeric($umur_raw) || !ctype_digit($umur_raw)) {
    die("Error: Umur harus diisi dengan angka bilangan bulat.");
}

// ----------------------------------------------------
// SANITASI DATA (Setelah Lolos Validasi)
// ----------------------------------------------------

// Sanitasi data yang sudah lolos validasi
$nim = bersihkan($_POST['nim']);
$nama = bersihkan($nama_raw); // Menggunakan variabel yang sudah divalidasi dan disanitasi
$umur = bersihkan($umur_raw); // Menggunakan variabel yang sudah divalidasi dan disanitasi
$tempat_lahir = bersihkan($_POST['tempat_lahir']);
$tanggal_lahir = bersihkan($_POST['tanggal_lahir']);
$no_hp = bersihkan($_POST['no_hp']); 
$alamat = bersihkan($_POST['alamat']);
$email = bersihkan($_POST['email']);

// Sanitasi input lainnya
$kota = bersihkan($_POST['kota']);
$jk = isset($_POST['jk']) ? bersihkan($_POST['jk']) : "-";
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : "";

// Sanitasi checkbox hobi
$hobi_list = [];
if (!empty($_POST['hobi'])) {
    foreach ($_POST['hobi'] as $h) {
        $hobi_list[] = bersihkan($h);
    }
}
$hobi_output = implode(", ", $hobi_list);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data POST</title>
    <style>
        /* CSS Dasar untuk kerapian dan responsivitas */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #0056b3;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            line-height: 1.6;
            padding: 5px 0;
            border-bottom: 1px dotted #ccc;
            display: flex;
        }
        p b {
            display: inline-block;
            width: 150px;
            color: #555;
            flex-shrink: 0;
        }
        
        /* Responsiveness */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
                margin: 20px;
            }
            p b {
                width: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Input Data Mahasiswa (Metode POST)</h2>
        <p><b>NIM:</b> <?= $nim ?></p>
        <p><b>Nama:</b> <?= $nama ?></p>
        <p><b>Umur:</b> <?= $umur ?></p>
        <p><b>Tempat Lahir:</b> <?= $tempat_lahir ?></p>
        <p><b>Tanggal Lahir:</b> <?= $tanggal_lahir ?></p>
        <p><b>No HP:</b> <?= $no_hp ?></p>
        <p><b>Alamat:</b> <?= $alamat ?></p>
        <p><b>Kota:</b> 
            <?php
            if ($kota == "Semarang") echo "Semarang";
            elseif ($kota == "Solo") echo "Solo";
            elseif ($kota == "Brebes") echo "Brebes";
            elseif ($kota == "Kudus") echo "Kudus";
            elseif ($kota == "Demak") echo "Demak";
            else echo "Salatiga";
            ?>
        </p>
        <p><b>Jenis Kelamin:</b> <?= $jk ?></p>
        <p><b>Status:</b> <?= $status ?></p>
        <p><b>Hobi:</b> <?= $hobi_output ?></p>
        <p><b>Email:</b> <?= $email ?></p>
    </div>
</body>
</html>
