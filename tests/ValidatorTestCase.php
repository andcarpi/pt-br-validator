<?php

abstract class ValidatorTestCase extends Orchestra\Testbench\TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->app->register(\andcarpi\PtBrValidator\ValidatorProvider::class);
	}
}