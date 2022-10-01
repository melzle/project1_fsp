<?php
require_once("./jadwal.php");
require_once("./mahasiswa.php");

if (!isset($_POST['jadwal[]'])) {
    header("location: ./edit.php");
} else {
    $nrp = $_POST['nrp'];
    $jadwals = $_POST['jadwal'];

    $obj_jadwal = new jadwal;
    $obj_jadwal->deleteJadwal($nrp);

    foreach ($jadwals as $j) {
        $arr_jadwal = explode(",", $j);
        $obj_jadwal->insertJadwal($nrp, $arr_jadwal[1], $arr_jadwal[0]);
    }
    header("location: ./edit.php");
    die();
}
?>