<?php
require_once("class/parent.php");
require_once("class/mahasiswa.php");
require_once("class/jam_kuliah.php");
require_once("class/jadwal.php");
require_once("class/hari.php");

class jadwal extends parentClass {
    private $mahasiswa;
    private $jam_kuliah;
    private $hari;

    public function __construct($mahasiswa=null, $jam_kuliah=null, $hari=null)
    {
        parentClass::__construct();

        if ($mahasiswa == null) {
            $this->mahasiswa = new mahasiswa();
        } else {
            $this->mahasiswa = $mahasiswa;
        }

        if ($jam_kuliah == null) {
            $this->jam_kuliah = new jam_kuliah();
        } else {
            $this->jam_kuliah = $jam_kuliah;
        }

        if ($hari == null) {
            $this->$hari = new hari();
        } else {
            $this->$hari = $hari;
        }
    }

    function getJadwal($nrp) {
        $stmt = $this->mysqli->prepare("SELECT * FROM jadwal WHERE nrp=?");
        $stmt->bind_param('s', $nrp);
        $stmt->execute();
        $res = $stmt->get_result();

        $array_jadwal = array();
        while ($row = $res->fetch_assoc()) {
            array_push($array_jadwal, array((int)$row['idjam_kuliah'], (int)$row['idhari']));
        }
        // echo "print getjadwal $nrp: ";
        // print_r($array_jadwal);
        return $array_jadwal;
    }

    function printTabel($nrp=null) {
        $arr_jam_kuliah = $this->jam_kuliah->getJamKuliah();
        $hari = new hari();
        $arr_hari = $hari->getHari();
        $arr_jadwal = array();

        if ($nrp != null) {
            $arr_jadwal = $this->getJadwal($nrp);
            // echo "ngeprint dari printtabel: ";
            // print_r($this->getJadwal($11nrp));
        }

        // echo "arr jdwal";
        // print_r($arr_jadwal);

        echo "<table><tr><th></th>";
        // print_r($arr_hari);
        foreach ($arr_hari as $h) {
            echo "<th>$h</th>";
        }
        echo "</tr>";
        $rowCounter = 1;
        foreach ($arr_jam_kuliah as $jk) {
            $jam_mulai = date_create($jk['jam_mulai']);
            $jam_selesai = date_create($jk['jam_selesai']);
            echo "<tr><td>". date_format($jam_mulai, 'H:i') ." - ". date_format($jam_selesai, 'H:i') ."</td>";
            $colCounter = 1;
            for ($i = 0; $i < count($arr_hari); $i++) {
                $indexer = array($rowCounter, $colCounter);
                // echo('indexer');
                // print_r($indexer);
                $check = "";

                // echo(array_search($indexer, $arr_jadwal[0], true));
                if (in_array($indexer, $arr_jadwal, true)) {
                    $check = "&check;";
                }
                echo "<td>$check</td>";
                $colCounter++;
            }
            echo "</tr>";
            $rowCounter++;
        }
        echo "</table>";
    }

    function printTabelEdit($nrp) {
        $arr_jam_kuliah = $this->jam_kuliah->getJamKuliah();
        $hari = new hari();
        $arr_hari = $hari->getHari();
        $arr_jadwal = $this->getJadwal($nrp);
        // print_r($arr_jadwal);

        echo "<table><tr><th></th>";
        foreach ($arr_hari as $h) {
            echo "<th>$h</th>";
        }
        echo "</tr>";
        $rowCounter = 1;
        foreach ($arr_jam_kuliah as $jk) {
            $jam_mulai = date_create($jk['jam_mulai']);
            $jam_selesai = date_create($jk['jam_selesai']);
            echo "<tr><td>". date_format($jam_mulai, 'H:i') ." - ". date_format($jam_selesai, 'H:i') ."</td>";
            $colCounter = 1;
            for ($i = 0; $i < count($arr_hari); $i++) {
                $indexer = array($rowCounter, $colCounter);
                $checked = "";

                if (in_array($indexer, $arr_jadwal, true)) {
                    $checked = "checked";
                }
                echo "<td><input type='checkbox' name='jadwal[]' value='$rowCounter,$colCounter' $checked></td>";
                $colCounter++;
            }
            echo "</tr>";
            $rowCounter++;
        }
        echo "</table>";
    }

    function insertJadwal($nrp, $idhari, $idjam_kuliah) {
        $stmt = $this->mysqli->prepare("INSERT INTO jadwal VALUES(?,?,?)");
        $stmt->bind_param('sii', $nrp, $idhari, $idjam_kuliah);
        $stmt->execute();
    }

    function deleteJadwal($nrp) {
        $stmt = $this->mysqli->prepare("DELETE FROM jadwal WHERE nrp=?");
        $stmt->bind_param('s', $nrp);
        $stmt->execute();
    }
}
?>