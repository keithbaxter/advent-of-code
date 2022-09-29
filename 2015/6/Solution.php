<?php

class Solution
{
    public function run()
    {
        $lights = [];
        for ($i = 0; $i < 1000; $i++) {
            $lights[] = array_fill(0, 1000, 0);
        }
        $inputs = file('input.txt');
        foreach ($inputs as $input) {
            $coords = self::extractCoordinates($input);

            if (strpos($input, 'turn on ') !== false) {
                $lights = self::turnOnLights($coords, $lights);
            }
            if (strpos($input, 'turn off ') !== false) {
                $lights = self::turnOffLights($coords, $lights);
            }
            if (strpos($input, 'toggle ') !== false) {
                $lights = self::toggleLights($coords, $lights);
            }
        }
        $sum = 0;
        foreach ($lights as $row) {
            foreach ($row as $column) {
                if ($column) {
                    $sum += $column;
                }
            }
        }
        print_r($sum);
    }

    public static function turnOnLights($coords, $lights)
    {
        $x0 = $coords[0][0];
        $x = $coords[1][0];
        $y0 = $coords[0][1];
        $y = $coords[1][1];
        for ($i = $y0; $i <= $y; $i++) {
            for ($j = $x0; $j <= $x; $j++) {
                $lights[$i][$j] += 1;
            }
        }
        return $lights;
    }

    public static function turnOffLights($coords, $lights)
    {
        $x0 = $coords[0][0];
        $x = $coords[1][0];
        $y0 = $coords[0][1];
        $y = $coords[1][1];
        for ($i = $y0; $i <= $y; $i++) {
            for ($j = $x0; $j <= $x; $j++) {
                if ($lights[$i][$j] > 0) {
                    $lights[$i][$j] -= 1;
                }
            }
        }
        return $lights;
    }

    public static function toggleLights($coords, $lights)
    {
        $x0 = $coords[0][0];
        $x = $coords[1][0];
        $y0 = $coords[0][1];
        $y = $coords[1][1];
        for ($i = $y0; $i <= $y; $i++) {
            for ($j = $x0; $j <= $x; $j++) {
                $lights[$i][$j] += 2;
                // if ($lights[$i][$j]) {
                //     $lights[$i][$j] = 0;
                // } else {
                //     $lights[$i][$j] = 1;
                // }
            }
        }
        return $lights;
    }

    public static function extractCoordinates($input)
    {
        $pattern = "(\d+,\d+)";
        preg_match_all($pattern, $input, $matches);
        $coords[] = explode(',', $matches[0][0]);
        $coords[] = explode(',', $matches[0][1]);
        return $coords;
    }
}
(new Solution())->run();
