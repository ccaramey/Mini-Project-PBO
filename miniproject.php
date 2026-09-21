<?php

abstract class Produk{ //abstract
    private $kode; 
    private $nama;
    private $harga;
    private $stok; //enkapsulasi

    public function __construct($kode, $nama, $harga, $stok){ 
        $this->kode = $kode;
        $this->nama = $nama;

        if ($harga < 0){
            $harga = 0;
        }
        if ($stok < 0){
            $stok = 0;
        }
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getKode(){
        return $this->kode;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getHarga(){
        return $this->harga;
    }

    public function getStok(){
        return $this->stok;
    }

    public function setHarga($harga){
        if ($harga >= 0){
            $this->harga = $harga;
        }
        else{
            echo "Error.";
        }
    }

    public function setStok($stok){
        if ($stok >= 0){
        $this->stok = $stok;
        }
        else{
            echo "Stok habis.";
        }
    }

    abstract public function getInfo();
}


class Makanan extends Produk{ //inheretance
    protected $jenis;

    public function __construct($kode, $nama, $harga, $stok, $jenis){
        parent::__construct($kode, $nama, $harga, $stok);
        $this->jenis = $jenis;
    }

    public function getInfo(){ //polimorfisme
        echo "- Produk Makanan -<br>";
        echo "Kode   : " . $this->getKode() . "<br>";
        echo "Nama   : " . $this->getNama() . "<br>";
        echo "Harga  : Rp" . number_format($this->getHarga(), 0, ',', '.') . "<br>";
        echo "Stok   : " . $this->getStok() . "<br>";
        echo "Jenis  : " . $this->jenis . "<br><br>";
    }
}


class Aksesoris extends Produk{
    protected $ukuran;

    public function __construct($kode, $nama, $harga, $stok, $ukuran){
        parent::__construct($kode, $nama, $harga, $stok);
        $this->ukuran = $ukuran;
    }

    public function getInfo(){
        echo "- Produk Aksesoris -<br>";
        echo "Kode   : " . $this->getKode() . "<br>";
        echo "Nama   : " . $this->getNama() . "<br>";
        echo "Harga  : Rp" . number_format($this->getHarga(), 0, ',', '.') . "<br>";
        echo "Stok   : " . $this->getStok() . "<br>";
        echo "Ukuran  : " . $this->ukuran . "<br><br>";
    }
}

echo "=== PROGRAM PETSHOP ===<br>" . "<br>";

$produk1 = new Makanan(
    "M001",
    "Whiskas Tuna",
    45000,
    10,
    "Makanan Kucing"
);

$produk2 = new Aksesoris(
    "A001",
    "Kalung Kucing",
    25000,
    8,
    "S"
);


$daftarProduk = [$produk1, $produk2];

foreach ($daftarProduk as $produk) {
    $produk->getInfo();
}

$produk1->setHarga(50000);
$produk1->setStok(15);

echo "- Setelah Data Diubah -<br>";

echo "Nama  : " . $produk1->getNama() . "<br>";
echo "Harga : Rp" . number_format($produk1->getHarga(), 0, ',', '.') . "<br>";
echo "Stok  : " . $produk1->getStok() . "<br>";

?>