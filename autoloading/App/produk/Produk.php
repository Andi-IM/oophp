<?php abstract class Produk {
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
