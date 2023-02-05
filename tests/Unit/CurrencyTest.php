<?php

namespace Tests\Unit;

use App\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_convert_usd_to_eur_successful()
    {
      $result = (new CurrencyService())->convert('100', 'usd','eur');
      $this->assertEquals(124, $result);
    }
}
