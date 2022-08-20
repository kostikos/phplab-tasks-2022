<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
	protected $functions;

	protected function setUp(): void
	{
		$this->functions = new \functions\Functions();
	}

	/**
	 * @dataProvider positiveDataProvider
	 */
	public function testException(...$input)
	{
		$this->expectException(InvalidArgumentException::class);

		$this->functions->countArgumentsWrapper($input);
	}

	/**
	 * @return array[]
	 */
	public function positiveDataProvider(): array
	{
		return [
			[
				[],
				['argument_count' => 0, 'argument_values' => [],]
			],
			[
				['test_string'],
				['argument_count' => 1, 'argument_values' => ['test_string'],]
			],
			[
				['first', 'second'],
				['argument_count' => 2, 'argument_values' => ['first', 'second'],]
			],
		];
	}

}
