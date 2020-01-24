<?php

namespace NeonDigital\Versioning;

trait Versionable
{
    /**
     * Get the version relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->morphMany(Version::class, 'versionable')->orderBy('created_at', 'desc');
    }
}
