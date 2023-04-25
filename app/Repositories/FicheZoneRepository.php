<?php

namespace App\Repositories;

use App\Models\FicheZone;
use App\Repositories\BaseRepository;

/**
 * Class FicheZoneRepository
 * @package App\Repositories
 * @version April 20, 2023, 9:06 am UTC
*/

class FicheZoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fiche_id',
        'zone',
        'equipement',
        'local'
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
        return FicheZone::class;
    }
}
