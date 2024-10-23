<?php

namespace App\Helpers;

class EmailHelper
{
    public static function extractPlainText($rawContent)
    {
        // Remove HTML tags
        $plainText = strip_tags($rawContent);

        // Remove non-printable characters
        $plainText = preg_replace('/[^\P{C}]+/u', '', $plainText);

        // Normalize line breaks
        $plainText = preg_replace('/\r\n|\r|\n/', "\n", $plainText);

        return trim($plainText);
    }
}
