<?php
require_once("class/parent.php");

class jam_kuliah extends parentClass {
    public function __construct()
    {
        parentClass::__construct();
        
    }

    function getJamKuliah() {
        $jamKuliah = array();
        $res = $this->mysqli->query("SELECT * FROM jam_kuliah");
        while($row = $res->fetch_assoc()) {
            array_push($jamKuliah, array('id'=>$row['idjam_kuliah'], 'jam_mulai'=>$row['jam_mulai'], 'jam_selesai'=>$row['jam_selesai']));
        }
        return $jamKuliah;
    }
}
?>