<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Personne",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="prenom",
 *          description="prenom",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nom",
 *          description="nom",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fonction",
 *          description="fonction",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tel",
 *          description="tel",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="adresse",
 *          description="adresse",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="profile",
 *          description="profile",
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
class Personne extends Model
{
    use SoftDeletes;

    public $table = 'personnes';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'prenom',
        'nom',
        'fonction',
        'tel',
        'date',
        'adresse',
        'email',
        'profile',
        'photo',
        'info1',
        'info2',
        'info3',
    ];

    protected $casts = [
        'id' => 'integer',
        'prenom' => 'string',
        'nom' => 'string',
        'fonction' => 'string',
        'tel' => 'string',
        'date' => 'string',
        'adresse' => 'string',
        'email' => 'string',
        'profile' => 'string',
        'photo' => 'string',
        'info1' => 'string',
        'info2' => 'string',
        'info3' => 'string',
    ];

    public static $rules = [

    ];

    public function formations()
    {
        return $this->hasMany(\App\Models\Formation::class);
    }

    public function experiences()
    {
        return $this->hasMany(\App\Models\Experience::class);
    }

    public function competences()
    {
        return $this->hasMany(\App\Models\Competence::class);
    }

    public function langues()
    {
        return $this->hasMany(\App\Models\Langue::class);
    }

    public function interets()
    {
        return $this->hasMany(\App\Models\Interet::class);
    }
}
