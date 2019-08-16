<?php

declare(strict_types=1);

namespace WeDev\Price\Tests\Infraestructure;

use PHPUnit\Framework\TestCase;
use WeDev\Price\Infraestructure\Exceptions\FileNotFoundException;
use WeDev\Price\Infraestructure\FileHelper;

class FileHelperTest extends TestCase
{
    private const TESTING_FOLDER_EXPECTED = '../../test';
    private const PARENT_FOLDER_EXPECTED = '..' . DIRECTORY_SEPARATOR;
    private $file_helper;

    public function setUp()
    {
        $this->file_helper = new FileHelper();
    }

    public function tearDown()
    {
        $this->file_helper = null;
    }

    /**
     * @test
     */
    public function it_returns_dynamic_parent_folder()
    {
        $this->assertTrue(self::PARENT_FOLDER_EXPECTED === $this->file_helper->parentFolder());
    }

    /**
     * @test
     */
    public function it_creates_path_to_folder()
    {
        $this->assertTrue(
            self::TESTING_FOLDER_EXPECTED === $this->file_helper->buildPath('..', '..', 'test')
        );
    }

    /**
     * @test
     */
    public function it_checks_current_file()
    {
        $this->assertTrue(
            $this->file_helper->validateFile(__FILE__)
        );
    }

    /**
     * @test
     */
    public function it_checks_current_folder_and_throws_exception()
    {
        $this->expectException(FileNotFoundException::class);
        $this->assertTrue(
            $this->file_helper->validateFile(__DIR__)
        );
    }
}
