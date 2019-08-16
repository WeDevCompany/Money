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
            throw new FileNotFoundException('the file to load the currency does not exists');
        }

        return true;
    }
}
