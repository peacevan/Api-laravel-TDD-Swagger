<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
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
        "nome",
        "cnpj",
        "id_grupo",
        "data_fundacao",
    ];
}
