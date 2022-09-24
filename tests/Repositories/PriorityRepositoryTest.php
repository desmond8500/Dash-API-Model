<?php namespace Tests\Repositories;

use App\Models\Priority;
use App\Repositories\PriorityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PriorityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PriorityRepository
     */
    protected $priorityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->priorityRepo = \App::make(PriorityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_priority()
    {
        $priority = Priority::factory()->make()->toArray();

        $createdPriority = $this->priorityRepo->create($priority);

        $createdPriority = $createdPriority->toArray();
        $this->assertArrayHasKey('id', $createdPriority);
        $this->assertNotNull($createdPriority['id'], 'Created Priority must have id specified');
        $this->assertNotNull(Priority::find($createdPriority['id']), 'Priority with given id must be in DB');
        $this->assertModelData($priority, $createdPriority);
    }

    /**
     * @test read
     */
    public function test_read_priority()
    {
        $priority = Priority::factory()->create();

        $dbPriority = $this->priorityRepo->find($priority->id);

        $dbPriority = $dbPriority->toArray();
        $this->assertModelData($priority->toArray(), $dbPriority);
    }

    /**
     * @test update
     */
    public function test_update_priority()
    {
        $priority = Priority::factory()->create();
        $fakePriority = Priority::factory()->make()->toArray();

        $updatedPriority = $this->priorityRepo->update($fakePriority, $priority->id);

        $this->assertModelData($fakePriority, $updatedPriority->toArray());
        $dbPriority = $this->priorityRepo->find($priority->id);
        $this->assertModelData($fakePriority, $dbPriority->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_priority()
    {
        $priority = Priority::factory()->create();

        $resp = $this->priorityRepo->delete($priority->id);

        $this->assertTrue($resp);
        $this->assertNull(Priority::find($priority->id), 'Priority should not exist in DB');
    }
}
