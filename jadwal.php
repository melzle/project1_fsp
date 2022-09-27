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

    public function __construct()
    {
        parentClass::__construct();
    }

    function getJadwal() {
        
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