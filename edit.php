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
    <?php
    if (!isset($_GET['nrp'])) {
        // header("location: index.php");
        die();
    } else {
        $nrp = $_GET['nrp'];
        $mhs = new mahasiswa($nrp);
        echo "<div>Mahasiswa: ".$mhs->getNrp()." - ".$mhs->getNama()."</div>";
        echo "<form action='./edit_proses.php' method='post'>";

        $jadwal = new jadwal;
        $tabel = $jadwal->printTabelEdit($nrp);
        echo $tabel;
        echo"<input type='hidden' name='nrp' value='$nrp'>";
        echo "<input type='submit' value='Simpan' name='btnSimpan'>";

        echo "</form>";
    }
    ?>
</body>
</html>