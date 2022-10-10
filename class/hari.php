<?php
require_once("class/parent.php");

class hari extends parentClass {
    public function __construct()
    {
        parentClass::__construct();
        
    }

    function getHari() {
        $hari = array();
        $res = $this->mysqli->query("SELECT * FROM hari");
        while($row = $res->fetch_assoc()) {
            array_push($hari, $row['nama']);
        }
        return $hari;
    }
}
?>