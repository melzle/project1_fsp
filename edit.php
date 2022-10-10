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
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <ul class="breadcrumb">
        <li ><a href="#" class="title">Jadwal Kuliah</a></li>
        <li>Edit Jadwal</li>
    </ul>
    
    <?php
    if (!isset($_GET['nrp'])) {
        // header("location: index.php");
        die();
    } else {
        $nrp = $_GET['nrp'];
        $mhs = new mahasiswa($nrp);
        echo "<div>Mahasiswa: ".$mhs->getNrp()." - ".$mhs->getNama()."</div>";
        echo '<div style="margin-top: 15px;">';
        echo "<form action='./edit_proses.php' method='post'>";
        $jadwal = new jadwal;
        $tabel = $jadwal->printTabelEdit($nrp);
        echo $tabel;
        echo"<input type='hidden' name='nrp' value='$nrp'>";
        echo'</div>';
        echo '<div style="margin-top: 15px;">';
        echo "<input type='submit' value='Simpan' name='btnSimpan' class='btn-primary'>";
        echo "</form>";
        echo'</div>';

        // mysqli_close($)
    }
    ?>
    </div>
</body>
</html>