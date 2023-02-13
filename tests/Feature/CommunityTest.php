<?php

namespace Tests\Feature;

use App\Models\Community;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommunityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_fetch_all_communities(){
        $response = $this->get('/api/communities');
        $response->assertStatus(200);
    }
    public function test_can_fetch_single_communities(){
        $community = Community::factory()->create();
        $response = $this->get('/api/communities/1');
        $response->assertStatus(200);
    }

    public function test_can_create_community(){

        $data=["name"=>"Carlos",
                "email"=>"carlos@prueba.es",
                "password"=>"test1234",
                "password_confirmation"=>"test1234",];
        $response= $this->postJson('/api/register',$data,['Content-Type' => 'application/vnd.api+json']);
        $token = $response->json('token');

        $response = $this->postJson('/api/communities',['name'=>'TestPost'],['Authorization' => 'Bearer '.$token]);
        $response->assertStatus(201);
    }

    public function test_guests_cannot_create_community(){
        $response = $this->postJson('/api/communities',['name'=>'TestPost']);
        $response->assertStatus(401);
    }
    public function test_can_update_community()
    {
        $community = Community::factory()->create();
        $data = [
            "email" => "carlos@prueba.es",
            "password" => "test1234",];
        $response = $this->postJson('/api/nuevoToken', $data, ['Content-Type' => 'application/vnd.api+json']);
        $token = $response->json('token');

        $response = $this->putJson('/api/communities/1', ['name' => 'TestPost'], ['Authorization' => 'Bearer ' . $token]);
        $response->assertStatus(200);
    }
    public function test_can_delete_community()
    {
        $community = Community::factory()->create();
        $data = [
            "email" => "carlos@prueba.es",
            "password" => "test1234",];
        $response = $this->postJson('/api/nuevoToken', $data, ['Content-Type' => 'application/vnd.api+json']);
        $token = $response->json('token');

        $response = $this->delete('/api/communities/1',['Authorization' => 'Bearer ' . $token]);
        $response->assertStatus(200);
    }

    public function test_can_return_a_json_api_error_object_when_a_comunidad_is_not_found(){
        $response = $this->get('/api/communities/678');
        $response->assertJson([]);

    }

}
