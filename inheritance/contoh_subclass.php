<?php
require "contoh_supercalss.php";

class siswa extends person{
    private string $nis;

    public function __construct(string $nama,string $alamat,string $nis){
        //memanggil construct milik superrclass
        parent::__construct($nama,$alamat);
        $this->nis = $nis;
    }

    public function belajar():void{
        echo "siswa bernama : " . $this->getnama() . "dengan NISN : ".$this->nis." sedang belajar mata pelajaran RPL.<br>";
    }
}

//pengujian inheritance melalui objek
$siswa1 = new siswa ("ahmad dani", "kendal", "078686");
$siswa1-> tampilkaninfo();//method warisan
$siswa1->belajar();
?>