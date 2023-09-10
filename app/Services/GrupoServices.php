<?php

namespace App\Services;

use App\Repositories\GrupoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Grupo;

class GrupoServices
{
    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return GrupoRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveGrupos(): Collection
    {
        return GrupoRepository::findActiveGrupos();
    }
    public function findClitesGrupo($grupo): Collection
    {
        return GrupoRepository::findClitesGrupo($grupo);
    }



    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\GrupoRequest  $request
     * @return Grupo
     */
    public function store(array $request): Grupo
    {
        return GrupoRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\GrupoRequest  $request
     * @param \App\Models\Grupo  $grupo
     * @return bool
     */
    public function update(array $request, $grupo): bool
    {
        return GrupoRepository::update($request, $grupo);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Grupo  $grupo
     * @return bool
     */
    public function destroy($grupo): bool
    {
        return GrupoRepository::destroy($grupo);
    }
}
