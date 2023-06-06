<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\ConversionService;
use PHPUnit\Framework\TestCase;

class ConversionServiceTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testIntegerToRomanNumeral(): void
    {
        $integer = 1;
        $romanNumeral = $this->getSut()->integerToRomanNumeral($integer);
        $this->assertSame('I', $romanNumeral);
    }

    private function getSut(): ConversionService
    {
        return new ConversionService();
    }
}