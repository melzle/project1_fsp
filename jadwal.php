<?php
require_once("./parent.php");
require_once("./mahasiswa.php");
require_once("./jam_kuliah.php");
require_once("./jadwal.php");
require_once("./hari.php");

class jadwal extends parentClass {
    private $mahasiswa;
    private $jam_kuliah;
    private $hari;

    public function __construct($mahasiswa=null, $jam_kuliah=null, $hari=null)
    {
        parentClass::__construct();
        $this->mahasiswa = $mahasiswa;
        $this->jam_kuliah = $jam_kuliah;
        $this->$hari = $hari;
    }


    function getJadwal() {
        $nrp = $this->mahasiswa->nrp;
        $stmt = $this->mysqli->prepare("SELECT * FROM jadwal WHERE nrp=?");
        $stmt->bind_param('s', $nrp);
        $stmt->execute();
        $res = $stmt->get_result();

        $array_jadwal = array();
        while ($row = $res->fetch_assoc()) {
            array_push($array_jadwal, array((int)$row['idjam_kuliah'], (int)$row['idhari']));
        }
        return $array_jadwal;
    }

    function printTabel($nrp=null) {
        $arr_jam_kuliah = $this->jam_kuliah->getJamKuliah;
        $arr_hari = $this->hari->getHari;
        $arr_jadwal = $this->getJadwal();

        if (!$nrp == null) {

        } else {
            echo "<table><tr>";
            foreach ($arr_hari as $h) {
                echo "<th>$h</th>";
            }
            echo "</tr>";
            $rowCounter = 0;
            foreach ($arr_jam_kuliah as $jk) {
                echo "<tr><td>$jk</td>";
                $colCounter = 0;
                for ($i = 0; $i < count($arr_hari); $i++) {
                    $indexer = array($rowCounter, $colCounter);
                    $check = "";

                    if (!array_search($indexer, $arr_jadwal, true)) {
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
    }


    function insertJadwal() {
        $nrp = $this->mahasiswa->nrp;
        $idhari = $this->hari->idhari;
        $idjam_kuliah = $this->jam_kuliah->idjam_kuliah;

        $stmt = $this->mysqli->prepare("INSERT INTO jadwal VALUES(?,?,?)");
        $stmt->bind_param('sii', $nrp, $idhari, $idjam_kuliah);
        $stmt->execute();
    }

    function updateJadwal() {
        
    }

    function deleteJadwal() {
        $nrp = $this->mahasiswa->nrp;
        $idhari = $this->hari->idhari;
        $idjam_kuliah = $this->jam_kuliah->idjam_kuliah;

        $stmt = $this->mysqli->prepare("DELETE FROM jadwal WHERE nrp=? AND idhari=? AND idjam_kuliah=?");
        $stmt->bind_param('sii', $nrp, $idhari, $idjam_kuliah);
        $stmt->execute();
    }
}
?>