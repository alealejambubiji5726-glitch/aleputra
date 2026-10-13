<?php
    class aturBank{
        private $nomorRekening;
        private $saldo;
        private $pin;
        private $namaPemilik;

        public function __construct($nomorRekening,$namaPemilik, $saldoawal, $pin){
            $this->nomorRekening = $nomorRekening;
            $this->setsaldo($saldoawal);
            $this->setpin($pin);
            $this->namaPemilik = $namaPemilik;
        }

        public function getnomorRekenning(){
            return $this->nomorRekening;
        }

        //buat getter dan setter untuk saldo
        public function getsaldo(){
            //kita tambahkan lagi fungsi untuk merubah tampilan nilai uang
            return "RP " . number_format($this->saldo,2,',','.');//tampilan ada 2
        }                                                        //digit desimal dgn perintah

        public function setsaldo($jumlah){
            //buat validasi bahwa saldo tidak boleh negatif
            if($jumlah >= 0){
                $this->saldo=$jumlah;
            } else{
                echo "Error : Saldo awal/perubahan tidak valid <br>";
            }
        }

        //buat getter dan setter untuk pin(write-only / terenkripsi / terlindungi)
        public function setpin($pinBaru){
             // Validasi PIN harus tepat 6 digit angka
            if (preg_match('/^[0-9]{6}$/', $pinBaru)) {
             // Proses enkripsi pin menggunakan fungsi bawaan PHP yang benar
            $this->pin = password_hash($pinBaru, PASSWORD_BCRYPT);
            } else {
             echo "Error : PIN harus berupa 6 digit angka! <br>";
            }
        }

        public function getnamaPemilik(){
            return $this->namaPemilik;
        }


        //tidak ada getter pin untuk keamanan data
    }

    //penggunaan kode

    //buat object beserta propertinya
    $akun1 = new aturBank("3246-786-123","dimas anjay", 500000, "123456");
    echo "Nomor Rekening: " . $akun1->getnomorRekenning() . "<br>";
    echo "Nama Pemilik : " .$akun1->getnamaPemilik(). "<br>";
    echo "Saldo Anda: " . $akun1->getsaldo() . "<br>";

    //menambahkan data via setter 
    $akun1->setSaldo(750000);
    echo "saldo setelah di update :".$akun1->getsaldo() . "<br>";

    //ubah data dengan isi invalid
    $akun1->setSaldo(-250000);
    echo "saldo setelah di update :".$akun1->getsaldo() . "<br>";

    //pembuktian invalid
    //mencegah akun lain tanpa mengikuti getter dan setter
    //bisa dibandingkan dengan program sebelumnya pada cara pengAksesan property object
    $akun1->saldo = 950000;//akun fatal eror karena sudah dienkapsulasi dengan private
?>