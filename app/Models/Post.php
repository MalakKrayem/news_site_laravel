<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=["title","post_content",'featured_image','large_image','views','shares','category_id',"user_id"];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'tagable');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function sharesNum(){
        return $this->morphMany(Share::class,'shareable');
    }
}
