<!DOCTYPE html>
<html>
<head>
    <title>Hasil Input POST</title>
</head>
<body>

<h2>Data Yang Dikirim Dengan Metode POST</h2>

    <?php
        echo "NIM :" . $_POST['nim'] . "<br>";
        echo "Nama :" . $_POST['nama'] . "<br>";
        echo "Tempat Lahir :" . $_POST['tempat_lahir'] . "<br>";
        echo "Tanggal Lahir :" . $_POST['tanggal_lahir'] . "<br>";
        echo "Alamat :" . $_POST['alamat'] . "<br>";


        $kota = $_POST['kota'];

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

        $jk = $_POST['jk'];

        if ($jk == "Laki-laki") {
            echo "Jenis Kelamin : Laki-laki<br>";
        } else {
            echo "Jenis Kelamin : Perempuan<br>";
        }

        echo "Email : " . $_POST['email'] . "<br>";
        echo "No HP : " . $_POST['no_hp'] . "<br>";
        echo "Umur : " . $_POST['umur'] . "<br>";

        $status = $_POST['status'];

        if ($status == "Kawin") {
            echo "Status : Kawin<br>";
        } else {
            echo "Status : Belum Kawin<br>";
        }

        if (isset($_POST['hobi']) && is_array($_POST['hobi'])) {
            echo "Hobi : " . implode(", ", $_POST['hobi']) . "<br>";
        } else {
            echo "Hobi : Tidak ada hobi yang dipilih<br>";
        }
    ?>
</body>
</html>
