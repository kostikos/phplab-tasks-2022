<?php

namespace basics;

use InvalidArgumentException;

class Basics implements BasicsInterface
{
	private $validator;

	public function __construct($validator)
	{
		$this->validator = $validator;
	}

	/**
	 * @param int $minute number from 0 to 59 (i.e. 10 or 25 or 60 etc).
	 * @return string  return one of the values: "first", "second", "third" and "fourth".
	 * @throws InvalidArgumentException
	 */
	public function getMinuteQuarter(int $minute): string
	{
		$this->validator->isMinutesException($minute);

		if ($minute > 0 && $minute <= 15) {
			return "first";
		} elseif ($minute > 15 && $minute <= 30) {
			return "second";
		} elseif ($minute > 30 && $minute <= 45) {
			return "third";
		} else {
			return "fourth";
		}
	}

	/**
	 * @param int $year year (i.e. 1995 or 2020 etc).
	 * @return bool true if the year is Leap or false otherwise
	 * @throws InvalidArgumentException
	 */
	public function isLeapYear(int $year): bool
	{
		$this->validator->isYearException($year);

		return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year % 400) == 0)));
	}

	/**
	 * @param string $input contains a string of six digits (like '123456' or '385934').
	 * @return bool true on success or false on failure.
	 *
	 * @throws InvalidArgumentException
	 */
	public function isSumEqual(string $input): bool
	{
		$this->validator->isValidStringException($input);

		$array = str_split($input, 3);
		return (array_sum(str_split($array[0])) == array_sum(str_split($array[1])));
	}
}
