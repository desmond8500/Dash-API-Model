<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Room",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="stage_id",
 *          description="stage_id",
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
class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'stage_id',
        'name',
        'description'
    ];

    protected $casts = [
        'id' => 'integer',
        'stage_id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    public static $rules = [

    ];

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }


}
