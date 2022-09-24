<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Priority;

class PriorityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_priority()
    {
        $priority = Priority::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/priorities', $priority
        );

        $this->assertApiResponse($priority);
    }

    /**
     * @test
     */
    public function test_read_priority()
    {
        $priority = Priority::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/priorities/'.$priority->id
        );

        $this->assertApiResponse($priority->toArray());
    }

    /**
     * @test
     */
    public function test_update_priority()
    {
        $priority = Priority::factory()->create();
        $editedPriority = Priority::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/priorities/'.$priority->id,
            $editedPriority
        );

        $this->assertApiResponse($editedPriority);
    }

    /**
     * @test
     */
    public function test_delete_priority()
    {
        $priority = Priority::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/priorities/'.$priority->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/priorities/'.$priority->id
        );

        $this->response->assertStatus(404);
    }
}
