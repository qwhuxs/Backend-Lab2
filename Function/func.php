<?php
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

function power($x, $y) {
    return pow($x, $y);
}

function my_tg($x) {
    return sin($x) / cos($x);
}
?>

