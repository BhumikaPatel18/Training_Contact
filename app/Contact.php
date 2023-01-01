<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Account;

class Contact extends Model
{
    use SoftDeletes;
    //protected $table = 'contacts';
    protected $fillable =[
        'name',
        'email',
        'phone',
    ];

    //relationship with account table
    // public function account()
    // {
    //     return $this->hasMany(Account::class,'contact_id');
    // }
}
