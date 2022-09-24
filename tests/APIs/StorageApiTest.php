<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Storage;

class StorageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_storage()
    {
        $storage = Storage::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/storages', $storage
        );

        $this->assertApiResponse($storage);
    }

    /**
     * @test
     */
    public function test_read_storage()
    {
        $storage = Storage::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/storages/'.$storage->id
        );

        $this->assertApiResponse($storage->toArray());
    }

    /**
     * @test
     */
    public function test_update_storage()
    {
        $storage = Storage::factory()->create();
        $editedStorage = Storage::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/storages/'.$storage->id,
            $editedStorage
        );

        $this->assertApiResponse($editedStorage);
    }

    /**
     * @test
     */
    public function test_delete_storage()
    {
        $storage = Storage::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/storages/'.$storage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/storages/'.$storage->id
        );

        $this->response->assertStatus(404);
    }
}
