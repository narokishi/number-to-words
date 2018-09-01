<?php
declare(strict_types=1);

namespace Narokishi\NumberToWords\Dictionaries;

use Narokishi\NumberToWords\AbstractDictionary;

/**
 * Class PolishDictionary
 * @package NumberToWords\Dictionaries
 */
class PolishDictionary extends AbstractDictionary
{
    /**
     * @var array
     */
    protected static $units = [
        '',
        'jeden',
        'dwa',
        'trzy',
        'cztery',
        'pięć',
        'sześć',
        'siedem',
        'osiem',
        'dziewięć',
    ];

    /**
     * @var array
     */
    protected static $teens = [
        'dziesięć',
        'jedenaście',
        'dwanaście',
        'trzynaście',
        'czternaście',
        'piętnaście',
        'szesnaście',
        'siedemnaście',
        'osiemnaście',
        'dziewiętnaście',
    ];

    /**
     * @var array
     */
    protected static $tens = [
        '',
        'dziesięć',
        'dwadzieścia',
        'trzydzieści',
        'czterdzieści',
        'pięćdziesiąt',
        'sześćdziesiąt',
        'siedemdziesiąt',
        'osiemdziesiąt',
        'dziewięćdziesiąt',
    ];

    /**
     *
     * @var array
     */
    protected static $hundreds = [
        '',
        'sto',
        'dwieście',
        'trzysta',
        'czterysta',
        'pięćset',
        'sześćset',
        'siedemset',
        'osiemset',
        'dziewięćset',
    ];

    /**
     * @var array
     */
    protected static $exponents = [
        ['', '', ''],
        ['', '', ''],
        ['tysiąc', 'tysiące', 'tysięcy'],
        ['milion', 'miliony', 'milionów'],
        ['miliard', 'miliardy', 'miliardów'],
        ['bilion', 'biliony', 'bilionów'],
        ['biliard', 'biliardy', 'biliardów'],
        ['trylion', 'tryliony', 'trylionów'],
        ['tryliard', 'tryliardy', 'tryliardów'],
        ['kwadrylion', 'kwadryliony', 'kwadrylionów'],
        ['kwadryliard', 'kwadryliardy', 'kwadryliardów'],
        ['kwintylion', 'kwintyliony', 'kwintylionów'],
        ['kwintyliiard', 'kwintyliardy', 'kwintyliardów'],
        ['sekstylion', 'sekstyliony', 'sekstylionów'],
        ['sekstyliard', 'sekstyliardy', 'sekstyliardów'],
        ['septylion', 'septyliony', 'septylionów'],
        ['septyliard', 'septyliardy', 'septyliardów'],
        ['oktylion', 'oktyliony', 'oktylionów'],
        ['oktyliard', 'oktyliardy', 'oktyliardów'],
        ['nonylion', 'nonyliony', 'nonylionów'],
        ['nonyliard', 'nonyliardy', 'nonyliardów'],
        ['decylion', 'decyliony', 'decylionów'],
        ['decyliard', 'decyliardy', 'decyliardów'],
    ];

    /**
     * @var array
     */
    protected static $currencies = [
        'PLN' => [
            ['złoty', 'złote', 'złotych'],
            ['grosz', 'grosze', 'groszy'],
        ],
    ];

    /**
     * Except expression "1 złoty" the following rule applies:
     * For numbers between 5 and 14 or when last digit is: 1, 5, 6, 7, 8, 9, 0 - "złotych" (eg 13, 95 złotych).
     * Else if last digit is: 2, 3, 4 - "złote" (eg 33, 102 złote).
     * @source http://docs.translatehouse.org/projects/localization-guide/en/latest/l10n/pluralforms.html
     *
     * @param int $number
     * @return int
     */
    public function getVariety(int $number): int
    {
        return $number == 1 ? 0 : (
            $number % 10 >= 2
            && $number % 10 <= 4
            && ($number % 100 < 10 || $number % 100 >= 20) ? 1 : 2
        );
    }

    /**
     * @return string
     */
    public function getZero(): string
    {
        return 'zero';
    }
}
