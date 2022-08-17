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

		$arrTags = $result = [];

		array_walk_recursive($input, function ($value, $key) use (&$arrTags) {
			if ($key === 'tags') {
				$arrTags[] = $value;
			}
		});

		$arrTags = array_unique($arrTags);

		foreach ($input as $arr) {
			$arrTags = array_merge($arrTags, $arr["tags"]);
		}

		$arrTags = array_unique($arrTags);

		foreach ($input as $arrElement) {
			foreach ($arrTags as $tag) {
				if (in_array($tag, $arrElement['tags'])) {
					$result[$tag][] = $arrElement['name'];
					$result[$tag] = array_unique($result[$tag]);
					sort($result[$tag]);
				}
			}
		}

		ksort($result);

		return $result;
	}
}
