<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\RomanNumeralConverter;
use PHPUnit\Framework\TestCase;

class RomanNumeralConverterTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testIntegerToRomanNumeral(): void
    {
        $toTest = [
            'I' => 1,
            'IV' => 4,
            'V' => 5,
            'IX' => 9,
            'X' => 10,
            'C' => 100,
            'XL' => 40,
            'L' => 50,
            'XC' => 90,
            'CD' => 400,
            'D' => 500,
            'CM' => 900,
            'M' => 1000,
        ];

        foreach ($toTest as $returnValue => $integer) {
            $this->assertEquals($returnValue, $this->getSut()->convertInteger($integer));
        }

        // Test more unique integers
        $this->assertEquals('MMMCMXCIX', $this->getSut()->convertInteger(3999));
        $this->assertEquals('MMXVI', $this->getSut()->convertInteger(2016));
        $this->assertEquals('MMXVIII', $this->getSut()->convertInteger(2018));
    }

    private function getSut(): RomanNumeralConverter
    {
        return new RomanNumeralConverter();
    }
}