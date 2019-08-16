<?php

declare(strict_types=1);

namespace WeDev\Price\Tests\Infraestructure;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Infraestructure\CurrencyFileLoader;
use Ds\Map;
use WeDev\Price\Infraestructure\Exceptions\FileNotFoundException;

class CurrencyFileLoaderTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::createFile();
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        self::deleteFile();
    }

    private const FAKE_FILE = 'fake_file.txt';

    /**
     * @test
     */
    public function it_fails_for_folder_on_file_argument()
    {
        $this->expectException(FileNotFoundException::class);

        $a = new CurrencyFileLoader(__DIR__);
        $a->getCurrency();
    }

    /**
     * @test
     */
    public function it_fails_for_invalid_file()
    {
        $this->expectException(\InvalidArgumentException::class);
        $a = new CurrencyFileLoader(self::FAKE_FILE);
        $a->getCurrency();
    }

    /**
     * @test
     */
    public function it_should_load_data()
    {
        $a = new CurrencyFileLoader();
        $this->assertInstanceOf(Map::class, $a->getCurrency());
    }

    /**
     * @test
     */
    public function it_should_load_data_with_null_file()
    {
        $a = new CurrencyFileLoader();
        $this->assertInstanceOf(Map::class, $a->getCurrency());
    }

    private static function createFile(): void
    {
        if (!file_exists(self::FAKE_FILE)) {
            file_put_contents(self::FAKE_FILE, time());
        }
    }

    private static function deleteFile(): void
    {
        if (file_exists(self::FAKE_FILE)) {
            unlink(self::FAKE_FILE);
        }
    }
}
