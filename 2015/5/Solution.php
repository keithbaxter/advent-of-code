<?php

use Solution as GlobalSolution;

class Solution
{
    public function run()
    {
        $inputs = file('input.txt');
        $sum = 0;
        $txt = '';
        foreach ($inputs as $input) {
            if (self::checkForNiceString($input)) {
                $sum++;
            }
        }
        print_r($sum);
    }

    public static function checkForNiceString($input)
    {
        if (self::hasRepeatingPair($input) && self::hasRepeatingCharWithGap($input)) {
            return true;
        }
        return false;
    }

    public static function hasAtLeastThreeVowels($input)
    {
        $vowel_count = 0;
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $chars = str_split($input);
        foreach ($chars as $char) {
            if (in_array($char, $vowels)) {
                $vowel_count++;
                if ($vowel_count == 3) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function hasLetterTwiceInARow($input)
    {
        $chars = str_split($input);
        $seed = '';
        foreach ($chars as $char) {
            if ($char == $seed) {
                return true;
            }
            $seed = $char;
        }
        return false;
    }

    public static function doesNotHaveSpecificStrings($input)
    {
        $specific_strings = ['ab', 'cd', 'pq', 'xy'];
        foreach ($specific_strings as $str) {
            if (!(strpos($input, $str) === false)) {
                return false;
            }
        }
        return true;
    }

    public static function hasRepeatingPair($input)
    {
        $chars = str_split($input);
        for ($i = 0; $i < count($chars); $i++) {
            if ($i >= (count($chars)-3)) {
                return false;
            }
            $chars_copy = $chars;
            $couplet = $chars[$i] . $chars[$i+1];
            $chars_copy[$i] = "0";
            $chars_copy[$i+1] = "0";
            $chars_copy = implode("", $chars_copy);
            if (!(strpos($chars_copy, $couplet) === false)) {
                return true;
            }
        }
        return;
    }

    public static function hasRepeatingCharWithGap($input)
    {
        $chars = str_split($input);
        for ($i = 0; $i < count($chars); $i++) {
            if ($i >= (count($chars)-2)) {
                return false;
            }

            if ($chars[$i] == $chars[$i+2]) {
                return true;
            }
        }
    }
}
(new Solution())->run();
