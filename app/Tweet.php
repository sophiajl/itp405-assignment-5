<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
}
