<?php

namespace basics;

class BasicsValidator implements BasicsValidatorInterface
{
	/**
	 * @param int $minute
	 * @return void
	 */
	public function isMinutesException(int $minute): void
	{
		if ($minute < 0 || $minute > 59) {
            throw new \InvalidArgumentException('Invalid data - the $minute should be from 0 to 60');
        }
    }

	/**
	 * @param int $year
	 * @return void
	 */
	public function isYearException(int $year): void
	{
		if ($year < 1900) {
            throw new \InvalidArgumentException('The ' . $year . ' is unavailable value, must be > 1900');
        }
	}

	/**
	 * @param string $input
	 * @return void
	 */
	public function isValidStringException(string $input): void
	{
		if (strlen($input) != 6) {
            throw new \InvalidArgumentException('The ' . $input . ' is unavailable value, must be > 6 digits');
        }
	}
}
