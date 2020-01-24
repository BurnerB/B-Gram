<?php

namespace Tests\Feature\Http\Controllers\Auth;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHomePageUnauthorized()
    {
        $response=$this->json('GET','/');

        $response->assertStatus(401);
    }
    Public function testPostImageWithMiddleware(){
        $data=[
            'caption'=>"new post",
            'image'=>"https://images.pexels.com/photos/1000084/pexels-photo-1000084.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
        ];
        $response=$this->json('POST','/p',$data);
        $response->assertStatus(401);
        $response->assertJson(['message'=>"Unauthenticated."]);
    }

    // Public function testPost(){
    //     $data=[
    //         'caption'=>"new post",
    //         'image'=>UploadedFile::fake()->image('file.jpg', 600, 600)
    //     ];
    //     $user = factory(\App\User::class)->create();
    //     $response=$this->actingAs($user, 'api')->json('POST','/p',$data);
    //     dd($user);
    //     $response->assertStatus(201);
    //     $response->assertJson(['message'=>"Post Created!"]);
    //     $response->assertJson(['data'=> $data]);
    // }
    
}
