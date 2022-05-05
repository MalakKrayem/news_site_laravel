<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public function sharesNum(){
        return $this->morphMany(Share::class,'shareable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'tagable');
    }
}
