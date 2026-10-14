<?php
//panggil namespace
use App\Models\siswa;
//bisa gunakan alias jika nama class nya sama persis
use App\controllers\siswacontroller;

//memuat file kelas
require_once 'App/Models/siswa.php';
require_once 'App/controllers/siswacontroller.php';

echo "<h2>Sistem Informasi Sekolah - SMK Texmaco </h2>";
echo"<hr>";

//instansiasi controller dan jalankan method
$controller = new siswacontroller();
$controller->prosesData();

echo"<br> <hr>";

//instalasi object
$siswa1 = new siswa("25701","Siti Kusmini","XI","Rekayasa Perangkat Lunak");
echo "NIS: ".$siswa1->getnis()."<br>";
echo "NAMA: ".$siswa1->getnama()."<br>";
echo "KELAS: ".$siswa1->getkelas()."<br>";
echo "JURUSAN: ".$siswa1->getjurusan();
?>