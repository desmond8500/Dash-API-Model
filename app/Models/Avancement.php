<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Avancement",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="projet_id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="system",
 *          description="system",
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
class Avancement extends Model
{
    use SoftDeletes;

    public $table = 'avancements';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'name',
        'system',
        'building_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'name' => 'string',
        'system' => 'integer',
        'building_id' => 'integer'
    ];

    public static $rules = [

    ];

    public function sections(): HasMany
    {
        return $this->hasMany(AvancementRow::class);
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function system(): HasOne
    {
        return $this->belongsTo(System::class, 'system');
    }

}
