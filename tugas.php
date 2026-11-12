<?php
class Kendaraan {
    private $nomor;
    private $merk;
    private $jenis;
    private $tersedia = true;

    public function __construct($nomor, $merk, $jenis) {
        $this->nomor = $nomor;
        $this->merk = $merk;
        $this->jenis = $jenis;
    }

    public function tampilkanData() {
        echo "Nomor: " . $this->nomor . "<br>";
        echo "Merk: " . $this->merk . "<br>";
        echo "Jenis: " . $this->jenis . "<br>";
    }

    public function statusKendaraan() {
        return $this->tersedia ? "Tersedia" : "Sedang disewa";
    }

    public function isTersedia() {
        return $this->tersedia;
    }

    public function setTersedia($status) {
        $this->tersedia = $status;
    }

    public function getMerk() {
        return $this->merk;
    }
}

class Pelanggan {
    private $id;
    private $nama;
    private $alamat;

    public function __construct($id, $nama, $alamat) {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
    }

    public function tampilkanData() {
        echo "ID: " . $this->id . "<br>";
        echo "Nama: " . $this->nama . "<br>";
        echo "Alamat: " . $this->alamat . "<br>";
    }

    public function sewaKendaraan($kendaraan) {
        if ($kendaraan->isTersedia()) {
            $kendaraan->setTersedia(false);
            echo $this->nama . " berhasil menyewa " . $kendaraan->getMerk() . ".<br>";
        } else {
            echo "Maaf, " . $kendaraan->getMerk() . " sedang disewa.<br>";
        }
    }
}

// Object Kendaraan
$kendaraan1 = new Kendaraan("L 1234 AB", "Toyota Avanza", "Mobil");
$kendaraan2 = new Kendaraan("W 5678 CD", "Honda Vario", "Motor");

// Object Pelanggan
$pelanggan1 = new Pelanggan("P001", "Budi", "Surabaya");
$pelanggan2 = new Pelanggan("P002", "Siti", "Sidoarjo");

echo "<h3>Data Kendaraan</h3>";
$kendaraan1->tampilkanData();
echo "Status: " . $kendaraan1->statusKendaraan() . "<br><br>";
$kendaraan2->tampilkanData();
echo "Status: " . $kendaraan2->statusKendaraan() . "<br>";

echo "<h3>Data Pelanggan</h3>";
$pelanggan1->tampilkanData();
echo "<br>";
$pelanggan2->tampilkanData();

echo "<h3>Proses Sewa</h3>";
$pelanggan1->sewaKendaraan($kendaraan1);
$pelanggan2->sewaKendaraan($kendaraan1); // gagal, sudah disewa
$pelanggan2->sewaKendaraan($kendaraan2);

echo "<h3>Status Terbaru</h3>";
echo "Avanza: " . $kendaraan1->statusKendaraan() . "<br>";
echo "Vario: " . $kendaraan2->statusKendaraan();
?>