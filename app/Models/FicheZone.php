<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="FicheZone",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fiche_id",
 *          description="fiche_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="zone",
 *          description="zone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="equipement",
 *          description="equipement",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="local",
 *          description="local",
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
class FicheZone extends Model
{
    use SoftDeletes;

    public $table = 'fiche_zones';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'fiche_id',
        'zone',
        'equipement',
        'local'
    ];

    protected $casts = [
        'id' => 'integer',
        'fiche_id' => 'integer',
        'zone' => 'string',
        'equipement' => 'string',
        'local' => 'string'
    ];

    public static $rules = [
        'fiche_id' => ['required','integer'],
    ];


    public function fiche(): BelongsTo
    {
        return $this->belongsTo(Fiche::class);
    }
}
