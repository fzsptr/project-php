<?php
    require_once 'nodes/node_barang.php';

class modelBarang {
        private $barangs = [];
        private $nextId = 1;
        private $Barang;


    public function __construct() {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = count($this->barangs)+1;
        } else {
            $this->initializeDefaultBarang();
        }   
    }
    public function initializeDefaultBarang() {
        $this->addBarang("Laptop", "10000000", 1);
        $this->addBarang("Handphone", "5000000", 2);
        $this->addBarang("Kamera", "7500000", 3);

    }
    public function addBarang($nameBarang, $hargaBarang, $jumlahBarang) {
        $this->Barang = new Barang($this->nextId++, $nameBarang, $hargaBarang, $jumlahBarang);
        $this->barangs[] = $this->Barang;
        $this->saveToSession();
    }
    private function saveToSession() {
        $_SESSION['barangs'] = serialize($this->barangs);
    }
    public function getAllBarangs() {
        return $this->barangs;
    }
    public function getBarangById($id) {
        foreach($this->barangs as $barang) {
            if ($barang->idBarang == $id) {
                return $barang;
            }
        }
        return null;
    }
    public function getListBarang() {
        $listBarang = [];
        foreach ($this->barangs as $barang) {
            // $listBarang[] = $this->barangs->namaBarang; // 1 problem di $this->barangs->namaBarang
            $listBarang[] = $barang->nameBarang;
        }
        return $listBarang;
    }
    public function deleteBarang($idBarang) {
        foreach($this->barangs as $key => $barang) {
            if ($barang->idBarang == $idBarang) {
                unset($this->barangs[$key]);
                $this->barangs = array_values($this->barangs);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    public function updateBarang($idBarang, $nameBarang, $hargaBarang, $jumlahBarang) {
        foreach($this->barangs as $barang) {
            if ($barang->idBarang == $idBarang) {
                $barang->nameBarang = $nameBarang;
                $barang->hargaBarang = $hargaBarang;
                $barang->jumlahBarang = $jumlahBarang;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}
?>