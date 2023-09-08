<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Gerente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GerenteRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Gerente::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveGerentes($columns = ['id','name']): Collection
    {
        return Gerente::active()
            ->get($columns);
    }

    /**
     * @return Gerente
     */
    public static function store($arrayGerente): Gerente
    {
        return Gerente::create($arrayGerente);
    }

    /**
     * @return bool
     */
    public static function update($arrayGerente, $gerente): bool
    {
        return $gerente->update($arrayGerente);
    }

    /**
     * @return bool
     */
    public static function destroy($gerente): bool
    {
        return $gerente->delete();
    }

}
