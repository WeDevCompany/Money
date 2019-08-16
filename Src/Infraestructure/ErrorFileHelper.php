<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Infraestructure\Exceptions\FileNotFoundException;

class ErrorFileHelper implements FileHelperInterface
{
    public function parentFolder(): string
    {
        return '';
    }

    public function buildPath(...$folders): string
    {
        return '';
    }

    public function validateFile(string $file): bool
    {
        throw new FileNotFoundException();
    }
}
