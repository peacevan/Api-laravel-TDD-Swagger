<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GrupoRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Grupo::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveGrupos($columns = ['id','name']): Collection
    {
        return Grupo::active()
            ->get($columns);
    }

    /**
     * @return Grupo
     */
    public static function store($arrayGrupo): Grupo
    {
        return Grupo::create($arrayGrupo);
    }

    /**
     * @return bool
     */
    public static function update($arrayGrupo, $grupo): bool
    {
        return $grupo->update($arrayGrupo);
    }

    /**
     * @return bool
     */
    public static function destroy($grupo): bool
    {
        return $grupo->delete();
    }

}
