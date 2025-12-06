<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data (GET)</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg,  #94f4ccff 0%,  #21c9efff  100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 100%;
            padding: 40px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color:  #94f4ccff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 3px solid  #94f4ccff;
            padding-bottom: 15px;
        }

        form {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
        }

        label {
            display: block;
            color:  #94f4ccff;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color:  #94f4ccff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .radio-group,
        .checkbox-group {
            margin-bottom: 20px;
        }

        .radio-group label,
        .checkbox-group label {
            display: inline;
            font-weight: normal;
            color: #333;
            margin-right: 15px;
        }

        .group-label {
            display: block;
            color:  #94f4ccff;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
            cursor: pointer;
            width: 16px;
            height: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg,  #94f4ccff 0%,  #21c9efff  100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 14px;
        }

        .demo-box {
            background: #fff3cd;
            border: 2px solid #5bbee8ff;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .demo-box strong {
            color: #856404;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            h2 {
                font-size: 22px;
            }

            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📝 Form Input Data Mahasiswa - GET</h2>
    
    <div class="demo-box">
        <strong> Form Data </strong><br>
        Ketik NIM dan lihat auto-format dengan titik pemisah!
    </div>
    
    <form action="proses_get.php" method="GET">
        <label>NIM (Auto-format: XXX.XX.XXXX.XXX)</label>
        <input type="text" name="nim" id="nim" placeholder="Contoh: 123.45.6789.012" maxlength="17" required>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" required>

        <label>Alamat</label>
        <textarea name="alamat" placeholder="Masukkan Alamat Lengkap" required></textarea>

        <label>Kota</label>
        <select name="kota" required>
            <option value="">-- Pilih Kota --</option>
            <option value="Semarang">Semarang</option>
            <option value="Solo">Solo</option>
            <option value="Salatiga">Salatiga</option>
            <option value="Kudus">Kudus</option>
            <option value="Pekalongan">Pekalongan</option>
        </select>

        <div class="radio-group">
            <span class="group-label">Jenis Kelamin</span>
            <label>
                <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
            </label>
            <label>
                <input type="radio" name="jk" value="Perempuan" required> Perempuan
            </label>
        </div>

        <label>Email</label>
        <input type="email" name="email" placeholder="contoh@email.com" required>

        <label>No HP</label>
        <input type="text" name="no_hp" placeholder="08xxxxxxxxxx" required>

        <label>Umur</label>
        <input type="number" name="umur" placeholder="Masukkan Umur" min="1" max="100" required>

        <div class="radio-group">
            <span class="group-label">Status</span>
            <label>
                <input type="radio" name="status" value="Kawin" required> Kawin
            </label>
            <label>
                <input type="radio" name="status" value="Belum Kawin" required> Belum Kawin
            </label>
        </div>

        <div class="checkbox-group">
            <span class="group-label">Hobi</span>
            <label>
                <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
            </label>
            <label>
                <input type="checkbox" name="hobi[]" value="Olah Raga"> Olah Raga
            </label>
            <label>
                <input type="checkbox" name="hobi[]" value="Musik"> Musik
            </label>
            <label>
                <input type="checkbox" name="hobi[]" value="Traveling"> Traveling
            </label>
        </div>

        <input type="submit" value="✉️ Kirim Data">
    </form>

    <div class="footer">
        💻 Dibuat dengan PHP & CSS
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var inputNim = document.getElementById('nim');
    
    if (inputNim) {
        inputNim.addEventListener('input', function(e) {
            var nilai = e.target.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
            
            if (nilai.length > 14) {
                nilai = nilai.substring(0, 14);
            }
            
            var hasilFormat = '';
            
            if (nilai.length > 0) {
                hasilFormat = nilai.substring(0, 3);
            }
            if (nilai.length >= 4) {
                hasilFormat += '.' + nilai.substring(3, 5);
            }
            if (nilai.length >= 6) {
                hasilFormat += '.' + nilai.substring(5, 9);
            }
            if (nilai.length >= 10) {
                hasilFormat += '.' + nilai.substring(9, 12);
            }
            
            e.target.value = hasilFormat;
        });
        
        console.log('✅ Auto-format NIM berhasil diaktifkan');
    } else {
        console.error('❌ Input NIM tidak ditemukan');
    }
});
</script>

</body>
</html>
