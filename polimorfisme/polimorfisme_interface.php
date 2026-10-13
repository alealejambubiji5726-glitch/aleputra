<?php
//kita buat dulu interface
interface Cetaktable{
    //kontrak siapapun yang meng-implementasi ini wajib punya method tampilkanCetak()

    public function tampilkanCetak(): void;
}
//kelas laporanSiswa
class laporanSiswa implements Cetaktable{
    private string $namaSiswa;
    private string $kelas;

    public function __construct(string $namaSiswa,string $kelas){
        $this->namaSiswa = $namaSiswa;
        $this->kelas = $kelas;
    }

    //wajib menjalankan kontrak implements interface
    //yaitu membuat isi method/fungsi tampilkanCetak


    public function tampilkanCetak(): void
{
    // Perbaikan: Merapikan tanda petik style CSS agar menyambung dalam satu baris utuh
    echo "<div style='border: 1px solid green; padding: 10px; margin-bottom: 10px;'>";

    echo "<h3> Cetak Dokumen:  Rapor Siswa </h3>";
    echo "Nama: {$this->namaSiswa} | Kelas: {$this->kelas}";
    echo "</div>";
}
}
//buat kelas guru

class laporanGuru implements Cetaktable{
    private string $namaGuru;
    private string $mataPelajaran;

    public function __construct(string $nama,string $mapel){
        $this->namaGuru = $nama;
        $this->mataPelajaran = $mapel;
    }

    public function tampilkanCetak(): void{
        // Perbaikan: Merapikan tanda petik style CSS agar menyambung dalam satu baris utuh
        echo "<div style='border: 1px solid blue; padding: 10px; margin-bottom: 10px;'>";

        echo "<h3> Cetak Dokumen: Jadwal / Data Guru </h3>";
        echo "Nama Guru: {$this->namaGuru} |
        Mata Pelajaran: {$this->mataPelajaran}";
        echo "</div>";
    }
}

//buat kelas untuk mencetak berbagai nama objek
//yang mengimplementasikan interface 
class Cetakmanager{
    //menerima data apapun selama dia mengimplementasikan
    //interface Cetaktable (ini adalah penerapan polimorfisme nya)
    public static function prosesCetak(Cetaktable $dokumen): void{
        //keyboard static artinya class bisa dipanggil langsung
        //tanpa harus ada objeknhya
        $dokumen->tampilkanCetak();
    }
}
//contoh instansiasi objek
echo "<h2>Daftar Cetak Dokumen Sekolah</h2>";

//membuat objek siswa
$siswa1 = new laporanSiswa("Ahmad Naruto","XI RPL 4");
$siswa2 = new laporanSiswa("Sakura Lestari","XI RPL 5");
$siswa3 = new laporanSiswa("Ale Ataya Rafif ","XI RPL 1");
$siswa4 = new laporanSiswa("Muhammad Rifki Saputra","XI RPL 1");

//membuat objek guru
$guru1 = new laporanGuru("Pak Jerry, S.Pd","Matematika");
$guru2 = new laporanGuru("Pak Galih Haris Fauzi , S.Pd","Produktif RPL");

//mencetak menggunakan kelas CetakManager(hasil Polimorfisme)
Cetakmanager::prosesCetak($siswa1);
Cetakmanager::prosesCetak($siswa2);
Cetakmanager::prosesCetak($siswa3);
Cetakmanager::prosesCetak($siswa4);
Cetakmanager::prosesCetak($guru1);
Cetakmanager::prosesCetak($guru2);
?>
