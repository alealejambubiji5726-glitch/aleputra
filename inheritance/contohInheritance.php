<?php
//buat parent class
class karyawan{
    private $nama;
    protected $gajiPokok;

    public function __construct($nama,$gajiPokok){
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    public function getnama(){
        return $this->nama;
    }

    public function hitungTotalGaji(){
        return $this->gajiPokok;
    }
}

//buat child class / kelas turunan
class Manager extends karyawan{
    private $bonus;

    public function  __construct($nama, $gajiPokok, $bonus){
        parent :: __construct($nama,$gajiPokok);
        $this->bonus;
    }

    //method baru untuk bonus manager
    public function getBonus(){
        return $this->bonus;
    }
}

//penggunaan kode
$staff = new karyawan("budi", 5000000);
$manager1 = new manager("andi",6000000,10000000);

//1. staff menggunakan method bawaan karyawan 
echo "Nama Karyawan " .$staff->getNama(). "| Total Gaji : Rp. ".number_format($staff->hitungTotalGaji(),0,',','.'). "<br>";

//2. manager menggunakan method karyawan ditambah getBonus milik manager
$totalGajiManajer = $manager1->hitungTotalGaji() + $manager1->getBonus();

echo "Nama Manager : " .$manager1->getNama(). " | Total Gaji : Rp. " .number_format($totalGajiManajer, 0, ',','.'). "<br>";
?>