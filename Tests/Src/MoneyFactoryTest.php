<?php

declare(strict_types=1);

namespace WeDev\Price\Tests\Src;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Domain\MoneyFactory;
use WeDev\Price\Domain\Money;
use WeDev\Price\Domain\Number;
use WeDev\Price\Domain\Currency;

class MoneyFactoryTest extends TestCase
{
    private const A_WELL_FORMATTED_NUMERIC_INTEGER = 3847;
    private const A_USD_ISO_CODE = 'USD';

    /**
     * @test
     */
    public function should_create_money_from_money_factory()
    {
        $moneyFactory = MoneyFactory::USD(self::A_WELL_FORMATTED_NUMERIC_INTEGER);
        $this->assertTrue($moneyFactory->number->equals(Number::fromNumber(self::A_WELL_FORMATTED_NUMERIC_INTEGER)));
    }

    /**
     * @test
     */
    public function should_create_money_from_money_factory_2()
    {
        $moneyFactory = MoneyFactory::USD(self::A_WELL_FORMATTED_NUMERIC_INTEGER);
        $this->assertTrue($moneyFactory->currency->equals(Currency::fromIsoCode(self::A_USD_ISO_CODE)));
    }

    /**
     * @test
     */
    public function should_be_equals()
    {
        $moneyFactory = MoneyFactory::USD(self::A_WELL_FORMATTED_NUMERIC_INTEGER);
        $money = new Money(Number::fromNumber(self::A_WELL_FORMATTED_NUMERIC_INTEGER), Currency::fromIsoCode(self::A_USD_ISO_CODE));
        $this->assertTrue($money->equals($moneyFactory));
    }
}
