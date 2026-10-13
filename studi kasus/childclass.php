<?php
require "parentclass.php";
// ===================================================
// CHILD CLASS 1: Panel Informasi Siswa
// ===================================================
class PanelSiswa extends WebComponent {
    private string $nama;
    private string $nisn;
    private string $jurusan;

    public function __construct(string $nama, string $nisn, string $jurusan) {
        parent::__construct("Profil Siswa RPL", "card mb-3 border-success");
        $this->nama = $nama;
        $this->nisn = $nisn;
        $this->jurusan = $jurusan;
    }

    // Overriding method renderContent khusus untuk data siswa
    public function renderContent(): void {
        echo "<p class='card-text'>";
        echo "<strong>Nama:</strong> {$this->nama}<br>";
        echo "<strong>NISN:</strong> {$this->nisn}<br>";
        echo "<strong>Konsentrasi:</strong> <span class='badge bg-success'>{$this->jurusan}</span>";
        echo "</p>";
    }
}
// ===================================================
// CHILD CLASS 2: Panel Informasi Pengumuman
// ===================================================
class PanelPengumuman extends WebComponent {
    private string $isiPengumuman;
    private string $tanggal;

    public function __construct(string $isi, string $tgl) {
        parent::__construct("Pengumuman Sekolah", "card mb-3 border-warning");
        $this->isiPengumuman = $isi;
        $this->tanggal = $tgl;
    }

    // Overriding method renderContent khusus untuk pengumuman
    public function renderContent(): void {
        echo "<div class='alert alert-warning mb-0'>";
        echo "<small class='text-muted'>Dipublikasikan: {$this->tanggal}</small><hr>";
        echo "<p>{$this->isiPengumuman}</p>";
        echo "</div>";
    }
}

