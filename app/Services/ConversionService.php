<?php 

declare(strict_types=1);

namespace App\Services;

class ConversionService
{
    /**
     * Convert the integer to roman numeral.
     */
    public function integerToRomanNumeral(int $integer): string
    {
        $romanNumerals = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        ];
    
        $romanNumeral = '';
    
        foreach ($romanNumerals as $value => $symbol) {
            while ($integer >= $value) {
                $romanNumeral .= $symbol;
                $integer -= $value;
            }
        }
        return $romanNumeral;
    }
}