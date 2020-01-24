<?php

namespace NeonDigital\Versioning\Versioners;

use Auth;
use NeonDigital\Versioning\Version;

abstract class AbstractVersioner
{
    protected function createFromObject($object, $relationId = null, $attributeOverride = null)
    {
        return Version::create([
            'versionable_id' => $object->id,
            'versionable_type' => get_class($object),
            'model_data' => json_encode($attributeOverride ?: $object->getAttributes()),
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'relation_id' => $relationId,
        ]);
    }
}