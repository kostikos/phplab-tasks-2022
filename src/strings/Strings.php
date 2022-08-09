<?php

namespace strings;

class Strings implements StringsInterface
{
    /**
     * Transforms snake case into camel cased (example hello_world => helloWorld)
     *
     * @param string $input simple string
     * @return string modified string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        return lcfirst(str_replace("_", "", ucwords($input, "_")));
    }

    /**
     * Mirrors each word individually and return transformed text (example 'ФЫВА олдж' =>'АВЫФ ждло')
     *
     * @param string $input simple string
     * @return string modified string
     */
    public function mirrorMultibyteString(string $input): string
    {
        $input = explode(" ", $input);
        foreach ($input as &$value) {
            $value = $this->mb_strrev($value);
        }
        return implode(" ", $input);
    }

    /**
     * Reverses a string like @strrev but work with multibyte text
     * @see https://www.php.net/manual/en/function.strrev.php
     *
     * @param string $str simple string
     * @return string modified string
     */
    public function mb_strrev(string $str): string
    {
        $result = '';
        for ($i = mb_strlen($str); $i >= 0; $i--) {
            $result .= mb_substr($str, $i, 1);
        }
        return $result;
    }

    /**
     * Makes new string by the formula: 'The' + a $noun with first letter capitalized.
     * If the $noun starts and ends with the same letter,
     * repeats the $noun twice and connects them with the first and last letters,
     * combines them into one word like this (WITHOUT "The" in front):
     * dolphin -> The Dolphin
     * alaska -> Alaskalaska
     * europe -> Europeurope
     *
     * @param string $noun simple string
     * @return string modified string
     */
    public function getBrandName(string $noun): string
    {
        if ($noun[0] != mb_substr($noun, -1, 1)) {
            return "The " . ucfirst($noun);
        } else {
            return ucfirst($noun) . substr($noun, 1);
        }

    }
}