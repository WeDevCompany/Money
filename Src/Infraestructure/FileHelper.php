<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Infraestructure\Exceptions\FileNotFoundException;

class FileHelper implements FileHelperInterface
{
    public function parentFolder(): string
    {
        return '..' . DIRECTORY_SEPARATOR;
    }

    public function buildPath(...$folders): string
    {
        return join(DIRECTORY_SEPARATOR, $folders);
    }

    public function checkFileExists(string $file)
    {
        if (!is_readable($file) && !is_file($file)) {
            dd($file);
            throw new FileNotFoundException('the file to load the currency does not exists');
        }
    }
}
