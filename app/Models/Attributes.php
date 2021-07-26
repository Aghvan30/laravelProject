<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    public function attributeValue(){
        $this->hasMany(AttributeVelue::class);
    }
    public function product(){
        $this->belongsTo(Products::class);
    }
}
