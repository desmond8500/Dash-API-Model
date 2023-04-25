<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Iban",
 *      required={"banque", "code_banque", "code_guichet", "compte", "cle", "swift"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="banque",
 *          description="banque",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="code_banque",
 *          description="code_banque",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="code_guichet",
 *          description="code_guichet",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="compte",
 *          description="compte",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cle",
 *          description="cle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="swift",
 *          description="swift",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="entreprise_id",
 *          description="entreprise_id",
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
class Iban extends Model
{
    use SoftDeletes;

    public $table = 'ibans';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'banque',
        'code_banque',
        'code_guichet',
        'compte',
        'cle',
        'swift',
        'entreprise_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'banque' => 'string',
        'code_banque' => 'string',
        'code_guichet' => 'integer',
        'compte' => 'integer',
        'cle' => 'string',
        'swift' => 'string',
        'entreprise_id' => 'integer'
    ];

    public static $rules = [
        'banque' => 'required',
        'code_banque' => 'required',
        'code_guichet' => 'required',
        'compte' => 'required',
        'cle' => 'required',
        'swift' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function entreprise()
    {
        return $this->hasOne(\App\Models\Entreprise::class);
    }
}
