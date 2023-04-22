<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/** @var integer $projet_id description
 *  @var integer $fiche_type_id description
 */

/**
 * @SWG\Definition(
 *      definition="Fiche",
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
 *          property="fiche_type_id",
 *          description="fiche_type_id",
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
 *          property="date",
 *          description="date",
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
class Fiche extends Model
{
    use SoftDeletes;

    public $table = 'fiches';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'fiche_type_id',
        'name',
        'date',
        'master_code',
        'user_code',
        'tech_code',
        'modele',
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'fiche_type_id' => 'integer',
        'name' => 'string',
        'date' => 'date',
        'master_code' => 'string',
        'user_code' => 'string',
        'tech_code' => 'string',
        'modele' => 'string',
    ];

    public static $rules = [
        'projet_id' => ['required','integer'],
        'fiche_type_id' => ['required','integer'],
    ];

    public function zones(): HasMany
    {
        return $this->hasMany(FicheZone::class, 'fiche_id');
    }

    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }

}
