<?php

namespace basics;

class Basics implements BasicsInterface
{
    private $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    /**
     * Method determines at which quarter of an hour the number falls
     *
     * @throws 	\InvalidArgumentException if $minute is negative of greater then 60.
     * @param int $minute number from 0 to 59 (i.e. 10 or 25 or 60 etc).
     * @return string  return one of the values: "first", "second", "third" and "fourth".
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);
        switch (true) {
            case ($minute > 0 && $minute <= 15):
                return "first";
            case ($minute > 15 && $minute <= 30):
                return "second";
            case ($minute > 30 && $minute <= 45):
                return "third";
            case (($minute > 45 && $minute <= 59) || $minute === 0):
                return "fourth";
        }
    }

    /**
     * Checks leap year or not
     *
     * @throws 	\InvalidArgumentException if $year < 1900.
     * @param int $year year (i.e. 1995 or 2020 etc).
     * @return bool true if the year is Leap or false otherwise
     */
    public function isLeapYear(int $year): bool
    {

        $this->validator->isYearException($year);
        if ($year % 4 !== 0) {
            return false;
        } elseif ($year % 100 !== 0) {
            return true;
        } elseif ($year % 400 !== 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks if the sum of the first three digits is equal to the sum of the last three
     * (i.e. in first case 1+2+3 not equal with 4+5+6 - return false).
     *
     * @throws 	\InvalidArgumentException if $input contains more then 6 digits.
     * @param string $input contains a string of six digits (like '123456' or '385934').
     * @return bool true on success or false on failure.
     *
     */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);
        $arr = str_split($input, 3);
        if (array_sum(str_split($arr[0])) == array_sum(str_split($arr[1]))) {
            return true;
        } else {
            return false;
        }
    }
}