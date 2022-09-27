<?php

class Solution
{
    public function run()
    {
        $inputs = file("inputs.txt");
        // $inputs = file("practice_inputs.txt");
        // $sum = self::calculateAreaNeeded($inputs);
        $sum = self::calculateRibbonNeeded($inputs);
        print_r($sum);
    }

    public static function calculateAreaNeeded($inputs)
    {
        $sum = 0;
        foreach ($inputs as $input) {
            $dims = array_map('intval', explode("x", $input));

            $side1 = $dims[0]*$dims[1];
            $side2 = $dims[1]*$dims[2];
            $side3 = $dims[0]*$dims[2];
            $sum += 2*($side1+$side2+$side3)+min($side1, $side2, $side3);
        }
        return $sum;
    }

    public static function calculateRibbonNeeded($inputs)
    {
        $sum = 0;
        foreach ($inputs as $input) {
            $dims = array_map('intval', explode("x", $input));
            sort($dims);

            $wrap = 2*$dims[0] + 2*$dims[1];
            $bow = $dims[0] * $dims[1] * $dims[2];
            $sum += $wrap + $bow;
        }
        return $sum;
    }
}

(new Solution())->run();
