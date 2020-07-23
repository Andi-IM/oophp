<?php 
#6 Inheritance (Pewarisan)
class Produk {
    public $judul, 
           $creator,
           $penerbit,
           $harga, 
           $jmlHalaman,
           $waktuMain,
           $tipe;
           
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0,
    $jmlHalaman = 0, $waktuMain = 0, $tipe)
    {
            $this->judul = $judul;
            $this->creator = $creator;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
            $this->jmlHalaman = $jmlHalaman;
            $this->waktuMain = $waktuMain;
            $this->tipe = $tipe;
    }

    public function getInfoLengkap(){
        // Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        $str .= ($this->tipe == "Komik" ? " - {$this->jmlHalaman} Halaman" : 
                    ($this->tipe == "Game" ? " ~ {$this->waktuMain} Jam" : null)
                ); // return String 
                 
        return $str;        
    }

    public function sayHello(){
        return "Hello World!";
    }
    
    public function getLabel(){
        return "$this->creator, $this->penerbit";
    }
}

class CetakInfoProduk{
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getlabel()}  (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000, 0, 50, "Game");

// Komik : Masashi Kishimoto, Shounen Jump
// Game : Neil Druckmann, Sony Computer Entertainment
// Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000)

// Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
// Game : Uncharted | Neil Druckmann, Sony Computer Entertainment (Rp. 250000) - 50 Jam;

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();