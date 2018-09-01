<?php
declare(strict_types=1);

namespace Narokishi\NumberToWords;

/**
 * Class NumberTransformer
 * @package NumberToWords
 */
class NumberTransformer
{
    /**
     * @return $this
     */
    public static function make(): self
    {
        return new self;
    }

    /**
     * @param string $language
     * @return AbstractTransformer
     */
    public function setLanguage(string $language): AbstractTransformer
    {
        if (!array_key_exists($language, LanguageConst::LANGUAGES)) {
            throw new \LogicException(
                sprintf(
                    'Language (%s) is not implemented.',
                    $language
                )
            );
        }

        $class = LanguageConst::LANGUAGES[$language];

        return new $class;
    }
}
