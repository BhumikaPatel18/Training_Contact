<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'account_id',
        'title',
        'description'
    ];

    // public function account()
    // {
    //     return $this->belongsTo((Account::class));
    // }
}
