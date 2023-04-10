<?php

namespace App\Repositories;

use App\Models\Iban;
use App\Repositories\BaseRepository;

/**
 * Class IbanRepository
 * @package App\Repositories
 * @version April 10, 2023, 6:08 pm UTC
*/

class IbanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'banque',
        'code_banque',
        'code_guichet',
        'compte',
        'cle',
        'swift',
        'entreprise_id'
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
        return Iban::class;
    }
}
