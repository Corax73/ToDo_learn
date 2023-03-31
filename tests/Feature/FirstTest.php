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
    
    public function testMethodRoute()
    {
        $response = $this->get('/tasks');
        $response->assertStatus(200);
    }
    public function testMethodSession()
    {
        $response = $this->get('/tasks');
        $response->ddSession();
    }
    public function testMethodDB()
    {
        $this->assertDatabaseHas('tasks', ['user_id'=> '1']);
        $this->assertDatabaseCount('users', 2);
    }
}
