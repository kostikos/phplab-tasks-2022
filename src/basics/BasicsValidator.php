<?php

namespace basics;

class BasicsValidator implements BasicsValidatorInterface
{
    /**
     * Checks that the $minute is in the range from 1 to 59
     *
     * @param int $minute
     * @return void
     */
    public function isMinutesException(int $minute): void
    {
        if ($minute < 0 || $minute > 59)
            throw new \InvalidArgumentException('The ' . $minute . ' is negative of greater then 60. The variable must 
            contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).');
    }

    /**
     * Checks that the $year is  bigger then 1900
     *
     * @param int $year
     * @return void
     */
    public function isYearException(int $year): void
    {
        if ($year < 1900)
            throw new \InvalidArgumentException('The ' . $year . ' is unavailable value. The variable must 
            higher then 1900.');
    }

    /**
     * Checks whether the length of the string is equal to 6
     *
     * @param string $input
     * @return void
     */
    public function isValidStringException(string $input): void
    {
        if (strlen($input) != 6)
            throw new \InvalidArgumentException('The ' . $input . ' is unavailable value. The variable must 
            contains more then 6 digits');
    }
}