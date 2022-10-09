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
    <form action="./" method="get">
        <div style="margin-bottom: 15px;">
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
        echo "<button type='button' disabled>Edit</button>";
    } else {
        echo "<form action='./edit.php' method='get'>";
        echo "<input type='hidden' name='nrp' value='".$_GET['nrp']."'>";
        echo "<input type='submit' value='Edit'></form>";
    }
    ?>
    </div>
</body>
</html>