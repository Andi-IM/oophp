<?php 
#6 Inheritance / Pewarisan
// Menciptakan hierarki antar kelas (Parent & Child)
// Child Class mewarisi semua properti dan method yang dimiliki oleh parent-nya (yang visible)
// Child Class mengembangkan (extends) fungsionalitas parent-nya

# Class Mobil
    # Properti
    // - Nama
    // - Merk
    // - Warna
    // - kecepatanMaksimal
    // - jumlahPenumpang

    # Method
    // - tambahKecepatan()
    // - kurangiKecepatan()
    // - gantiTransmisi()
    // - belokKiri()
    // - belokKanan()

# Class MobilSport yang mewarisi kelas Mobil
    # Properti
    // Turbo
    # Method
    // jalankanTurbo()

# Penggunaan Inheritance
class Produk {
    public $judul, 
           $creator,
           $penerbit,
           $harga, 
           $jmlHalaman,
           $waktuMain;
           
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0,
    $jmlHalaman = 0, $waktuMain = 0)
    {
            $this->judul = $judul;
            $this->creator = $creator;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
            $this->jmlHalaman = $jmlHalaman;
            $this->waktuMain = $waktuMain;
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

// membuat kelas Komik yang mewarisi kelas Produk
class Komik extends Produk 
{ 
    public function getInfoProduk()
    {
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// membuat kelas Game yang mewarisi kelas Produk
class Game extends Produk {
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
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
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000,0, 50);

// Komik : Masashi Kishimoto, Shounen Jump
// Game : Neil Druckmann, Sony Computer Entertainment
// Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000)

// Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
// Game : Uncharted | Neil Druckmann, Sony Computer Entertainment (Rp. 250000) - 50 Jam;

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();