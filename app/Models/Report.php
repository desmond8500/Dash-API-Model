<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Report",
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
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
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
class Report extends Model
{
    use SoftDeletes;


    public $table = 'reports';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'objet',
        'description',
        'date',
        'type'
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'objet' => 'string',
        'description' => 'string',
        'date' => 'date',
        'type' => 'string'
    ];

    public static $rules = [
        'objet' => 'required',
        'description' => 'required',
        'date' => 'required',
        'type' => 'required'
    ];

    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }

    public function section(): HasMany
    {
        return $this->hasMany(ReportSection::class);
    }

    public function attenders(): HasMany
    {
        return $this->hasMany(ReportPeople::class);
    }


}
