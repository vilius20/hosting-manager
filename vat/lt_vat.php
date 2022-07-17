<?php

function lt_vat($num) {
    $x = 21 / 100;
    $a = round($x * $num, 2);
    $n = $num + $a;
    return $n;
}