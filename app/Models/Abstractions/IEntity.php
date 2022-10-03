<?php 

namespace App\Models\Abstractions;

interface IEntity
{
    public function fill(array $attributes);

    public function forceFill(array $attributes);

    public static function all();

    public static function with($string);

    public function save();

    public function saveOrFail();

    public function delete();

    public function forceDelete();

    public function toArray();

    public function toJson($options);

    public function fresh($string);

    public function refresh();

    public function replicate(?array $except = null);

    public function is($model);

    public function isNot($model);

    public function getTable();

    public function getKey();

    public function getForeignKey();

    public function update(array $attributes, array $options);
}