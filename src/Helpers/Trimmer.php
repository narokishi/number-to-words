<?php
declare(strict_types=1);

namespace Narokishi\NumberToWords\Helpers;

/**
 * Class Trimmer
 * @package NumberToWords\Helpers
 */
class Trimmer
{
    /**
     * @param string $number
     * @return array
     */
    public static function trim(string $number): array
    {
        $threefold = [self::substr($number, -2)];
        $number = self::substr($number, 0, -2);

        // Chunk reversed string into chunks with maximum 3 digits.
        $threefold = array_merge($threefold, array_map('strrev', str_split(strrev($number), 3)));

        // Return words in left to right direction.
        return array_reverse($threefold);
    }

    /**
     * @param string $string
     * @param int $start
     * @param int|null $length
     * @return string
     */
    protected static function substr(string $string, int $start, int $length = null): string
    {
        return mb_substr($string, $start, $length, 'UTF-8');
    }
}
