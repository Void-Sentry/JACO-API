<?php 

namespace App\Repository\Abstractions;

use App\Models\Abstractions\AEntity;

interface IRepository 
{
    public function index(): array;
    public function show(int $id): AEntity;
    public function store(Request $request): AEntity;
    public function update(Request $request, int $id): AEntity;
    public function destory(int $id): AEntity;
}