<?php 

require 'App/init.php';

// $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 30000, 100);
// $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000, 50);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk( $produk1 );
// $cetakProduk->tambahProduk( $produk2 );
// echo $cetakProduk->cetak();

// echo "<hr>";

// menggunakan alias
use App\Service\User as ServiceUser;
use App\Produk\User as ProductUser;

new ServiceUser();
echo "<br>";
new ProductUser();

 
