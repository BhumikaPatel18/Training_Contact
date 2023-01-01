<?php

namespace App\Traits;

trait Relationship {

    protected static function bootid()
    {
        static::saved(function ($model){

           dd($model->getKey());
        });
    }

}

