<?php
//buat namespace untuk controllers
namespace App\controllers;

//kita panggil namespace model siswa -> menggunakan use
use App\Models\siswa;

//kita buat kelas baru
class SiswaController{
    //method prosesData
    public function prosesData():void{
        //simulasi ambil data dari modal(yang nantinya database)
        $siswa1 = new siswa("25701","Siti Kusmini","XI","Rekayasa Perangkat Lunak");
        $siswa2 = new siswa("25702","Ale Ataya Rafif","XI","Rekayasa Perangkat Lunak");
        $siswa3 = new siswa("25703","Muhammad Rifki Saputra","XI","Rekayasa Perangkat Lunak");

        //controller untuk memproses dan merender tampilan HTML
        echo "<div style='border:2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;margin-bottom: 20px;
        background: #f8f9fa'>";

        echo "<h3 style='color: #007bff; margin-top: 0;'>
        Data Profil Siswa  (Via Controller)</h3>";

        echo "<b>NIS:</b> {$siswa1->getnis()} <br>";
        echo "<b>Nama:</b> {$siswa1->getnama()} <br>";
        echo "<b>Kelas:</b> {$siswa1->getkelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa1->getjurusan()} <br><br>";
        echo "<br><br>";
        echo "</div>";


        echo "<div style='border:2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;margin-bottom: 20px;
        background: #f8f9fa'>";
        
        echo "<b>NIS:</b> {$siswa2->getnis()} <br>";
        echo "<b>Nama:</b> {$siswa2->getnama()} <br>";
        echo "<b>Kelas:</b> {$siswa2->getkelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa2->getjurusan()} <br><br>";
        echo "<br><br>";
        echo"</div>";
        
        
        echo "<div style='border:2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;margin-bottom: 20px;
        background: #f8f9fa'>";
        
        echo "<b>NIS:</b> {$siswa3->getnis()} <br>";
        echo "<b>Nama:</b> {$siswa3->getnama()} <br>";
        echo "<b>Kelas:</b> {$siswa3->getkelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa3->getjurusan()} <br><br>";
        echo "<br><br>";
        echo "</div>";
    }
}