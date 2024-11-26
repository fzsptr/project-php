<?php
class Barang {
    public $idBarang;
    public $nameBarang;
    public $hargaBarang;
    public $jumlahBarang;
    
    public function __construct($idBarang, $nameBarang, $hargaBarang, $jumlahBarang) {
        $this->idBarang = $idBarang;
        $this->nameBarang = $nameBarang;
        $this->hargaBarang = $hargaBarang;
        $this->jumlahBarang = $jumlahBarang;
    }
}
?>