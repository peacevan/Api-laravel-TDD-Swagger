<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Gerente extends Model
{
    use Traits\Scope;

    protected $guarded = ['id'];

    public $timestamps = false;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // "name",
    ];

      /**
     * Get the phone associated with the user.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
