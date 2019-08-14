<?php

namespace WeDev\Price\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Infraestructure\CurrencyFileLoader;
use WeDev\Price\Infraestructure\FileHelper;
use Ds\Map;

class CurrencyTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        // TODO: this test is a fake test change it next time
        $a = new CurrencyFileLoader(new FileHelper());
        $this->assertInstanceOf(Map::class, $a->getCurrency());
    }
}
