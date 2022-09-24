<?php namespace Tests\Repositories;

use App\Models\Manual;
use App\Repositories\ManualRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ManualRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ManualRepository
     */
    protected $manualRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->manualRepo = \App::make(ManualRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_manual()
    {
        $manual = Manual::factory()->make()->toArray();

        $createdManual = $this->manualRepo->create($manual);

        $createdManual = $createdManual->toArray();
        $this->assertArrayHasKey('id', $createdManual);
        $this->assertNotNull($createdManual['id'], 'Created Manual must have id specified');
        $this->assertNotNull(Manual::find($createdManual['id']), 'Manual with given id must be in DB');
        $this->assertModelData($manual, $createdManual);
    }

    /**
     * @test read
     */
    public function test_read_manual()
    {
        $manual = Manual::factory()->create();

        $dbManual = $this->manualRepo->find($manual->id);

        $dbManual = $dbManual->toArray();
        $this->assertModelData($manual->toArray(), $dbManual);
    }

    /**
     * @test update
     */
    public function test_update_manual()
    {
        $manual = Manual::factory()->create();
        $fakeManual = Manual::factory()->make()->toArray();

        $updatedManual = $this->manualRepo->update($fakeManual, $manual->id);

        $this->assertModelData($fakeManual, $updatedManual->toArray());
        $dbManual = $this->manualRepo->find($manual->id);
        $this->assertModelData($fakeManual, $dbManual->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_manual()
    {
        $manual = Manual::factory()->create();

        $resp = $this->manualRepo->delete($manual->id);

        $this->assertTrue($resp);
        $this->assertNull(Manual::find($manual->id), 'Manual should not exist in DB');
    }
}
