<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use Ds\Map;

class CurrencyFileLoader implements CurrencyFileLoaderInterface
{
    private $data_file;

    private const DATA_FILE = 'CurrencyData.php';

    private $file_helper;

    /**
     * CurrencyFileLoader constructor.
     *
     * @param FileHelper|null $file_helper
     */
    public function __construct(?FileHelper $file_helper)
    {
        $this->file_helper = ($file_helper) ? $file_helper : new FileHelper();
        $this->data_file = $this->file_helper->buildPath(__DIR__, '..', '..', 'Data', self::DATA_FILE);
    }

    public function getCurrency(): Map
    {
        $this->file_helper->checkFileExists($this->data_file);

        return new \Ds\Map(include_once($this->data_file));
    }
}
