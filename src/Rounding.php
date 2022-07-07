<?php

namespace hanakivan\SlovakPriceRounding;


class Rounding {

    private const DECIMALS_NEEDING_ROUNDING = [
        1, 2, 3, 4, 6, 7, 8, 9
    ];

    public static function roundNumberBySlovakRule(float $number): string
    {
        $rounded = number_format($number, 2, '.', '');
        $split = explode(".", $rounded);
        $numberPart = (int)$split[0];
        $decimalPart = (int)$split[1];

        $lastDecimal = (int)mb_substr((string)$decimalPart, -1);

        if(self::numberNeedsRounding($number)) {
            if(in_array($lastDecimal, [1, 2], true)) {
                $decimalPart -= $lastDecimal;
            } else if (in_array($lastDecimal, [3, 4], true)) {
                $decimalPart += 5-$lastDecimal;
            } else if (in_array($lastDecimal, [6, 7], true)) {
                $decimalPart -= $lastDecimal-5;
            } else if (in_array($lastDecimal, [8, 9], true)) {
                $newNumber = $number + ((10-$lastDecimal)/100);

                $newRounded = number_format($newNumber, 2, '.', '');
                $split = explode(".", $newRounded);
                $numberPart = (int)$split[0];
                $decimalPart = (int)$split[1];

                $decimalPart = str_pad($decimalPart, 2, 0);
            }

            return sprintf("%s.%s", $numberPart, $decimalPart);
        }

        return $rounded;
    }

    public static function numberNeedsRounding(float $number): bool
    {
        $rounded = number_format($number, 2, '.', '');

        $split = explode(".", $rounded);
        $numberPart = (int)$split[0];
        $decimalPart = (int)$split[1];

        $lastDecimal = (int)mb_substr((string)$decimalPart, -1);

        return in_array($lastDecimal, self::DECIMALS_NEEDING_ROUNDING, true);
    }
}


$price = 13.99;
if(Rounding::numberNeedsRounding($price)) {
    echo Rounding::roundNumberBySlovakRule($price);

    //displays 14.00
}