<?php 

// require 'App/Produk/InfoProduk.php';
// require 'App/Produk/Produk.php';
// require 'App/Produk/Komik.php';
// require 'App/Produk/Game.php';
// require 'App/Produk/CetakInfoProduk.php';
// require 'App/Produk/User.php';

// require 'App/Service/User.php';

spl_autoload_register(function($class){
    // App\Produk\User = ["App","Produk","User"];
    $class = explode('\\', $class);
    $class = end($class);
    require __DIR__ . '/Produk/' . $class . '.php';
});

spl_autoload_register(function($class){
    // App\Service\User = ["App","Service","User"];
    $class = explode('\\', $class);
    $class = end($class);
    require __DIR__ . '/Service/' . $class . '.php';
});