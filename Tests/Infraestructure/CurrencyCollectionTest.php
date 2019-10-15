<?php

namespace WeDev\Price\Tests\Infraestructure;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Domain\Currency;
use WeDev\Price\Infraestructure\CurrencyCollection;
use WeDev\Price\Tests\Src\RealValuesCurrencyISOTest;

class CurrencyCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_currency_list_from_and_iso_code_list()
    {
        $currency_list = [];
        foreach (RealValuesCurrencyISOTest::REAL_CURRENCY as $iso_code) {
            array_push($currency_list, Currency::fromIsoCode($iso_code));
        }

        $list = CurrencyCollection::fromArray($currency_list);
        foreach ($list as $item) {
            $this->assertInstanceOf(Currency::class, $item);
        }
    }
}
