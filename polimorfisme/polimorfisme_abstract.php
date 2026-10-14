<?php
//kita buat abstract baru
//abstract itu adalah class yang tidak dipakai langsung jadi object
abstract class notifikasiWeb{
    protected string $penerima;
    protected string $pesan;

    public function __construct(string $penerima,string $pesan){
        $this->penerima = $penerima;
        $this->pesan = $pesan;
    }

    //method biasa yang diwariskan dan digunakan langsung oleh keturunanya
    public function getinfoPengiriman(): string{
        return "Mengirim ke: {$this->penerima}";
    }

    //abstract method kontrak wajib yang harus di override oleh kelas turunannya
    abstract public function kirimNotifikasi(): void; 
}

//kelas turunan 1:notifikasi ke email
class notifEmail extends notifikasiWeb{
    private string $subjek;

    public function __construct(string $penerima,string $pesan,string $subjek){ // <-- Tambahkan $ pada subjek
        parent::__construct($penerima,$pesan); // <-- Hapus kata return
        $this->subjek = $subjek; // <-- Tambahkan titik koma ;
    }

    //wajib meng-override absract method dari parent class
    #[override] 
    public function kirimNotifikasi(): void{
        echo "<div style='border: 2px solid #007bff; padding: 10px; margin-bottom: 10px; background-color: #f8f9fa;'>";
        echo "<h4> [EMAIL]- Subjek: {$this->subjek}</h4>";
        echo "<p>Isi pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}
//clas turunan 2: Notifikasi Via WhatsApp
//class notifWA;
class notifWA extends notifikasiWeb{
//wajib override abstract method dari parent
    public function kirimNotifikasi():void
    {
        echo "<div style='border:2px solid #28a745;
                        padding : 10px;
                        margin-bottom:10px;
                        background-color : #e8f5e9;
                        '>";

        echo "<h4>[WHATSAPP MASSAGE]</h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Pesan : <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}
//kelas turunan 3:notifikasi Browser
class notifBrowser extends notifikasiWeb{
    private string $browserApp;

    public function  __construct(string $penerima, string $pesan, string $browserApp){
        parent:: __construct($penerima,$pesan);
        $this->browserApp = $browserApp;
    }
    //wajib override abstract method  dari parent
    public function kirimNotifikasi():void
    {
        echo "<div style='border:2px solid #ffc107;
            padding:10px; margin-bottom:10px; background-color: #fff3cd;'>";
        echo "<h4>[PUSH NOTIF] - Browser: {$this->browserApp}</h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Notif: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

class notifGitHub extends notifikasiWeb{
    private string $Repository;

    public function __construct(string $penerima, string $pesan, string $Repository){
        parent:: __construct($penerima,$pesan);
        $this->Repository = $Repository;
    }

    public function kirimNotifikasi():void
    {
        echo "<div style='border:2px solid #590086;
            padding:10px; margin-bottom:10px; background-color: #d47ac8;'>";
        echo "<h4>[GitHub] - Browser: {$this->Repository}</h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Notif: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//buat class manager untuk menerpakan poliformisme
class notifManager{
    //menerima tipe data berdasar abstract class apapun objeknya,asalkan turunan notifikasiWeb, bisa masuk
    public static function prosesKirim(notifikasiWeb $notif):void{
        $notif->kirimNotifikasi();
    }
}

//penggunaan dan instansiasi objek
echo "<h2>Dashboard Simulasi Pengiriman Notifikasi Web</h2>";

//membuat berbagai macam objek notif
$notif1 = new notifEmail("Steve@gmail.com", "Akun Anda Berhasil didaftarkan.", "Konfirmasi Akun");
$notif2 = new notifWA("0284072448", "Kode OTP anda adalah 9930. Jangan berikan ke siapapun");
$notif3 = new notifBrowser("Token_Dveice_Asus", "Ada diskon 40% untuk produk pilihan anda!", "Google Chrome");
$notif4 = new notifGitHub("Commit ke repository Ale Rifki", "Berhasil Commit", "Google Chrome");

//mengirimkan dan menampilkan semua notif secara polimorfisme melalui manager
notifManager::prosesKirim($notif1);
notifManager::prosesKirim($notif2);
notifManager::prosesKirim($notif3);
notifManager::prosesKirim($notif4);
?>