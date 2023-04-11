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
 *          property="building_id",
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
 *          property="avancement_categorie_id",
 *          description="avancement_categorie_id",
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
        'avancement_categorie_id',
        'building_id',
        'name',
        'system',
    ];

    protected $casts = [
        'id' => 'integer',
        'avancement_categorie_id' => 'integer',
        'building_id' => 'integer',
        'name' => 'string',
        'system' => 'integer',
    ];

    public static $rules = [
        'avancement_categorie_id' => 'required',
        'building_id' => 'required',
        'name' => 'required',
        'system' => 'required',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(AvancementRow::class);
    }

    public function system(): HasOne
    {
        return $this->belongsTo(System::class, 'system');
    }

}
