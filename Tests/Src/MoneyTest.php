<?php

namespace WeDev\Price\Tests\Src;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Domain\Currency;
use WeDev\Price\Domain\Number;
use WeDev\Price\Domain\Money;
use WeDev\Price\Domain\Constants;


class MoneyTest extends TestCase
{
    private const A_POSITIVE_DECIMAL_NUMBER = 1.5;
    private const A_USD_ISO_CODE = 'USD';

    /**
     * @test
     */
    public function shouldBeCreateWithDefaultCurrency()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $money_a = Money::fromMoney($number_a);
        $this->assertTrue($money_a->getCurrency()->getCode() === Constants::DEFAULT_CURRENCY);
    }

    /**
     * @test
     */
    public function shouldNotBeEqualIfMoneyIsIncreased()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->increaseAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $this->assertFalse($money_b->equals($money_a));
    }

    /**
     * @test
     */
    public function shouldBeEqualIfIncreaseBothMoney()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->increaseAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $number_b = $number_a->add(self::A_POSITIVE_DECIMAL_NUMBER);
        $money_c = new Money($number_b, $currency_a);
        $this->assertTrue($money_b->equals($money_c));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualIfMoneyIsDecrease()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->decreaseAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $this->assertFalse($money_b->equals($money_a));
    }

    /**
     * @test
     */
    public function shouldBeEqualIfDecreaseBothMoney()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->decreaseAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $number_b = $number_a->substract(self::A_POSITIVE_DECIMAL_NUMBER);
        $money_c = new Money($number_b, $currency_a);
        $this->assertTrue($money_b->equals($money_c));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualIfMoneyIsMultiply()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->multiplyAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $this->assertFalse($money_b->equals($money_a));
    }

    /**
     * @test
     */
    public function shouldBeEqualIfMultiplyBothMoney()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->multiplyAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $number_b = $number_a->multiply(self::A_POSITIVE_DECIMAL_NUMBER);
        $money_c = new Money($number_b, $currency_a);
        $this->assertTrue($money_b->equals($money_c));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualIfMoneyIsDivide()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->divideAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $this->assertFalse($money_b->equals($money_a));
    }

    /**
     * @test
     */
    public function shouldBeEqualIfDivideBothMoney()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = $money_a->divideAmountBy(self::A_POSITIVE_DECIMAL_NUMBER);
        $number_b = $number_a->divide(self::A_POSITIVE_DECIMAL_NUMBER);
        $money_c = new Money($number_b, $currency_a);
        $this->assertTrue($money_b->equals($money_c));
    }

    /**
     * @test
     */
    public function shouldBeEqualBothMoney()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = new Money($number_a, $currency_a);
        $this->assertTrue($money_b->equals($money_a));
    }

    /**
     * @test
     */
    public function shouldNotBeTheSameMoney()
    {
        $number_a = Number::fromNumber(self::A_POSITIVE_DECIMAL_NUMBER);
        $currency_a = Currency::fromIsoCode(self::A_USD_ISO_CODE);
        $money_a = new Money($number_a, $currency_a);
        $money_b = new Money($number_a, $currency_a);
        $this->assertFalse($money_b === $money_a);
    }
}
