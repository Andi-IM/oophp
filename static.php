<?php 
#11 Static Keyword
// Membert terikat dengan class, bukan dengan object
// Nilai Static akan selalu tetap (statis) meskipun objek di-instansiasi berkali-kali.
// dengan ini dapat membuat kode menjadi 'Procedural'
// umumnya digunakan sebgai helper
// digunakan pada class-class utility pada Framework

// class ContohStatic{
//     public static $angka = 1;

//     public static function halo(){
//         return "Halo." . self::$angka++ . " kali.";
//     }
// }

// // call static method 
// echo ContohStatic::$angka;
// echo "<br>";
// echo ContohStatic::halo();
// echo "<hr>";
// echo ContohStatic::halo();

class Contoh{
    public static $angka = 1;
    public function halo(){
        return "Halo ". self::$angka++ . " kali. <br>";
    }
}

$obj = new Contoh;
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

$obj2 = new Contoh;
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();
