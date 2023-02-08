<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Building",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="projet_id",
 *          description="projet_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
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
class Building extends Model
{
    use SoftDeletes;

    public $table = 'buildings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'name',
        'description'
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    public static $rules = [

    ];


    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }


}
