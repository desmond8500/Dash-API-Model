<?php namespace Tests\Repositories;

use App\Models\Storage;
use App\Repositories\StorageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StorageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StorageRepository
     */
    protected $storageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->storageRepo = \App::make(StorageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_storage()
    {
        $storage = Storage::factory()->make()->toArray();

        $createdStorage = $this->storageRepo->create($storage);

        $createdStorage = $createdStorage->toArray();
        $this->assertArrayHasKey('id', $createdStorage);
        $this->assertNotNull($createdStorage['id'], 'Created Storage must have id specified');
        $this->assertNotNull(Storage::find($createdStorage['id']), 'Storage with given id must be in DB');
        $this->assertModelData($storage, $createdStorage);
    }

    /**
     * @test read
     */
    public function test_read_storage()
    {
        $storage = Storage::factory()->create();

        $dbStorage = $this->storageRepo->find($storage->id);

        $dbStorage = $dbStorage->toArray();
        $this->assertModelData($storage->toArray(), $dbStorage);
    }

    /**
     * @test update
     */
    public function test_update_storage()
    {
        $storage = Storage::factory()->create();
        $fakeStorage = Storage::factory()->make()->toArray();

        $updatedStorage = $this->storageRepo->update($fakeStorage, $storage->id);

        $this->assertModelData($fakeStorage, $updatedStorage->toArray());
        $dbStorage = $this->storageRepo->find($storage->id);
        $this->assertModelData($fakeStorage, $dbStorage->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_storage()
    {
        $storage = Storage::factory()->create();

        $resp = $this->storageRepo->delete($storage->id);

        $this->assertTrue($resp);
        $this->assertNull(Storage::find($storage->id), 'Storage should not exist in DB');
    }
}
