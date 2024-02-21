<?php
function hitung_karakter_terbanyak($kata)
{
    $hitungan_karakter = array();

    // Menghitung kemunculan setiap karakter dalam kata
    for ($i = 0; $i < strlen($kata); $i++) {
        $char = $kata[$i];
        if (array_key_exists($char, $hitungan_karakter)) {
            $hitungan_karakter[$char]++;
        } else {
            $hitungan_karakter[$char] = 1;
        }
    }

    // Mencari karakter dengan kemunculan terbanyak
    $karakter_terbanyak = '';
    $kemunculan_terbanyak = 0;
    foreach ($hitungan_karakter as $char => $count) {
        if ($count > $kemunculan_terbanyak) {
            $karakter_terbanyak = $char;
            $kemunculan_terbanyak = $count;
        }
    }

    return $karakter_terbanyak . " " . $kemunculan_terbanyak . "x";
}

// Contoh penggunaan
$kata1 = "wellcome";
$kata2 = "strawberry";

echo hitung_karakter_terbanyak($kata1) . "\n";  // Output: 'e 2x'
echo hitung_karakter_terbanyak($kata2) . "\n";  // Output: 'r 2x'
