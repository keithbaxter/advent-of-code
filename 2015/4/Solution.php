<?php

class Solution
{
    public function run()
    {
        $input = "ckczppom";
        $ans = self::determineHash($input);
        print_r($ans);
    }

    public static function determineHash($input)
    {
        $i = 1;
        while (true) {
            $hash = md5($input . $i);
            if (strpos($hash, '000000') === 0) {
                // print_r($hash);
                break;
            }
            $i++;
        }
        return $i;
    }
}
(new Solution())->run();
