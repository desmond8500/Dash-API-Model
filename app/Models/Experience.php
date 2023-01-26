<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Experience",
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
 *          property="pays",
 *          description="pays",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ville",
 *          description="ville",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="debut",
 *          description="debut",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fin",
 *          description="fin",
 *          type="string",
 *          format="date"
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
 *      ),
 *      @SWG\Property(
 *          property="entreprise",
 *          description="entreprise",
 *          type="string"
 *      )
 * )
 */
class Experience extends Model
{
    use SoftDeletes;


    public $table = 'experiences';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'personne_id',
        'pays',
        'ville',
        'debut',
        'fin',
        'entreprise'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'personne_id' => 'integer',
        'pays' => 'string',
        'ville' => 'string',
        'debut' => 'date',
        'fin' => 'date',
        'entreprise' => 'string'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function taches()
    {
        return $this->hasMany(\App\Models\Tache::class);
    }
}
