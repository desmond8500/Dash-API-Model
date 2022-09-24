<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Manual;

class ManualApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_manual()
    {
        $manual = Manual::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/manuals', $manual
        );

        $this->assertApiResponse($manual);
    }

    /**
     * @test
     */
    public function test_read_manual()
    {
        $manual = Manual::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/manuals/'.$manual->id
        );

        $this->assertApiResponse($manual->toArray());
    }

    /**
     * @test
     */
    public function test_update_manual()
    {
        $manual = Manual::factory()->create();
        $editedManual = Manual::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/manuals/'.$manual->id,
            $editedManual
        );

        $this->assertApiResponse($editedManual);
    }

    /**
     * @test
     */
    public function test_delete_manual()
    {
        $manual = Manual::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/manuals/'.$manual->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/manuals/'.$manual->id
        );

        $this->response->assertStatus(404);
    }
}
