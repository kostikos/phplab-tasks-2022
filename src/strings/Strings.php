<?php

namespace strings;

class Strings implements StringsInterface
{
	/**
	 * @param string $input
	 * @return string modified string
	 */
	public function snakeCaseToCamelCase(string $input): string
	{
		return lcfirst(str_replace('_', '', ucwords($input, '_')));
	}

	/**
	 * @param string $input
	 * @return string modified string
	 */
	public function mirrorMultibyteString(string $input): string
	{
		$input = explode(' ', $input);
		foreach ($input as &$value) {
			$value = join('', array_reverse(preg_split('//u', $value, -1, PREG_SPLIT_NO_EMPTY)));
		}

		return implode(' ', $input);
	}

	/**
	 * @param string $noun
	 * @return string modified string
	 */
	public function getBrandName(string $noun): string
	{
		return ($noun[0] != $noun[-1]) ? 'The ' . ucfirst($noun) : ucfirst($noun) . substr($noun, 1);
	}
}
