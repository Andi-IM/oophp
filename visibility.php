<?php 

#9 Visibility
// Konsep yang digunakan untuk mengatur akses dari properti
// dan method pada sebuah objek
// Keyword visibility : public, protected, dan private.

# public
// digunakan dimana saja, bahkan di luar kelas
# protected
// digunakan dalam kelas beserta turunannya
# private
// digunakan hanya di dalam kelas

// visibility hanya memperlihatkan akses dari class yang dibutuhkan saja
// visibility menentukan kebutuhan yang jelas
// memberikan kendali untuk menghindari 'bug'

class Produk {
    public $judul, 
           $creator,
           $penerbit;

    protected $diskon = 0;

    private $harga;
           
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0)
    {
            $this->judul = $judul;
            $this->creator = $creator;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100); 
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
        parent::__construct($judul, $creator, $penerbit, $harga);
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
        parent::__construct($judul, $creator, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
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

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();