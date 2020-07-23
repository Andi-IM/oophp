<?php
#12 Constant 
// Constanta adalah tipe data yang bernilai konstan dan tidak dapat diubah

// define tidak dapat diakses dari dalam kelas dan bersifat nilai global.
define('NAMA', 'Andi Irham');
echo NAMA;

echo "<br>";

// const dapat didimpan di dalam kelas
const UMUR = 32;
echo UMUR;

class Coba {
    const NAMA = "Andi";
}

// pemanggilan seperti static
echo Coba::NAMA;

// Magic Constant
// __LINE__ // print line number sc
// __FILE__  // print file tree
// __DIR__ // print directory
// __FUNCTION__
// __CLASS__
// __TRAIT__
// __METHOD__
// __NAMESPACE__

// function coba(){
//     return __FUNCTION__;
// }

// echo coba();

class Coba2 {
    public $kelas = __CLASS__;
}

$obj2 = new Coba2;
echo $obj2->kelas;