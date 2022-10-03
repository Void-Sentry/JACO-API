<?php 

namespace App\Repository\Abstractions;

use App\Models\Abstractions\AEntity;
use App\Repository\Abstractions\IRepositoy;

abstract class ARepository implements IRepositoy {
    
    private AEntity $_entity;

    public function __construct(AEntity $entity)
    {
        $this->_entity = $entity;
    }

    public function index(): array
    {
        return $this->_entity->all();
    }

    public function show(int $id): AEntity
    {
        return $this->_entity->find($id);
    }

    public function store(Request $request): AEntity
    {
        return $this->_entity->create($request->all());
    }

    public function update(Request $request, int $id): AEntity
    {
        $entity = $this->_entity->find($id);
        $entity->fill($request->all());
        $entity->save();

        return $entity;
    }

    public function destroy(int $id): AEntity
    {
        return $this->_entity->delete($id);
    }
}