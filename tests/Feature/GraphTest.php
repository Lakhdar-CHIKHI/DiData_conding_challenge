<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GraphTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateEmptyGraph()
    {
        $response = $this->post('/api/empty_graph',[]);
        $response->assertStatus(200);
    }

    public function testCreateGraphSuccess()
    {
        $response = $this->post('/api/graph',
            [
                'name' => 'testsss',
                'description' => 'description'
            ]);
        $response->assertSessionHasErrors([
            'description' => 'The description must be at least 50 characters.'
        ]);
    }

    public function testCreateGraph()
    {
        $response = $this->post('/api/graph',
            [
                'name' => 'test graph'.time(),
                'description' => 'descriptionssssssddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddsssssssssssssssss'
            ]);
            $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $response = $this->delete('/api/graph/3');
            $response->assertStatus(200);
    }
    
}
