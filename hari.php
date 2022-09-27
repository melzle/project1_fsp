<?php
require_once("./parent.php");

class hari extends parentClass {
    public function __construct()
    {
        parentClass::__construct();
        
    }

    function getHari() {
        $hari = array();
        $res = $this->mysqli->query("SELECT * FROM hari");
        while($row = $res->fetch_assoc()) {
            array_push($hari, array('idhari'=>$row['idhari'], 'Nama'=>$row['nama']));
        }
        return $hari;
    }
}
?>