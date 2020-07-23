<?php 

#15 Interface
// Adalah KELAS ABSTRAK yang tidak memiliki implementasi
// MURNI merupakan template untuk kelas turunannya
// TIDAK BOLEH MEMILIKI PROPERTI, hanya methodnya saja

# Menggunakan Interface
interface Buah {
    public function makan();
    public function setWarna($warna);
}

interface Benda{
    public function setUkuran($ukuran);
}

# Kelas turunan Buah
class Apel implements Buah, Benda {
    protected $warna;
    protected $ukuran;

    // implementasi Buah
    public function makan(){
        // makan
        // nom.. nom..
    }

    public function setWarna($warna){
        // code
        $this->warna = $warna;
    }   

    // implementasi Benda
    public function setUkuran($ukuran){
        $this->ukuran = $ukuran;
    }
}

// semua method wajib dideklarasikan dengan visibility PUBLIC 
// boleh mendeklarasikan __construct()
// Satu kelas boleh mengimplementasikan banyak interface
// Dengan menggunakan type-hinting dapat melakukan 'Depedency Injection'
// Kita akan mencapai Polymorphism

interface InfoProduk {
    public function getInfoProduk(); 
}

abstract class Produk {
    protected $judul, 
            $creator,
            $penerbit,
            $diskon = 0,
            $harga;
           
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
    
    abstract public function getInfo();

    public function sayHello(){
        return "Hello World!";
    }
    
    public function getLabel(){
        return "$this->creator, $this->penerbit";
    }
}

// kelas Komik mewarisi semua properti dan objek kelas Produk  
// dan mengimplementasikan interface InfoProduk
class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

    // Overriding constructor
    public function __construct($judul = "judul",
    $creator = "creator", $penerbit = "penerbit", $harga = 0, $jmlHalaman)
    {
        parent::__construct($judul, $creator, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo(){
        // Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
        $str = $this->judul ." | ".$this->getLabel()." (Rp. {$this->harga})";
                 
        return $str;        
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// kelas Game mewarisi semua properti dan objek kelas Produk  
// dan mengimplementasikan interface InfoProduk
class Game extends Produk implements InfoProduk {
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

    public function getInfo(){
        // Komik : Naruto | Masashi Kishimoto, Shounen Jump (Rp. 30000) - 100 halaman.
        $str = $this->judul ." | ".$this->getLabel()." (Rp. {$this->harga})";
                 
        return $str;        
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