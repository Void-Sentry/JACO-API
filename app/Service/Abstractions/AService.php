<?php 

namespace App\Service\Abstractions;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IEntity;
use App\Service\Abstractions\IService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

abstract class AService implements IService {
    
    private IEntity $_entity;

    public function __construct(IEntity $entity)
    {
        $this->_entity = $entity;
    }

    public function index(): Collection
    {
        return $this->_entity->all();
    }

    public function show(Request $request): AEntity
    {
        return $this->_entity->find($request->id);
    }

    public function store(Request $request): AEntity
    {
        return $this->_entity->create($request->all());
    }

    public function update(Request $request): AEntity
    {
        $entity = $this->_entity->findOrFail($request->id);
        $entity->fill($request->all());
        $entity->save();

        return $entity;
    }

    public function destroy(Request $request): AEntity
    {
        error_log(json_encode($request->id, JSON_PRETTY_PRINT));
        $item = $this->_entity->findOrFail($request->id);
        $item->delete();
        return $item;
    }
}

?>