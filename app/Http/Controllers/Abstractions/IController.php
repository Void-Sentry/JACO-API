<?php

namespace App\Http\Controllers\Abstractions;

interface IController
{
    public function index(): array;
    public function show(): array;
    public function create(): array;
    public function update(): array;
    public function destroy(): array;
}
