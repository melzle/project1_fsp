<?php
require_once("./parent.php");

class mahasiswa extends parentClass {
    private $nrp;
    private $nama;

    public function __construct($nrp = null)
    {
        parentClass::__construct();
        if ($nrp == null) {
            $this->nrp = "";
            $this->nama = "";
        } else {
            $mhs = $this->getMahasiswa($nrp);
            $this->nrp = $mhs[0];
            $this->nrp = $mhs[1];
        }
    }

    function getMahasiswas() {
        $mhs = array();
        $res = $this->mysqli->query("SELECT * FROM mahasiswa");
        while($row = $res->fetch_assoc()) {
            array_push($mhs, array($row['nrp'], $row['nama']));
        }
        return $mhs;
    }

    function getMahasiswa($nrp) {
        $mhs = array();
        $stmt = $this->mysqli->prepare("SELECT * FROM mahasiswa WHERE nrp=?");
        $stmt->bind_param('s', $nrp);
        $stmt->execute();
        $res = $stmt->get_result();
        while($row = $res->fetch_assoc()) {
            $mhs = array($row['nrp'], $row['nama']);
        }
        return $mhs;
    }

    function getNrp() {
        return $this->nrp;
    }

    function setNrp($nrp) {
        $this->nrp = $nrp;
    }

    function getNama() {
        return $this->nama;
    }
}
?>