<?php 
#13 Abstract Class
// - Kelas yang tidak dapat di-instansiasi (tidak dapat dibentuk objeknya)
// - disebut kelas 'abstrak'
// - Mendefinisikan interface untuk kelas lain yang menjadi turunannya
// - Berperan sebagai kearangka dasar untuk kelas turunannya
// - Memiliki minimal 1 method abstrak
// - Erat dengan pewarisan untuk memaksa implementasi method 
//   abstrak yang sama untuk semua kelas turunannya
// - Semua Kelas turunan, harus mengimplementasikan method abstrak yang ada di kelas abstraknya
// - Kelas abstrak boleh memiliki properti / method reguler -> public / private / protected
// - Kelas abstrak boleh memiliki properti / static method

# Contoh kelas abstrak
abstract Class Kendaraan{}
class Mobil extends Kendaraan {}

# Mengapa kelas abstrak?
// Merepresentasikan ide atau konsep dasar
// "Composition over inheritance"
// Salah stau cara menerapkan Polymorphism
// Sentralisasi logic
// Memudahkan pengerjaan tim

abstract class Produk {
    private $judul, 
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

    public function getJudul(){
        return $this->judul;
    }

    public function setJudul($judul){
        if( !is_string($judul) ){
            return;
        }
        $this->judul = $judul;
    }

    public function getCreator(){
        return $this->creator;
    }

    public function setCreator($creator){
        if( !is_string($creator) ){
            return;
        }
        $this->creator = $creator;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    public function setPenerbit($penerbit){
        if( !is_string($penerbit) ){
            return;
        }
        $this->penerbit = $penerbit;
    }


    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100); 
    }

    public function setHarga($harga){
        if (is_int($harga)) {
            return;
        }
        return $this->harga=$harga;
    }

    public abstract function getInfoProduk(); 
    
    public function getInfo(){
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
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
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
        $str = "Game : ". $this->getInfo() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk {
    public $daftarProduk = [];

    public function tambahProduk( Produk $produk ){
        $this->daftarProduk[] = $produk;
    } 

    public function cetak(){
        $str = "Daftar Produk : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer Entertainment", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );
echo $cetakProduk->cetak();

