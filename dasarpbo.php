<?php
//pseudocode dari contoh elemen pbo//
//class=belanjaBulanan;
//property=namaBarang,harga,jumlah;
//method=aturNama(),hitungTotal(),tampilTotal();
//object=belanjaBulanan1,belanjaBulanan2;

//namaBarang="Beras";
//harga=60000;
//jumlah=2

//namaBarang="Galon";
//harga=25;
//jumlah=3;

class belanjaBulanan{
    public string $namaBarang;
    public float $harga;
    public int $jumlah;

    public function atur($namaBarang,$harga,$jumlah){
        $this->namaBarang = $namaBarang;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
    }

    public function hitungTotal(){
       return  $this->harga * $this->jumlah;
    }

    public function tampilTotal(){
        echo "Nama Barang : ".$this->namaBarang."<br>";
        echo "Harga       : Rp ".number_format($this->harga, 0, ',','.')."<br>";
        echo "Jumlah      : ".$this->jumlah."<br>";
        echo "Total Bayar : Rp ".number_format($this->hitungTotal(), 0, ',','.')."<br>";
    }
}
$belanja = new belanjaBulanan;
$belanja->atur("Beras",60000,1);
$belanja1 = new belanjaBulanan;
$belanja1->atur("Galon",25000,2);
$belanja->tampilTotal();
echo "<br>";
$belanja1->tampilTotal();
?>