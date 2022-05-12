<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = []; //memproses semua Kolom

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'package_id', 'id');
    }
    public function subject()
    {
        return $this->hasMany(Subject::class, 'package_id', 'id');
    }
}
