<?php
require_once("class/jadwal.php");
require_once("class/mahasiswa.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="./" method="get">
        <div style="margin-bottom: 15px; margin-top:15px;">
        <ul class="breadcrumb">

            <li class="title">Jadwal Kuliah</li>

        </ul>
        <!-- <p class="title">Jadwal Kuliah</p> -->
        <select name="nrp" id="" required>
            <?php
            $mahasiswa = new mahasiswa();
            $mahasiswas = $mahasiswa->getMahasiswas();

            if (!isset($_GET['nrp'])) {
                echo "<option value='' selected hidden> -- Pilih Mahasiswa -- </option>";
            } else {
                $nrpSelected = $_GET['nrp'];
                echo "<option value='' hidden> -- Pilih Mahasiswa -- </option>";
            }

            foreach ($mahasiswas as $m) {
                $selected = "";
                $nrp = $m[0];
                $nama = $m[1];
                if (isset($_GET['nrp'])) {
                    if ($nrp == $_GET['nrp']) {
                        $selected = "selected";
                    }
                }
                
                echo "<option value='$nrp' $selected>$nama</option>";
            }
            ?>
        </select>
        <input type="submit" value="Pilih" class="btn-primary" style="margin-left: 10px;">
        </div>

        
        <?php
        $jadwal = new jadwal();
        if (isset($_GET['nrp'])) {
            $table = $jadwal->printTabel($_GET['nrp']);
            // echo 'select mhs';
        } else {
            $table = $jadwal->printTabel();
        }
        echo $table;

        // mysqli_close($jadwal->mysqli);
        ?>

    </form>
    <div style="margin-top: 15px;">

    <?php
    if (!isset($_GET['nrp'])) {
        echo "<button type='button' class='btn-primary-disabled' >Ubah Jadwal</button>";
    } else {
        echo "<form action='./edit.php' method='get'>";
        echo "<input type='hidden' name='nrp' value='".$_GET['nrp']."'>";
        echo "<input type='submit' value='Ubah Jadwal' class='btn-primary'></form>";
    }
    ?>
    </div>
    </div>
</body>
</html>