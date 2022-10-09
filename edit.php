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
       @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            
        }
        table, th, td, tr {
            border: 1px solid #f2f5f7;
            border-collapse: collapse;
            text-align:center;
            padding: 5px 10px;
            
        
        }

        th{
            background: #a91b60;
            font-weight:normal;
            color: white;

        }

        td{
            background: #f9f9f9;
            
        }

        tr:nth-child(even) td{
            background: #f1f1f1 !important;

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
        echo '<div style="margin-top: 15px;">';
        echo "<form action='./edit_proses.php' method='post'>";
        $jadwal = new jadwal;
        $tabel = $jadwal->printTabelEdit($nrp);
        echo $tabel;
        echo"<input type='hidden' name='nrp' value='$nrp'>";
        echo'</div>';
        echo '<div style="margin-top: 15px;">';
        echo "<input type='submit' value='Simpan' name='btnSimpan'>";
        echo "</form>";
        echo'</div>';

        // mysqli_close($)
    }
    ?>
</body>
</html>