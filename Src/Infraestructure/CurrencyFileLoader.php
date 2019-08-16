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
     * @param string $data_file
     */
    public function __construct(?string $data_file = null)
    {
        $this->file_helper = new FileHelper();
        $this->setDataFile($data_file);
    }

    public function getCurrency(): Map
    {
        $this->file_helper->validateFile($this->data_file);

        return new \Ds\Map(require($this->data_file));
    }

    private function setDataFile(?string $data_file): void
    {
        if (empty($data_file)) {
            $data_file = $this->file_helper->buildPath(__DIR__, '..', '..', 'Data', self::DATA_FILE);
        }
        //dump($data_file);
        $this->data_file = $data_file;
    }
}
