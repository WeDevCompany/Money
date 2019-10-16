<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Infraestructure\Exceptions\FileNotFoundException;

class FileHelper
{
    public function buildPath(...$folders): string
    {
        return join(DIRECTORY_SEPARATOR, $folders);
    }

    public function validateFile(string $file): bool
    {
        if (!is_readable($file) || !is_file($file)) {
            throw new FileNotFoundException('The file to load the currency does not exists');
        }

        if (empty(file_get_contents($file))) {
            throw new \InvalidArgumentException('The file to load the currency does not exists is empty');
        }

        return true;
    }

    public function requireToVar($file)
    {
        ob_start();
        require_once $file;

        return ob_get_clean();
    }

    private function validateCurrencyFile(string $file): bool
    {
        $data = $this->requireToVar($file);
        if (empty($data)) {
            return false;
        }

        return true;
    }
}
