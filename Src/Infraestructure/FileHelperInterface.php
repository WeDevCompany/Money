<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Infraestructure\Exceptions\FileNotFoundException;

interface FileHelperInterface
{
    /**
     * return ..
     *
     * @return string
     */
    public function parentFolder(): string;

    /**
     * returns a string with the arguments that you pass them
     * ex. buildPath('home','user', Documents) = home/user/Documents.
     *
     * @param mixed ...$folders
     *
     * @return string
     */
    public function buildPath(...$folders): string;

    /**
     * Function that takes file and throws exception if it doesn't exist
     * or is a valid folder.
     *
     * @param string $file
     *
     * @throws FileNotFoundException
     */
    public function checkFileExists(string $file);
}
