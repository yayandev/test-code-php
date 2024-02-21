<?php

function rambuLaluLintas()
{
    static $colors = ['merah', 'kuning', 'hijau'];
    static $index = 0;

    $color = $colors[$index];
    $index = ($index + 1) % count($colors);

    return $color;
}

// Contoh pemanggilan fungsi
echo rambuLaluLintas(); // Output: merah
echo rambuLaluLintas(); // Output: kuning
echo rambuLaluLintas(); // Output: hijau
echo rambuLaluLintas(); // Output: merah
echo rambuLaluLintas(); // Output: kuning
// dan seterusnya...
