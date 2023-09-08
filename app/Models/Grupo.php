<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Grupo extends Model
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
        "name",
    ];

     /**
     * Get the comments for the blog post.
     */
    public function clientes(): HasMany
    {
        return $this->hasMany(Clientes::class);
    }
}
