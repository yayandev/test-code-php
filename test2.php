<?php

class Nilai
{
    public $mapel;
    public $nilai;

    public function __construct($mapel, $nilai)
    {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

class Siswa
{
    public $nrp;
    public $nama;
    public $daftarNilai;

    public function __construct($nrp, $nama)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->daftarNilai = array(null, null, null); // Inisialisasi array dengan panjang 3
    }
}

// Fungsi untuk membuat siswa baru dengan mapel dan nilai tertentu
function buat_siswa($nrp, $nama, $mapel, $nilai)
{
    $siswa = new Siswa($nrp, $nama);
    $siswa->daftarNilai[0] = new Nilai($mapel, $nilai);
    return $siswa;
}

// Fungsi untuk generate nama acak
function generate_nama()
{
    return substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyz', ceil(10 / strlen($x)))), 1, 10);
}

// Fungsi untuk generate mapel acak
function generate_mapel()
{
    $mapel = array('inggris', 'indonesia', 'jepang');
    return $mapel[array_rand($mapel)];
}

// Fungsi untuk generate nilai acak
function generate_nilai()
{
    return rand(0, 100);
}

// Generate 1 siswa baru dengan mapel Inggris dan nilai 100
$siswa_baru = buat_siswa("12345", "John Doe", "inggris", 100);

// Generate 10 siswa dengan nama acak, mapel random, dan nilai random
$daftar_siswa = array();
for ($i = 0; $i < 10; $i++) {
    $nama = generate_nama();
    $mapel = generate_mapel();
    $nilai = generate_nilai();
    $siswa = buat_siswa(rand(10000, 99999), $nama, $mapel, $nilai);
    array_push($daftar_siswa, $siswa);
}

// // Cetak daftar siswa beserta informasi nilai mereka
// foreach ($daftar_siswa as $siswa) {
//     echo "NRP: " . $siswa->nrp . "\n";
//     echo "Nama: " . $siswa->nama . "\n";
//     foreach ($siswa->daftarNilai as $key => $nilai) {
//         if ($nilai) {
//             echo "Mapel " . ($key + 1) . ": " . $nilai->mapel . ", Nilai: " . $nilai->nilai . "\n";
//         }
//     }
//     echo "\n";
// }

$siswas = array();

foreach ($daftar_siswa as $siswa) {
    $data = [
        'nrp' => $siswa->nrp,
        'nama' => $siswa->nama,
        'daftarNilai' => array()
    ];

    foreach ($siswa->daftarNilai as $key => $nilai) {
        if ($nilai) {
            $data['daftarNilai'][] = [
                'mapel' => $nilai->mapel,
                'nilai' => $nilai->nilai
            ];
        }
    }

    $siswas[] = $data;
}

echo json_encode($siswas);
