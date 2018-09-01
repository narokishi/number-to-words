<?php
declare(strict_types=1);

namespace Narokishi\NumberToWords;

/**
 * Class AbstractTransformer
 * @package NumberToWords
 */
abstract class AbstractTransformer
{
    /**
     * @var AbstractDictionary
     */
    protected $dictionary;

    /**
     * @param float $amount
     * @param string $currency
     * @return string
     */
    abstract public function toWords(float $amount, string $currency): string;

    /**
     * @return AbstractDictionary
     */
    abstract protected function getDictionary(): AbstractDictionary;

    /**
     * AbstractTransformer constructor.
     */
    public function __construct()
    {
        $this->dictionary = $this->getDictionary();
    }
}
