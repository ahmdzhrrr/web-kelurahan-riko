<?php
/**
 * functions.php
 * Helper kecil yang dipakai berulang di partials.
 */

// Escape aman untuk dicetak ke HTML (mencegah XSS dari data dinamis)
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
