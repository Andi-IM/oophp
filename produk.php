<?php 

// jualan produk
// Komik
// Game

class Produk {
    public $judul = "judul", 
           $creator = "creator",
           $penerbit = "penerbit",
           $harga = 0;

    public function sayHello(){
        return "Hello World!";
    }
    
    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
}

// $produk1 = new Produk();
// $produk1->judul = "naruto";
// var_dump($produk1);

// $produk2 = new Produk();
// $produk2->judul = "Uncharted";
// $produk2->tambahProdperti = "wkwk";
// var_dump($produk2);

$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shounen Jump";
$produk3->harga = 30000;

// echo "Komik : $produk3->penulis, $produk3->penerbit"; 
// echo "<br>";
// echo $produk3->getLabel();

echo "<hr>";

$produk4 = new Produk();
$produk4->judul = "Uncharted";
$produk4->penulis = "Neil Druckmann";
$produk4->penerbit = "Sony Computer Entertainment";
$produk4->harga = 250000;

echo "Komik : " . $produk3->getLabel();
echo "<br>"; 
echo "Game : " . $produk4->getLabel();
