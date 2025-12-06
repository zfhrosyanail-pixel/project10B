<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input POST</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
             background:  linear-gradient(135deg, #94f4ccff 0%, #21c9efff 100%);
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #94f4ccff;
            padding-bottom: 10px;
        }
        .data-item {
            margin: 10px 0;
            padding: 8px;
            background-color: #f9f9f9;
            border-left: 3px solid #94f4ccff;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #94f4ccff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #94f4ccff;
        }
        .error {
            color: red;
            background-color: #ffe6e6;
            padding: 15px;
            border-radius: 4px;
            border-left: 3px solid red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Yang Dikirim Dengan Metode POST</h2>
        <?php
        // Fungsi untuk membersihkan input
        function sanitize($data) {
            if (is_array($data)) {
                return array_map('sanitize', $data);
            }
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        }

        // Cek apakah data POST ada
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Menampilkan NIM
            $nim = isset($_POST['nim']) ? sanitize($_POST['nim']) : '';
            echo '<div class="data-item"><span class="label">NIM:</span> ' . $nim . '</div>';
            
            // Menampilkan Nama
            $nama = isset($_POST['nama']) ? sanitize($_POST['nama']) : '';
            echo '<div class="data-item"><span class="label">Nama:</span> ' . $nama . '</div>';
            
            // Menampilkan Tempat Lahir
            $tempat_lahir = isset($_POST['tempat_lahir']) ? sanitize($_POST['tempat_lahir']) : '';
            echo '<div class="data-item"><span class="label">Tempat Lahir:</span> ' . $tempat_lahir . '</div>';
            
            // Menampilkan Tanggal Lahir
            $tanggal_lahir = isset($_POST['tanggal_lahir']) ? sanitize($_POST['tanggal_lahir']) : '';
            echo '<div class="data-item"><span class="label">Tanggal Lahir:</span> ' . $tanggal_lahir . '</div>';
            
            // Menampilkan Alamat
            $alamat = isset($_POST['alamat']) ? sanitize($_POST['alamat']) : '';
            echo '<div class="data-item"><span class="label">Alamat:</span> ' . nl2br($alamat) . '</div>';
            
            // Menampilkan Kota
            $kota = isset($_POST['kota']) ? sanitize($_POST['kota']) : '';
            $daftar_kota = ["Semarang", "Solo", "Salatiga", "Kudus", "Pekalongan"];
            if (in_array($kota, $daftar_kota)) {
                echo '<div class="data-item"><span class="label">Kota:</span> ' . $kota . '</div>';
            } else {
                echo '<div class="data-item"><span class="label">Kota:</span> Tidak dipilih</div>';
            }
            
            // Menampilkan Jenis Kelamin
            $jk = isset($_POST['jk']) ? sanitize($_POST['jk']) : '';
            if ($jk == "Laki-laki") {
                echo '<div class="data-item"><span class="label">Jenis Kelamin:</span> Laki-laki</div>';
            } elseif ($jk == "Perempuan") {
                echo '<div class="data-item"><span class="label">Jenis Kelamin:</span> Perempuan</div>';
            } else {
                echo '<div class="data-item"><span class="label">Jenis Kelamin:</span> Tidak dipilih</div>';
            }
            
            // Menampilkan Email
            $email = isset($_POST['email']) ? sanitize($_POST['email']) : '';
            echo '<div class="data-item"><span class="label">Email:</span> ' . $email . '</div>';
            
            // Menampilkan No HP
            $no_hp = isset($_POST['no_hp']) ? sanitize($_POST['no_hp']) : '';
            echo '<div class="data-item"><span class="label">No HP:</span> ' . $no_hp . '</div>';
            
            // Menampilkan Umur
            $umur = isset($_POST['umur']) ? sanitize($_POST['umur']) : '';
            echo '<div class="data-item"><span class="label">Umur:</span> ' . $umur . '</div>';
            
            // Menampilkan Status
            $status = isset($_POST['status']) ? sanitize($_POST['status']) : '';
            if ($status == "Kawin") {
                echo '<div class="data-item"><span class="label">Status:</span> Kawin</div>';
            } elseif ($status == "Belum Kawin") {
                echo '<div class="data-item"><span class="label">Status:</span> Belum Kawin</div>';
            } else {
                echo '<div class="data-item"><span class="label">Status:</span> Tidak dipilih</div>';
            }
            
            // Menampilkan Hobi (Array)
            if (isset($_POST['hobi']) && is_array($_POST['hobi']) && count($_POST['hobi']) > 0) {
                $hobi_array = sanitize($_POST['hobi']);
                echo '<div class="data-item"><span class="label">Hobi:</span> ' . implode(", ", $hobi_array) . '</div>';
                
                // Menampilkan detail array hobi
                echo '<div class="data-item">';
                echo '<span class="label">Detail Array Hobi:</span><br>';
                echo '<ul style="margin: 10px 0; padding-left: 20px;">';
                foreach ($hobi_array as $index => $hobi) {
                    echo '<li>Hobi[' . $index . '] = ' . $hobi . '</li>';
                }
                echo '</ul>';
                echo '<span style="color: #666; font-size: 0.9em;">Total hobi terpilih: ' . count($hobi_array) . '</span>';
                echo '</div>';
            } else {
                echo '<div class="data-item"><span class="label">Hobi:</span> Tidak ada hobi yang dipilih</div>';
            }
            
            echo '<a href="javascript:history.back()" class="back-button">Kembali ke Form</a>';
            
        } else {
            echo '<div class="error">Tidak ada data yang dikirim melalui metode POST.</div>';
            echo '<a href="javascript:history.back()" class="back-button">Kembali ke Form</a>';
        }
        ?>
    </div>
</body>
</html>
