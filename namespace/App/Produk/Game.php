<?php namespace App\Produk;

class Game extends Produk implements InfoProduk {
    public $waktuMain;

    // Overriding constructor
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0, $waktuMain)
    {
        parent::__construct($judul, $creator, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    public function getInfo(){
        // Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
        $str = $this->judul ." | ".$this->getLabel()." (Rp. {$this->harga})";
                 
        return $str;        
    }

    public function getInfoProduk()
    // overriding method menggunakan ->parent
    {
        $str = "Game : ". $this->getInfo() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}