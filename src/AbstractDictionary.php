<?php
declare(strict_types=1);

namespace Narokishi\NumberToWords;

/**
 * Class AbstractDictionary
 * @package NumberToWords
 */
abstract class AbstractDictionary
{
    protected const DEFAULT_WORD_SEPARATOR = ' ';

    /**
     * @var array
     */
    protected static $units = [];

    /**
     * @var array
     */
    protected static $teens = [];

    /**
     * @var array
     */
    protected static $tens = [];

    /**
     * @var array
     */
    protected static $hundreds = [];

    /**
     * @var array
     */
    protected static $exponents = [];

    /**
     * @var array
     */
    protected static $currencies = [];

    /**
     * @param int $number
     * @return int
     */
    abstract public function getVariety(int $number): int;

    /**
     * Get 'zero' as a string.
     *
     * @return string
     */
    abstract public function getZero(): string;

    /**
     * @return string
     */
    public function getSeparator(): string
    {
        return static::DEFAULT_WORD_SEPARATOR;
    }

    /**
     * @param int $unit
     * @return string
     */
    public function getUnit(int $unit): string
    {
        return $this->get(static::$units, "$unit");
    }

    /**
     * @param int $teen
     * @return string
     */
    public function getTeen(int $teen): string
    {
        return $this->get(static::$teens, "$teen");
    }

    /**
     * @param int $ten
     * @return string
     */
    public function getTen(int $ten): string
    {
        return $this->get(static::$tens, "$ten");
    }

    /**
     * @param int $hundred
     * @return string
     */
    public function getHundred(int $hundred): string
    {
        return $this->get(static::$hundreds, "$hundred");
    }

    /**
     * @param int $power
     * @param int $number
     * @return string
     */
    public function getExponent(int $power, int $number): string
    {
        return $this->get(static::$exponents, "$power.{$this->getVariety($number)}");
    }

    /**
     * @param int $amount
     * @param string $currency
     * @param bool $isPenny
     * @return string
     */
    public function getCurrency(int $amount, string $currency, bool $isPenny = false): string
    {
        return $this->get(static::$currencies, "$currency.".intval($isPenny).".{$this->getVariety($amount)}");
    }

    /**
     * @param array $array
     * @param string $key
     * @return mixed
     */
    protected function get(array $array, string $key)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $array[$key] ?? '';
        }

        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return '';
            }
        }

        return $array;
    }
}
