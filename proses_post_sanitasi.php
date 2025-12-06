<?php
// Memulai session jika diperlukan
session_start();

// Cek apakah request adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: F_POST.php');
    exit;
}

// Fungsi sanitasi yang lebih aman
function bersihkan($data) {
    $data = trim($data); // Hapus spasi di awal dan akhir
    $data = stripslashes($data); // Hapus backslash
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Konversi karakter khusus
    return $data;
}

// Fungsi validasi NIM (hanya angka)
function validasiNIM($nim) {
    return preg_match('/^[0-9]+$/', $nim);
}

// Fungsi validasi email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fungsi validasi nomor HP (hanya angka dan +)
function validasiNoHP($nohp) {
    return preg_match('/^[0-9+]+$/', $nohp);
}

// Fungsi validasi umur (harus angka positif)
function validasiUmur($umur) {
    return is_numeric($umur) && $umur > 0 && $umur < 150;
}

// Array untuk menyimpan error
$errors = [];

// Validasi dan sanitasi NIM
$nim = isset($_POST['nim']) ? bersihkan($_POST['nim']) : '';
if (empty($nim)) {
    $errors[] = "NIM harus diisi";
} elseif (!validasiNIM($nim)) {
    $errors[] = "NIM harus berisi angka saja";
}

// Validasi dan sanitasi Nama
$nama = isset($_POST['nama']) ? bersihkan($_POST['nama']) : '';
if (empty($nama)) {
    $errors[] = "Nama harus diisi";
} elseif (strlen($nama) < 3) {
    $errors[] = "Nama minimal 3 karakter";
}

// Validasi dan sanitasi Umur
$umur = isset($_POST['umur']) ? bersihkan($_POST['umur']) : '';
if (empty($umur)) {
    $errors[] = "Umur harus diisi";
} elseif (!validasiUmur($umur)) {
    $errors[] = "Umur tidak valid";
}

// Sanitasi Tempat Lahir
$tempat_lahir = isset($_POST['tempat_lahir']) ? bersihkan($_POST['tempat_lahir']) : '';
if (empty($tempat_lahir)) {
    $errors[] = "Tempat lahir harus diisi";
}

// Sanitasi Tanggal Lahir
$tanggal_lahir = isset($_POST['tanggal_lahir']) ? bersihkan($_POST['tanggal_lahir']) : '';
if (empty($tanggal_lahir)) {
    $errors[] = "Tanggal lahir harus diisi";
}

// Validasi dan sanitasi No HP
$no_hp = isset($_POST['nohp']) ? bersihkan($_POST['nohp']) : '';
if (empty($no_hp)) {
    $errors[] = "No HP harus diisi";
} elseif (!validasiNoHP($no_hp)) {
    $errors[] = "No HP hanya boleh berisi angka";
}

// Sanitasi Alamat
$alamat = isset($_POST['alamat']) ? bersihkan($_POST['alamat']) : '';
if (empty($alamat)) {
    $errors[] = "Alamat harus diisi";
}

// Validasi dan sanitasi Email
$email = isset($_POST['email']) ? bersihkan($_POST['email']) : '';
if (empty($email)) {
    $errors[] = "Email harus diisi";
} elseif (!validasiEmail($email)) {
    $errors[] = "Format email tidak valid";
}

// Validasi Kota (whitelist)
$kota_valid = ['Semarang', 'Solo', 'Brebes', 'Kudus', 'Demak', 'Salatiga'];
$kota = isset($_POST['kota']) ? bersihkan($_POST['kota']) : '';
if (empty($kota)) {
    $errors[] = "Kota harus dipilih";
} elseif (!in_array($kota, $kota_valid)) {
    $kota = 'Salatiga'; // Default jika tidak valid
}

// Validasi Jenis Kelamin (whitelist)
$jk_valid = ['Laki-laki', 'Perempuan'];
$jk = isset($_POST['jk']) ? bersihkan($_POST['jk']) : '';
if (empty($jk)) {
    $jk = "-";
} elseif (!in_array($jk, $jk_valid)) {
    $jk = "-";
}

// Validasi Status (whitelist)
$status_valid = ['Menikah', 'Belum Menikah'];
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : '';
if (empty($status)) {
    $status = "-";
} elseif (!in_array($status, $status_valid)) {
    $status = "-";
}

// Validasi Hobi (checkbox dengan whitelist)
$hobi_valid = ['Membaca', 'Olahraga', 'Musik', 'Gaming', 'Traveling'];
$hobi_list = [];
if (!empty($_POST['hobi']) && is_array($_POST['hobi'])) {
    foreach ($_POST['hobi'] as $h) {
        $h_clean = bersihkan($h);
        if (in_array($h_clean, $hobi_valid)) {
            $hobi_list[] = $h_clean;
        }
    }
}
$hobi_output = !empty($hobi_list) ? implode(", ", $hobi_list) : "-";

// Jika ada error, tampilkan dan stop
if (!empty($errors)) {
    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Error Validasi</title>
        <link rel='stylesheet' href='style_result.css'>
    </head>
    <body>
        <div class='container'>
            <div class='header' style='background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);'>
                <h2>❌ Error Validasi</h2>
                <p>Data yang Anda masukkan tidak valid</p>
            </div>
            <div class='content'>
                <div style='background: #ffe5e5; padding: 20px; border-radius: 10px; margin-bottom: 20px;'>
                    <h3 style='color: #d63031; margin-bottom: 10px;'>Ditemukan kesalahan:</h3>
                    <ul style='color: #d63031; margin-left: 20px;'>";
    
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    
    echo "      </ul>
                </div>
                <div class='back-button'>
                    <a href='F_POST.php'>← Kembali ke Form</a>
                </div>
            </div>
        </div>
    </body>
    </html>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data POST</title>
    <link rel="stylesheet" href="style_result.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>✅ Hasil Input Data Mahasiswa</h2>
            <p>Data berhasil diproses dengan aman</p>
        </div>
        
        <div class="content">
            <div class="data-row">
                <div class="data-label">NIM</div>
                <div class="data-value"><?= $nim ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Nama</div>
                <div class="data-value"><?= $nama ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Umur</div>
                <div class="data-value"><?= $umur ?> tahun</div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Tempat Lahir</div>
                <div class="data-value"><?= $tempat_lahir ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Tanggal Lahir</div>
                <div class="data-value"><?= $tanggal_lahir ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">No HP</div>
                <div class="data-value"><?= $no_hp ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Alamat</div>
                <div class="data-value"><?= $alamat ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Kota</div>
                <div class="data-value"><?= $kota ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Jenis Kelamin</div>
                <div class="data-value"><?= $jk ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Status</div>
                <div class="data-value"><?= $status ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Hobi</div>
                <div class="data-value"><?= $hobi_output ?></div>
            </div>
            
            <div class="data-row">
                <div class="data-label">Email</div>
                <div class="data-value"><?= $email ?></div>
            </div>
            
            <div class="back-button">
                <a href="F_POST.php">← Kembali ke Form</a>
            </div>
        </div>
    </div>
</body>
</html>