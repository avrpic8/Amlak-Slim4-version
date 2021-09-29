<?php

namespace App\Http\Services;

use UnexpectedValueException;

class FilenameFilter
{
    /**
     * Makes file name safe to use.
     *
     * @param string $file The name of the file [not full path]
     *
     * @throws UnexpectedValueException
     *
     * @return  string The sanitised string
     */
    public static function createSafeFilename(string $file): string
    {
        // Reject funky whitspace paths.
        if (preg_match('#\p{C}+#u', $file)) {
            throw new UnexpectedValueException('Corrupted path detected');
        }
        // Remove any trailing dots, as those aren't ever valid file names.
        $file = trim($file, '.');

        return trim(preg_replace(['#(\.){2,}#', '#[^A-Za-z0-9\.\_\- ]#', '#^\.#'], '', $file));
    }
}