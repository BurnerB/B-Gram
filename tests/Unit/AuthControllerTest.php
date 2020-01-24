<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class AuthControllerTest extends TestCase
{   
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    

    
    public function testLoginAuthenticatesAndRedirects()
    {
    $user = factory(\App\User::class)->create();

    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response->assertRedirect(route('posts.show'));
    $this->assertAuthenticatedAs($user);
    }

    public function testLoginValidationErrors()
    {
    $response = $this->post('/login', []);

    $response->assertStatus(302);
    $response->assertSessionHasErrors('email');
    }

    public function testRegisterValidationError()
    {
        $response = $this->post('/register', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email','username', 'password']);
    }

    // public function testRegisterCreatesAuthenUser()
    // {
    //     $name = $this->faker->name;
    //     $email = $this->faker->safeEmail;
    //     $username = $this->faker->username;
    //     $password = $this->faker->password(9);
    //     $data= [
    //         'name' => $name,
    //         'email' => $email,
    //         'username'=>$username,
    //         'password' => $password,
    //         'password_confirmation' => $password,
    //     ];
    //     $response = $this->post('/register', $data);
    //     $response=$this->json('POST','/register',$data);

    //     dd($response);

    //     $response->assertJson(['message'=>"Registered successfully."]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect(route('home'));

    //     $user = \App\User::where('email', $email)->where('name', $name)->first();
    //     dd($user);
    //     $this->assertNotNull($user);

    //     $this->assertAuthenticatedAs($user);
    // }
}
