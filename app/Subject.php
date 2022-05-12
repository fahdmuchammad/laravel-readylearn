<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    public function video()
    {
        return $this->hasMany(Video::class, 'video_id', 'id');
    }
}
