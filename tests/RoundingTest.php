<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use \hanakivan\SlovakPriceRounding\Rounding;

final class RoundingTest extends TestCase
{
    public function test_rounding(): void
    {
        $numbers = [
            [13.11, 13.10,],
            [13.12, 13.10],

            [13.13, 13.15,],
            [13.14, 13.15],

            [13.16, 13.15,],
            [13.17, 13.15],

            [13.18, 13.20,],
            [13.19, 13.20],
        ];

        foreach($numbers as $value) {
            $this->assertEquals(
                $value[1],
                Rounding::roundNumberBySlovakRule($value[0])
            );
        }
    }

    public function test_no_round()
    {
        $actual = 13.15;
        $expected = $actual;

        $this->assertEquals(
            $expected,
            Rounding::roundNumberBySlovakRule($actual)
        );
    }

    public function test_various()
    {
        $numbers = [
            [14.99, 15.00],
            [14.01, 14.00],
            [14.01999991, 14.00],
        ];

        foreach($numbers as $value) {
            $this->assertEquals(
                $value[1],
                Rounding::roundNumberBySlovakRule($value[0])
            );
        }
    }
}



