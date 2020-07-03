<?php

namespace Tests\Botman;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected $bot;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest($bot)
	{
		$this->bot
            ->receives('hola')
			->assertReply('Hello!');
	}
}