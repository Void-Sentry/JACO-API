<?php 

namespace App\Service\Abstractions;

use App\Models\Abstractions\AEntity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IService
{
    public function index(): Collection;
    public function show(Request $request): AEntity;
    public function store(Request $request): AEntity;
    public function update(Request $request): AEntity;
    public function destroy(Request $request): AEntity;
}

?>