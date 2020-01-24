<?php

namespace NeonDigital\Versioning;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $guarded = [];

    public function versionable()
    {
        return $this->morphTo();
    }

    public function relations()
    {
        return $this->hasMany(self::class, 'relation_id');
    }

    public function relation()
    {
        return $this->belongsTo(self::class, 'relation_id');
    }

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function getModelDataAttribute($val)
    {
        return json_decode($val, true);
    }
}
