<?php

use function PHPUnit\Framework\assertEquals;

 /**
  * Testing VAT.
  */
class VatTest extends \PHPUnit\Framework\TestCase
{
    public function testVat() {
        require __DIR__.'/../vat/lt_vat.php';

        $num = 5;

        $result = lt_vat($num);

        assertEquals(6.05, $result);
        
    }
}