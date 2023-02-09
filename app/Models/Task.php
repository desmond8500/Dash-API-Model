<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Task",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="devis_id",
 *          description="devis_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="objet",
 *          description="objet",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_id",
 *          description="status_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="priority_id",
 *          description="priority_id",
 *          type="integer",
 *          format="int32"
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
class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'devis_id',
        'level_id',
        'stage_id',
        'room_id',
        'objet',
        'description',
        'status_id',
        'priority_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'devis_id' => 'integer',
        'level_id' => 'integer',
        'stage_id' => 'integer',
        'room_id' => 'integer',
        'objet' => 'string',
        'description' => 'string',
        'status_id' => 'integer',
        'priority_id' => 'integer'
    ];

    public static $rules = [

    ];

    public function user(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(TaskPhoto::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(TaskDocument::class);
    }

}
