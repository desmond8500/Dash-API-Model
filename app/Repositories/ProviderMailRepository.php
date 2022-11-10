<?php

namespace App\Repositories;

use App\Models\ProviderMail;
use App\Repositories\BaseRepository;

/**
 * Class ProviderMailRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:29 am UTC
*/

class ProviderMailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'provider_id',
        'email'
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
        return ProviderMail::class;
    }
}
