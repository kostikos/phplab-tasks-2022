<?php

namespace strings;

class Strings implements StringsInterface
{

    public function snakeCaseToCamelCase(string $input): string
    {
        return lcfirst(str_replace("_", "", ucwords($input, "_")));
    }

    public function mirrorMultibyteString(string $input): string
    {
        $input = explode(" ", $input);
        foreach ($input as &$value) {
            $value = $this->mb_strrev($value);
        }
        return implode(" ", $input);
    }

    public function mb_strrev(string $str): string
    {
        $result = '';
        for ($i = mb_strlen($str); $i >= 0; $i--) {
            $result .= mb_substr($str, $i, 1);
        }
        return $result;
    }

    /*
     * * dolphin -> The Dolphin
     * alaska -> Alaskalaska
     * europe -> Europeurope
     * */
    public function getBrandName(string $noun): string
    {
        if ($noun[0] != mb_substr($noun, -1, 1)) {
            return "The " . ucfirst($noun);
        } else {
            return ucfirst($noun).substr($noun,1);
        }

    }
}