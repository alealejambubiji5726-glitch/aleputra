<?php
//kita buat parent class 
class pegawai{
    protected $nama_pegawai;
    protected $gaji_pegawai;

    //method __construct
    public function __construct($nama_pegawai,$gaji_pegawai){
        $this->nama_pegawai = $nama_pegawai;
        $this->gaji_pegawai = $gaji_pegawai;
    }

    //fungsi getter untuk ambil nama
    public function getNama(){
        return $this->nama_pegawai;
    }

    //method dasasr di parent class
    // Perbaikan 1: Diubah dari hitungTotal menjadi hitungGaji agar sesuai dengan method di child class
    public function hitungGaji(){
        return $this->gaji_pegawai;
    }
}

//polimorfisme dengan inheritance, menggunakan  overriding
class freelancer extends pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai,$projectRate,$jumlahProject){
        //gaji di buat 0, karena frelancer hanya dibayar per project
        parent::__construct($nama_pegawai,0);
        // Perbaikan 2: Menambahkan '=' untuk memasukkan nilai ke variabel projectRate
        $this->projectRate = $projectRate;
        $this->jumlahProject = $jumlahProject;
    }

    //overriding untuk menghitung ulang gaji
    //menimpa/menulis kembali karakteristik method hitungGaji
    public function hitungGaji(){
        return $this->projectRate * $this->jumlahProject;
    }
}
    //child class kedua
    class karyawanTetap extends pegawai{
        private $tunjangan;

        public function __construct($nama_pegawai,$gaji_pegawai,$tunjangan){

            parent::__construct($nama_pegawai,$gaji_pegawai);
            $this->tunjangan=$tunjangan;
        }

            //polimorfisme dengan overriding/menimpa karakyteristik
            public function hitungGaji(){
                //ambil gaji pokok dari parent lalu tambahkan tunjangan
                return parent::hitungGaji() + $this->tunjangan;
            }
        }

        //buat fungsi untuk penerapan polimorfisme 
        function cetakGaji(pegawai $pegawai){
            echo "Gaji ".$pegawai->getNama(). ":RP.".number_format($pegawai->hitungGaji(),0,',','.')."<br>";
        }
        //penggunaan class dan fungsi

        $pegawaiBiasa =new pegawai("Chiko",30000000);
        // Perbaikan 3: Diubah menggunakan class 'freelancer' (bukan 'pegawai') dan menyertakan rate per project (5000000)
        $pegawaifrelancer = new freelancer("Miguel",5000000,4);
        $pegawaiTetap = new karyawanTetap("James",50000000,20000000);

        //mengunakan satu fungsi yang sama untuk berbagi objek
        cetakGaji($pegawaiBiasa);
        cetakGaji($pegawaifrelancer); 
        cetakGaji($pegawaiTetap);
?>