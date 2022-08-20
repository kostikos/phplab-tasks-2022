<?php

namespace arrays;

class Arrays implements ArraysInterface
{
	/**
	 * @param array $input variable contains an array of digits
	 * @return array  the resulting array.
	 */
	public function repeatArrayValues(array $input): array
	{
		$result = [];

		foreach ($input as $element) {
			$result = array_merge($result, array_fill(0, $element, $element));
		}

		return $result;
	}

	/**
	 * @param array $input variable contains an array of digits
	 * @return int the resulting number or 0 if $input is empty
	 */
	public function getUniqueValue(array $input): int
	{
		$arrayUnique = array_diff($input, array_diff_assoc($input, array_unique($input)));

		return count($arrayUnique) > 0 ? min($arrayUnique) : 0;
	}

	/**
	 * @param array $input variable contains an array of arrays.
	 * @return array transformed array
	 */
	public function groupByTag(array $input): array
	{

		$arrTags = [];

        sort($input);

        foreach ($input as $item) {
            foreach ($item['tags'] as $tag) {
                $arrTags[$tag][] = $item['name'];
                $arrTags[$tag] = array_unique($arrTags[$tag]);
                sort($arrTags[$tag]);
            }
        }

		return $arrTags;
	}
}
