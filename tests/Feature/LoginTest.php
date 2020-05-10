<?php

namespace Tests\Feature;

use YummiPizza\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @var \YummiPizza\Entities\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test
     */
    public function authenticate()
    {
        $this->postJson('/auth/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ])
            ->assertSuccessful()
            ->assertJsonStructure(['token', 'expires_in'])
            ->assertJson(['token_type' => 'bearer']);
    }

    /** @test */
    public function fetch_the_current_user()
    {
        $this->actingAs($this->user)
            ->getJson('/auth/me')
            ->assertSuccessful()
            ->assertJsonStructure(['data' => ['id', 'name', 'email']]);
    }
}
