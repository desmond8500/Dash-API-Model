<?php

namespace App\Repositories;

use App\Models\Avancement;
use App\Repositories\BaseRepository;

/**
 * Class AvancementRepository
 * @package App\Repositories
 * @version March 29, 2023, 7:26 am UTC
*/

class AvancementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'system',
        'building_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Avancement::class;
    }
}
