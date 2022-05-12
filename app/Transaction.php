<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
