<?php

 /**
  * Get specific informaton about product.
  * 
  * @param int $num Number to convert
  * 
  * @return int
  */
function lt_vat($num)
{
    $x = 21 / 100;
    $a = round($x * $num, 2);
    $n = $num + $a;
    return $n;
}