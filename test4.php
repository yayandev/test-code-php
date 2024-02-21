<?php
function nilai_terbesar_kedua($arr)
{
    // Mengurutkan array secara descending
    rsort($arr);

    // Mengambil nilai terbesar kedua
    return $arr[1];
}

// Contoh penggunaan
$arr = [];
for ($i = 0; $i < 5; $i++) {
    // Mengisi array dengan 5 integer acak antara 1 dan 100
    $arr[] = rand(1, 100);
}
echo "Array: ";
print_r($arr);

// Memanggil fungsi untuk mendapatkan nilai terbesar kedua
$nilai = nilai_terbesar_kedua($arr);
echo "Nilai terbesar kedua: " . $nilai;
