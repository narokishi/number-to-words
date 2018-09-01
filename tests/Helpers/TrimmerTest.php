<?php
declare(strict_types=1);

namespace Narokishi\Tests\Helpers;

use Narokishi\NumberToWords\Helpers\Trimmer;
use Narokishi\Tests\TestCase;

/**
 * Class TrimmerTest
 * @package Narokishi\Tests\Helpers
 */
class TrimmerTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            ['10337', ['103', '37']],
            ['4752300', ['47', '523', '00']],
            ['7252123123325', ['72', '521', '231', '233', '25']],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            ['10337', ['103', '37', '00']],
            ['4752300', ['47', '523']],
            ['7252123123325', ['72521231233', '25']],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param string $number
     * @param array $validResult
     */
    public function testTrimFromValidData(string $number, array $validResult): void
    {
        $this->assertSame(
            $validResult,
            Trimmer::trim($number)
        );
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @param string $number
     * @param array $validResult
     */
    public function testTrimFromInvalidData(string $number, array $validResult): void
    {
        $this->assertNotSame(
            $validResult,
            Trimmer::trim($number)
        );
    }
}
