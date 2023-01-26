<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Formation",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="personne_id",
 *          description="personne_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ecole",
 *          description="ecole",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="diplome",
 *          description="diplome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="debut",
 *          description="debut",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="pays",
 *          description="pays",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fin",
 *          description="fin",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="ville",
 *          description="ville",
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
class Formation extends Model
{
    use SoftDeletes;


    public $table = 'formations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personne_id',
        'ecole',
        'diplome',
        'debut',
        'pays',
        'fin',
        'ville'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personne_id' => 'integer',
        'ecole' => 'string',
        'diplome' => 'string',
        'debut' => 'date',
        'pays' => 'string',
        'fin' => 'date',
        'ville' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function personne()
    {
        return $this->belongsTo(\App\Models\Personne::class);
    }
}
