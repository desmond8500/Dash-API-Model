<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 *          property="projet_id",
 *          description="projet_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="building_id",
 *          description="building_id",
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
        'projet_id',
        'building_id',
        'stage_id',
        'room_id',
        'objet',
        'description',
        'status_id',
        'priority_id',
        'debut',
        'fin',
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'building_id' => 'integer',
        'stage_id' => 'integer',
        'room_id' => 'integer',
        'objet' => 'string',
        'description' => 'string',
        'status_id' => 'integer',
        'priority_id' => 'integer',
        'debut' => 'date',
        'fin' => 'date',
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


    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

}
