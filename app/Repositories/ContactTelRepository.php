<?php

namespace App\Repositories;

use App\Models\ContactTel;
use App\Repositories\BaseRepository;

/**
 * Class ContactTelRepository
 * @package App\Repositories
 * @version October 7, 2022, 5:50 pm UTC
*/

class ContactTelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contact_id',
        'tel'
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
        return ContactTel::class;
    }
}
