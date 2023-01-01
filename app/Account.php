<?php

namespace App;

use App\Traits\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes,Relationship;
    //protected $table = 'accounts';
    protected $fillable =[
        'contact_id',
        'name',
        'address',
    ];

    // public function contacts()
    // {
    //     return $this->belongsTo(Contact::class,'contact_id');
    // }

    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }
}
