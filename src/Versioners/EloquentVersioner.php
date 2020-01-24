<?php

namespace NeonDigital\Versioning\Versioners;

use NeonDigital\Versioning\Interfaces\VersionerInterface;

class EloquentVersioner implements VersionerInterface
{
    public function create($model)
    {
        return $this->createFromObject($model);
    }
}