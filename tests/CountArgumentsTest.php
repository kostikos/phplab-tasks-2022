<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
	protected $functions;

	protected function setUp(): void
	{
		$this->functions = new \functions\Functions();
	}

	/**
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive($input, $expected)
	{
		$this->assertEquals($expected, $this->functions->countArguments($input));
	}

	public function positiveDataProvider(): array
	{
		return [
			[
				["test"],
				['argument_count' => 1, 'argument_values' => [['test']]]
			],
			[
				['argument 1', 'argument_2'],
				['argument_count' => 2, 'argument_values' => [[['argument 1']], [['argument 222']]]]
			],
		];
	}

}