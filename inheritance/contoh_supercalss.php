<?php

class person{
    private string $nama;
    private string $alamat;
    
    public function  __construct(string $nama,string $alamat){
        $this->nama = $nama;
        $this->alamat = $alamat;
    }

    public function tampilkanInfo(): void{
        echo "Nama : " . $this->nama . "<br>";
        echo "Alamat : " . $this->alamat . "<br>";
    }

    //getter untuk diakses subclass karena properti private
    public function getnama(): string{
        return $this->nama;
    }

    public function getalamat(): string{
        return $this->alamat;
    }
}
?>