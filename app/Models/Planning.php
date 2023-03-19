<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Planning",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="batiment_id",
 *          description="batiment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="system_id",
 *          description="system_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tache",
 *          description="tache",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
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
class Planning extends Model
{
    use SoftDeletes;

    public $table = 'plannings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'batiment_id',
        'system_id',
        'tache',
        'date',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'batiment_id' => 'integer',
        'system_id' => 'integer',
        'tache' => 'string',
        'date' => 'date',
        'status' => 'string'
    ];

    public static $rules = [

    ];

}
