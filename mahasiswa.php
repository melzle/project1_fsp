<?php
require_once("./parent.php");

class mahasiswa extends parentClass {
    public function __construct()
    {
        parentClass::__construct();
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
        $stmt = $this->mysqli->prepare("SELECT * FROM mahasiswa WHERE nrp=?");
        $stmt->bind_param('s', $nrp);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }
}
?>