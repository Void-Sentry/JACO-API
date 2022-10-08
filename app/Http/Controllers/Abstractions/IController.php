<?php

namespace App\Http\Controllers\Abstractions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface IController
{
    public function index(): JsonResponse;
    public function show(Request $request): JsonResponse;
    public function create(Request $request): JsonResponse;
    public function update(Request $request): JsonResponse;
    public function destroy(Request $request): JsonResponse;
}
