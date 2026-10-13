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
class notifikasi extends notifikasiWeb{
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
//class notifWeb 
?>