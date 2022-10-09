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
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <form action="./" method="get">
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
        <input type="submit" value="Submit">
        
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

    <?php
    if (!isset($_GET['nrp'])) {
        echo "<button type='button' disabled>Edit</button>";
    } else {
        echo "<form action='./edit.php' method='get'>";
        echo "<input type='hidden' name='nrp' value='".$_GET['nrp']."'>";
        echo "<input type='submit' value='Edit'></form>";
    }
    ?>
</body>
</html>