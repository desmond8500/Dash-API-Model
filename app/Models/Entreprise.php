<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Entreprise",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="logo",
 *          description="logo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ninea",
 *          description="ninea",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="adress",
 *          description="adress",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mail",
 *          description="mail",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rccm",
 *          description="rccm",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="site",
 *          description="site",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="banque",
 *          description="banque",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Entreprise extends Model
{
    use SoftDeletes;

    public $table = 'entreprises';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'logo',
        'ninea',
        'adress',
        'mail',
        'rccm',
        'site',
        'banque'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'logo' => 'string',
        'ninea' => 'string',
        'adress' => 'string',
        'mail' => 'string',
        'rccm' => 'string',
        'site' => 'string',
        'banque' => 'string'
    ];

    public static $rules = [

    ];
}
