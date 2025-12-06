<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input GET</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #94f4ccff 0%, #21c9efff 100%);
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
            color: #94f4ccff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 3px solid ;
            padding-bottom: 15px;
        }

        .data-box {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            line-height: 2;
            color: #333;
            font-size: 16px;
        }

        .data-box br {
            display: block;
            margin-bottom: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            h2 {
                font-size: 22px;
            }

            .data-box {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📋 Data Yang Dikirim Dengan Metode GET</h2>

    <div class="data-box">
        <?php
            echo "NIM : " . $_GET['nim'] . "<br>";
            echo "Nama : " . $_GET['nama'] . "<br>";
            echo "Tempat Lahir : " . $_GET['tempat_lahir'] . "<br>";
            echo "Tanggal Lahir : " . $_GET['tanggal_lahir'] . "<br>";
            echo "Alamat : " . $_GET['alamat'] . "<br>";


            $kota = $_GET['kota'];

            if ($kota == "Semarang") {
                echo "Kota : Semarang<br>";
            } elseif ($kota == "Solo") {
                echo "Kota : Solo<br>";
            } elseif ($kota == "Salatiga") {
                echo "Kota : Salatiga<br>";
            } elseif ($kota == "Kudus") {
                echo "Kota : Kudus<br>";
            } else {
                echo "Kota : Pekalongan<br>";
            }

            $jk = $_GET['jk'];

            if ($jk == "Laki-laki") {
                echo "Jenis Kelamin : Laki-laki<br>";
            } else {
                echo "Jenis Kelamin : Perempuan<br>";
            }

            echo "Email : " . $_GET['email'] . "<br>";
            echo "No HP : " . $_GET['no_hp'] . "<br>";
            echo "Umur : " . $_GET['umur'] . "<br>";

            $status = $_GET['status'];

            if ($status == "Kawin") {
                echo "Status : Kawin<br>";
            } else {
                echo "Status : Belum Kawin<br>";
            }

            if (isset($_GET['hobi']) && is_array($_GET['hobi'])) {
                echo "Hobi : " . implode(", ", $_GET['hobi']) . "<br>";
            } else {
                echo "Hobi : Tidak ada hobi yang dipilih<br>";
            }
        ?>
    </div>

    <div class="footer">
        💻 Dibuat dengan PHP & CSS
    </div>
</div>

</body>
</html>
