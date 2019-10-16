<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;

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

    public function getCurrency(): CurrencyCollection
    {
        $this->file_helper->validateFile($this->data_file);
        $currency_list = [];
        foreach (require($this->data_file) as $iso_code) {
            array_push($currency_list, Currency::fromIsoCode($iso_code['code']));
        }

        return CurrencyCollection::fromArray($currency_list);
    }

    private function setDataFile(?string $data_file): void
    {
        if (empty($data_file)) {
            $data_file = $this->file_helper->buildPath(__DIR__, '..', '..', 'Data', self::DATA_FILE);
        }
        $this->data_file = $data_file;
    }
}
