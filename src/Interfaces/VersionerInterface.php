<?php

namespace NeonDigital\Versioning\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface VersionerInterface
{
    /**
     * Get a draft from an eloquent model
     *
     * @param Model $model
     * @return void
     */
    public function create(Model $model, $relationId = null);
}