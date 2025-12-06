<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data (POST)</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #94f4ccff 0%, #21c9efff 100%);
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            color: #94f4ccff;
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid #94f4ccff;
            padding-bottom: 10px;
        }

        .demo-box {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .demo-box strong {
            color: #856404;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            font-weight: bold;
            color: #94f4ccff;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #94f4ccff;
        }
        
        textarea {
            resize: vertical;
            font-family: Arial, sans-serif;
        }
        
        .radio-group,
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 8px;
        }
        
        .radio-item,
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        input[type="radio"],
        input[type="checkbox"] {
            width: auto;
            cursor: pointer;
        }
        
        input[type="radio"] + label,
        input[type="checkbox"] + label {
            font-weight: normal;
            margin-bottom: 0;
            cursor: pointer;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #94f4ccff 0%, #21c9efff 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 201, 239, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }
        
        select {
            cursor: pointer;
        }
        
        .required {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📮 Form Input Data Mahasiswa - POST</h2>
        
        <div class="demo-box">
            <strong> Form Data </strong><br>
            Ketik NIM dan lihat format otomatis: XXX.XX.XXXX.XXX
        </div>
        
        <form action="proses_pst.php" method="POST">
            
            <div class="form-group">
                <label for="nim">NIM <span class="required">*</span></label>
                <input type="text" id="nim" name="nim" placeholder="Contoh: 123.45.6789.012" maxlength="17" required>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama <span class="required">*</span></label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir <span class="required">*</span></label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" required>
            </div>
            
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir <span class="required">*</span></label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat <span class="required">*</span></label>
                <textarea id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="kota">Kota <span class="required">*</span></label>
                <select id="kota" name="kota" required>
                    <option value="">-- Pilih Kota --</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Solo">Solo</option>
                    <option value="Salatiga">Salatiga</option>
                    <option value="Kudus">Kudus</option>
                    <option value="Pekalongan">Pekalongan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin <span class="required">*</span></label>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="laki" name="jk" value="Laki-laki" required>
                        <label for="laki">Laki-laki</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="perempuan" name="jk" value="Perempuan" required>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
            </div>
            
            <div class="form-group">
                <label for="no_hp">No HP <span class="required">*</span></label>
                <input type="text" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" required>
            </div>
            
            <div class="form-group">
                <label for="umur">Umur <span class="required">*</span></label>
                <input type="number" id="umur" name="umur" placeholder="Masukkan umur" min="17" max="100" required>
            </div>
            
            <div class="form-group">
                <label>Status <span class="required">*</span></label>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="kawin" name="status" value="Kawin" required>
                        <label for="kawin">Kawin</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="belum_kawin" name="status" value="Belum Kawin" required>
                        <label for="belum_kawin">Belum Kawin</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Hobi</label>
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="membaca" name="hobi[]" value="Membaca">
                        <label for="membaca">Membaca</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="olahraga" name="hobi[]" value="Olah Raga">
                        <label for="olahraga">Olah Raga</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="musik" name="hobi[]" value="Musik">
                        <label for="musik">Musik</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="traveling" name="hobi[]" value="Traveling">
                        <label for="traveling">Traveling</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="submit-btn">📤 Kirim Data</button>
            </div>
            
        </form>
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
        
        console.log('✅ Auto-format NIM POST berhasil diaktifkan');
    } else {
        console.error('❌ Input NIM tidak ditemukan');
    }
});
</script>

</body>
</html>
