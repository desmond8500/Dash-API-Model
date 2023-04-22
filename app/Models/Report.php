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

    public static function types(){
        return (object) array(
            (object) array('id'=>1, "name"=> "Rapport de Visite"),
            (object) array('id'=>2, "name"=> "Rapport d'Intervention"),
            (object) array('id'=>3, "name"=> "Rapport de Vérification"),
            (object) array('id'=>4, "name"=> "Rapport de Dépannage"),
        );
    }
    public static function titles(){
        return array(
            'Contexte',
            "Bilan de l'existant",
            "Besoin du client",
            "Proposition technique",
            "Travaux effectués",
            "Travaux restants"
        );
    }

    public function type()
    {
        $types = $this->types();

        if ($this->type == 1) {
            return 'Rapport de Visite';
        }
        else if($this->type == 2) {
            return "Rapport d'Intervention";
        }
        else if($this->type == 3) {
            return 'Rapport de Vérification';
        }
        else if($this->type == 4) {
            return 'Rapport de Dépannage';
        }

    }




}
