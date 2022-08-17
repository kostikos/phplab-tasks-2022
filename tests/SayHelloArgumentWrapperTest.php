<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
	protected $functions;

	protected function setUp(): void
	{
		$this->functions = new functions\Functions();
	}

	/**
	 * @dataProvider positiveDataProvider
	 */
	public function testException($arg)
	{
		$this->expectException(InvalidArgumentException::class);

		$this->functions->sayHelloArgumentWrapper($arg);
	}

	public function positiveDataProvider(): array
	{
		return [
			[[1, 2], [1, 2]],
			[NULL, NULL],
			[new stdClass(), new stdClass()],
		];
	}
}