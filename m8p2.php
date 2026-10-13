<?php

class TabunganSiswa {
    private string $nomorRekening;
    private string $namaSiswa;
    private int $saldo;
    private string $pin;

    public function __construct(string $noRek, string $nama, int $saldoAwal, string $pin) {
        $this->nomorRekening = $noRek;
        $this->namaSiswa = $nama;
         if (is_numeric($pin) && strlen($pin) === 4) {
        $this->pin = $pin;
    } else {
        echo "Sistem: PIN harus 4 digit<br>";
    }

        if ($saldoAwal >= 20000) {
            $this->saldo = $saldoAwal;
        } else {
            $this->saldo = 20000;
            echo "<i>Sistem: Saldo awal kurang dari batas minimal, diset otomatis ke Rp 20.000</i><br>";
        }
    }

    public function verifikasiPin(string $pinInput): bool {
        return $this->pin === $pinInput;
    }

    public function getNomorRekening(): string {
        return "XXXX-XXXX-" . substr($this->nomorRekening, -4);
    }

    public function getSaldo(): int {
        return $this->saldo;
    }

    public function setorUang(int $jumlah): void {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "Setor tunai Rp " . number_format($jumlah) . " berhasil.<br>";
        } else {
            echo "Jumlah setoran harus lebih dari 0!<br>";
        }
    }

    public function tarikUang(int $jumlah, string $pinInput): void {
        if (!$this->verifikasiPin($pinInput)) {
            echo "Penarikan gagal: PIN salah!<br>";
            return;
        }

        if ($jumlah <= 0) {
            echo "Jumlah penarikan tidak valid!<br>";
        } elseif (($this->saldo - $jumlah) < 20000) {
            echo "Penarikan gagal! Saldo mengendap minimal Rp 20.000.<br>";
        } else {
            $this->saldo -= $jumlah;
            echo "Tarik tunai Rp " . number_format($jumlah) . " berhasil.<br>";
        }
    }
}


$tabungan = new TabunganSiswa("1234567890", "Ahmad Fauzi", 100000, "1234");
echo "No Rekening: " . $tabungan->getNomorRekening() . "<br>";
echo "Saldo Awal: Rp " . number_format($tabungan->getSaldo()) . "<br><hr>";

$tabungan->tarikUang(30000, "9999");

$tabungan->tarikUang(30000, "1234");

echo "<b>Saldo Akhir: Rp " . number_format($tabungan->getSaldo()) . "</b>";
?>