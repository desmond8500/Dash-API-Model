<?php

namespace App\Repositories;

use App\Models\Provider;
use App\Repositories\BaseRepository;

/**
 * Class ProviderRepository
 * @package App\Repositories
 * @version September 24, 2022, 10:29 am UTC
*/

class ProviderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'logo',
        'adress',
        'website'
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
        return Provider::class;
    }
}
