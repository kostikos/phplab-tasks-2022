<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
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
		$this->assertEquals($expected, $this->functions->sayHelloArgument($input));
	}

	public function positiveDataProvider(): array
	{
		return [
			[123, 'Hello 123'],
			['123', 'Hello 123'],
			[false, 'Hello '],
			[true, 'Hello 1'],
		];
	}
}