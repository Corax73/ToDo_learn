<?php

namespace Tests\Feature;




use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testMethod()
    {
        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response->ddSession();
    }
}
