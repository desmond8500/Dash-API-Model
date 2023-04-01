<?php

namespace App\Repositories;

use App\Models\AvancementCategorie;
use App\Repositories\BaseRepository;

/**
 * Class AvancementCategorieRepository
 * @package App\Repositories
 * @version April 1, 2023, 5:50 pm UTC
*/

class AvancementCategorieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'avancement_id',
        'name'
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
        return AvancementCategorie::class;
    }
}
