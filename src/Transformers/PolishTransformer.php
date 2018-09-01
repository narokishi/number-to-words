<?php
declare(strict_types=1);

namespace Narokishi\NumberToWords\Transformers;

use Narokishi\NumberToWords\AbstractDictionary;
use Narokishi\NumberToWords\AbstractTransformer;
use Narokishi\NumberToWords\Dictionaries\PolishDictionary;
use Narokishi\NumberToWords\Helpers\Trimmer;

/**
 * Class PolishTransformer
 * @package NumberToWords\Transformers
 */
class PolishTransformer extends AbstractTransformer
{
    /**
     * @return AbstractDictionary
     */
    protected function getDictionary(): AbstractDictionary
    {
        return new PolishDictionary();
    }

    /**
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public function toWords(float $amount, string $currency): string
    {
        // Trim number to exponential notation.
        $amount *= 100;
        $amount = Trimmer::trim("$amount");

        $words = [];

        foreach ($amount as $key => $number) {
            // Get number word.
            $words[] = $this->transformToWords($amount[$key]);

            // Get the last key of array.
            $power = sizeof($amount) - ($key + 1);

            // Get exponent word.
            $words[] = $this->dictionary->getExponent($power, intval($number));

            // Get currency word.
            if ($power <= 1) {
                $words[] = $this->dictionary->getCurrency(intval($number), $currency, $power == 0);
            }
        }

        return implode($this->dictionary->getSeparator(), array_filter($words));
    }

    /**
     * @param string $number
     * @return string
     */
    protected function transformToWords(string $number): string
    {
        if (empty($number)) {
            return $this->dictionary->getZero();
        }

        $units = intval($number % 10);
        $tens = intval(($number / 10) % 10);
        $hundreds = intval(($number / 100) % 10);
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->getHundred($hundreds);
        }

        if ($tens == 1) {
            $words[] = $this->dictionary->getTeen($units);
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->getTen($tens);
        }

        if ($units > 0 && $tens != 1) {
            $words[] = $this->dictionary->getUnit($units);
        }

        return implode($this->dictionary->getSeparator(), $words);
    }
}
