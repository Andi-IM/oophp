<?php 

class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

    // Overriding constructor
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0, $jmlHalaman)
    {
        parent::__construct($judul, $creator, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo(){
        // Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
        $str = $this->judul ." | ".$this->getLabel()." (Rp. {$this->harga})";
                 
        return $str;        
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}
