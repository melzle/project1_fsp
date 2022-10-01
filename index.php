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
    <form action="./" method="post">
        <select name="selectMahasiswa" id="" required>
            <?php
            $mahasiswa = new mahasiswa();
            $mahasiswas = $mahasiswa->getMahasiswas();

            if (!isset($_POST['submit'])) {
                echo "<option value='' selected hidden> -- Pilih Mahasiswa -- </option>";
            } else {
                $nrpSelected = $_POST['selectMahasiswa'];
                echo "<option value='' hidden> -- Pilih Mahasiswa -- </option>";
            }

            foreach ($mahasiswas as $m) {
                $selected = "";
                $nrp = $m[0];
                $nama = $m[1];
                if (isset($_POST['selectMahasiswa'])) {
                    if ($nrp == $_POST['selectMahasiswa']) {
                        $selected = "selected";
                    }
                }
                
                echo "<option value='$nrp' $selected>$nama</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit" name="submit">
        
        <?php
        $jadwal = new jadwal();
        if (isset($_POST['selectMahasiswa'])) {
            $table = $jadwal->printTabel($_POST['selectMahasiswa']);
            // echo 'select mhs';
        } else {
            $table = $jadwal->printTabel();
        }
        echo $table;
        ?>

    </form>

    <?php
    if (!isset($_POST['selectMahasiswa'])) {
        echo "<button type='button' disabled>Edit</button>";
    } else {
        echo "<form action='./edit.php' method='get'>";
        echo "<input type='hidden' name='nrp' value='".$_POST['selectMahasiswa']."'>";
        echo "<input type='submit' value='Edit'></form>";
    }
    ?>
</body>
</html>