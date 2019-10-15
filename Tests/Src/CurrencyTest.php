<?php

declare(strict_types=1);

namespace WeDev\Price\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Domain\Currency;
use WeDev\Price\Domain\Exceptions\CurrencyCodeISO4217InvalidArgument;
use WeDev\Price\Infraestructure\CurrencyFileLoader;
use WeDev\Price\Tests\Src\FakeValuesCurrencyISOTest;

class CurrencyTest extends TestCase
{
    private $currency;

    public function setUp()
    {
        $this->currency = (new CurrencyFileLoader(null))->getCurrency();
    }

    public function tearDown()
    {
        $this->currency = null;
    }

    /**
     * @test
     */
    public function it_should_fail_for_bad_iso_code()
    {
        $this->expectException(CurrencyCodeISO4217InvalidArgument::class);
        foreach (FakeValuesCurrencyISOTest::FAKE_CURRENCY as $value) {
            $throw_exception = Currency::fromIsoCode($value);
        }
    }

    /**
     * @test
     */
    public function it_should_work_with_real_infraestructure()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        $currency = (new CurrencyFileLoader(null))->getCurrency();
        foreach ($currency->toArray() as $value) {
            $real_currency = Currency::fromIsoCode($value);
            $this->assertEquals($real_currency->getCode() === $value);
        }
    }
}
