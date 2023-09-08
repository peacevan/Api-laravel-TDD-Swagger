<?php

namespace App\Services;

use App\Repositories\GerenteRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Gerente;

class GerenteServices
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
        return GerenteRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveGerentes(): Collection
    {
        return GerenteRepository::findActiveGerentes();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\GerenteRequest  $request
     * @return Gerente
     */
    public function store(array $request): Gerente
    {
        return GerenteRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\GerenteRequest  $request
     * @param \App\Models\Gerente  $gerente
     * @return bool
     */
    public function update(array $request, $gerente): bool
    {
        return GerenteRepository::update($request, $gerente);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Gerente  $gerente
     * @return bool
     */
    public function destroy($gerente): bool
    {
        return GerenteRepository::destroy($gerente);
    }
}
