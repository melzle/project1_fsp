<?php
require_once("./jadwal.php");
require_once("./mahasiswa.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./" method="post">
        <select name="selectMahasiswa" id="" required>
            <?php
            $mahasiswa = new mahasiswa();
            $mahasiswas = $mahasiswa->getMahasiswas();

            if (!isset($_POST['submit'])) {
                echo "<option value='' selected> -- Pilih Mahasiswa -- </option>";
            } else {
                echo "<option value=''> -- Pilih Mahasiswa -- </option>";
            }

            foreach ($mahasiswas as $m) {
                $nrp = $m[0];
                $nama = $m[1];

                echo "<option value='$nrp'>$nama</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit" name="submit">
    </form>

    <?php
    if (!isset($_POST['submit'])) {

    } else {

    }
    ?>
</body>
</html>