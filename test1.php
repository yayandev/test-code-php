<?php
// Array untuk menyimpan token berdasarkan nama user
$tokens = array();

function generate_token($user)
{
    global $tokens;

    // Generate random string sebagai token
    $token = bin2hex(random_bytes(5));

    // Cek apakah user sudah ada di array tokens
    if (array_key_exists($user, $tokens)) {
        // Cek apakah jumlah token untuk user tersebut sudah mencapai 10
        if (count($tokens[$user]) >= 10) {
            // Jika sudah mencapai 10, hapus token paling awal
            array_shift($tokens[$user]);
        }
        // Tambahkan token baru ke dalam array
        $tokens[$user][] = $token;
    } else {
        // Jika user belum ada, buat array baru untuk user tersebut
        $tokens[$user] = array($token);
    }

    // Return token yang baru dibuat
    return $token;
}

function verify_token($user, $token)
{
    global $tokens;

    // Cek apakah user ada di array tokens
    if (array_key_exists($user, $tokens)) {
        // Cek apakah token ada di dalam array tokens[user]
        $key = array_search($token, $tokens[$user]);
        if ($key !== false) {
            // Jika token ditemukan, hapus token tersebut dari array
            unset($tokens[$user][$key]);
            return true;
        }
    }
    // Jika user tidak ditemukan atau token tidak ditemukan, return false
    return false;
}

// Contoh penggunaan
$user1 = "user1";
$user2 = "user2";

// Generate token untuk user1 dan user2
$token1_user1 = generate_token($user1);
$token1_user2 = generate_token($user2);

echo "Token untuk user1: " . $token1_user1 . "\n";
echo "Token untuk user2: " . $token1_user2 . "\n";

// Verify token untuk user1
echo "Verifikasi token untuk user1: " . (verify_token($user1, $token1_user1) ? "True" : "False") . "\n";

// Verify token yang sudah diverifikasi sebelumnya
echo "Verifikasi token untuk user1: " . (verify_token($user1, $token1_user1) ? "True" : "False") . "\n";

// Generate token tambahan untuk user1
$token2_user1 = generate_token($user1);
echo "Token tambahan untuk user1: " . $token2_user1 . "\n";

// Verify token baru untuk user1
echo "Verifikasi token untuk user1: " . (verify_token($user1, $token2_user1) ? "True" : "False") . "\n";
