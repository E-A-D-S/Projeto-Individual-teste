<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password'=> 'password'
            
        ]);

            $this->actingAs($user);

        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_create_user()
    {
            $response = $this->post('/login/create', [
            'name' =>'marcio',
            'email' => 'marcio@master.com',
            'password' => '123456789',
            'is_admin' => 1,
        ]);

        $response ->assertStatus(200);
    }

    public function test_edit_user()
    {
        $user = User::factory()->edit();

        $response = $this->post('/login/edit', [
            'name' =>'marcio',
            'email' => 'marcio@master.com',
            'password' => '123456789',
            'is_admin' => 1,
            'image' => $data['image'],
        ]);
            $response ->assertStatus(200);      
}

    public function test_delete_user()
    {
        $user = User::factory()->destroy();

        $response = $this->post('/login/destroy');
        
        $response ->assertStatus(200);      

    }
}