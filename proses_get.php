<!DOCTYPE html>
<html>
<head>
    <title>Hasil Input GET</title>
</head>
<body>

<h2>Data Yang Dikirim Dengan Metode GET</h2>

    <?php
        echo "NIM :" . $_GET['nim'] . "<br>";
        echo "Nama :" . $_GET['nama'] . "<br>";
        echo "Tempat Lahir :" . $_GET['tempat_lahir'] . "<br>";
        echo "Tanggal Lahir :" . $_GET['tanggal_lahir'] . "<br>";
        echo "Alamat :" . $_GET['alamat'] . "<br>";


        $kota = $_GET['kota'];

        if ($kota == "Semarang") {
            echo "kota : Semarang<br>";
        } elseif ($kota == "Solo") {
            echo "kota : Solo<br>";
        } elseif ($kota == "Salatiga") {
            echo "kota : Salatiga<br>";
        } elseif ($kota == "Kudus") {
            echo "kota : Kudus<br>";
        } else {
            echo "kota : Pekalongan<br>";
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
</body>
</html>
