<?php
require "childclass.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Sekolah - OOP PHP Inheritance</title>
    <!-- Load Bootstrap 5 CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h1 class="mb-4 text-center">Dashboard Akademik Berbasis OOP</h1>
        <div class="row">
            <div class="col-md-6">
                <?php
                // Memanggil file kelas di atas, lalu instansiasi objek web
                $profilSiswa1 = new PanelSiswa("Ale Ataya  Rafif", "0067891234", "Rekayasa Perangkat Lunak");
                $profilSiswa1->render(); // Menampilkan komponen web berbasis inheritance
                $profilSiswa1 = new PanelSiswa("Muhammad Rifki Saputra", "0836556378", "Rekayasa Perangkat Lunak");
                $profilSiswa1->render(); // Menampilkan komponen web berbasis inheritance
                ?>
            </div>
            <div class="col-md-6">
                <?php
                $infoSekolah = new PanelPengumuman("Jadwal Ujian Kompetensi Keahlian (UKK) RPL akan dilaksanakan mulai awal bulan depan.", "11 Oktober 2026");
                $infoSekolah->render();
                // Memanggil file kelas di atas, lalu instansiasi objek web; // Menampilkan komponen web berbasis inheritance
                ?>
            </div>
            </div>
        </div>
    </div>
</body>
</html>