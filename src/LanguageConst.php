<?php

namespace Narokishi\NumberToWords;

/**
 * Class LanguageConst
 * @package Narokishi\NumberToWords
 */
abstract class LanguageConst
{
    protected const POLISH_LANGUAGE = 'PL';

    public const LANGUAGES = [
        self::POLISH_LANGUAGE => Transformers\PolishTransformer::class,
    ];
}
