<?php 

class Produk {
    public $judul, 
           $creator,
           $penerbit,
           $harga;
           
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0)
    {
            $this->judul = $judul;
            $this->creator = $creator;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
    }

    public function getInfoProduk(){
        // Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
                 
        return $str;        
    }

    public function sayHello(){
        return "Hello World!";
    }
    
    public function getLabel(){
        return "$this->creator, $this->penerbit";
    }
}

class Komik extends Produk {
    public $jmlHalaman;

    // Overriding constructor
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0, $jmlHalaman)
    {
        parent::__construct($judul = "judul",
        $creator = "creator", $penerbit = "penerbit", $harga = 0);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk {
    public $waktuMain;

    // Overriding constructor
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0, $waktuMain)
    {
        parent::__construct($judul = "judul",
        $creator = "creator", $penerbit = "penerbit", $harga = 0);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk()
    // overriding method menggunakan ->parent
    {
        $str = "Game : ". parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk{
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getlabel()}  (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000, 50);

// Komik : Masashi Kishimoto, Shounen Jump
// Game : Neil Druckmann, Sony Computer Entertainment
// Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000)

// Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
// Game : Uncharted | Neil Druckmann, Sony Computer Entertainment (Rp. 250000) - 50 Jam;

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();