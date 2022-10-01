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
    <?php
    if (!isset($_GET['nrp'])) {
        header("location: index.php");
        die();
    } else {
        $nrp = $_GET['nrp'];
        $mhs = new mahasiswa($nrp);
        echo "<div>Mahasiswa: " + $mhs->getNrp + " - " + $mhs->getNama + "</div>";
    }
    ?>
    <form action="./" method="post">
        
    </form>
</body>
</html>