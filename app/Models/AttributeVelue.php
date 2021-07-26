<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeVelue extends Model
{
    use HasFactory;
    public function attribute(){
        $this->belongsTo(Attributes::class);
    }
}
