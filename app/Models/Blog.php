<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    Use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status_id',
        'category_id'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id','category_id');
    }

    public function status(){
        return $this->hasOne(Status::class, 'id','status_id');
    }
}
