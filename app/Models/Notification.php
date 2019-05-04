<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
