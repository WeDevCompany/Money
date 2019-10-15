<?php

declare(strict_types=1);

namespace WeDev\Price\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Domain\CurrencyCodeISO4217;
use WeDev\Price\Domain\Exceptions\CurrencyCodeISO4217InvalidArgument;
use WeDev\Price\Tests\Src\FakeValuesCurrencyISOTest;
use WeDev\Price\Tests\Src\RealValuesCurrencyISOTest;

class CurrencyCodeISO4217Test extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_currency_code_with_iso_4217()
    {
        foreach (RealValuesCurrencyISOTest::REAL_CURRENCY as $value) {
            $currency_code = CurrencyCodeISO4217::fromIsoCode($value);
            $this->assertTrue($currency_code instanceof CurrencyCodeISO4217);
        }
    }

    /**
     * @test
     */
    public function it_should_fail_to_create_iso_codes()
    {
        $this->expectException(CurrencyCodeISO4217InvalidArgument::class);
        foreach (FakeValuesCurrencyISOTest::FAKE_CURRENCY as $value) {
            $currency_code = CurrencyCodeISO4217::fromIsoCode($value);
            $this->assertTrue($currency_code instanceof CurrencyCodeISO4217);
        }
    }
}
