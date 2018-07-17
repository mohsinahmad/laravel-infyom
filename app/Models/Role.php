<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 *
 * @property integer name
 * @property integer display_name
 * @property integer description
 *
 * @SWG\Definition(
 *      definition="Role",
 *      required={"name", "description"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Role extends EntrustRole
{
    use SoftDeletes {
        restore as private restoreA;
    }
    use EntrustUserTrait {
        restore as private restoreB;
    }

    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    public $fillable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function User()
    {
        return $this->belongsToMany('App\Models\User');
    }
}