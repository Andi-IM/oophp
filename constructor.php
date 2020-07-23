<?php 
#4 Constructor
// Sebuah method yang khusus yang ada di dalam sebuah kelas
// method yang dijalankan ketika sebuah kelas di instansiasi / dibuat object

// jualan produk
// Komik
// Game

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

    public function sayHello(){
        return "Hello World!";
    }
    
    public function getLabel(){
        return "$this->creator, $this->penerbit";
    }
}


$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000);
$produk3 = new Produk("Dragon Ball");

echo "Komik : " . $produk1->getLabel();
echo "<br>"; 
echo "Game : " . $produk2->getLabel();
echo "<br>"; 
var_dump($produk3);