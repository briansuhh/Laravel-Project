<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    public function blog(){
        return $this->hasMany(Blog::class, 'status_id','id');
    }
}
