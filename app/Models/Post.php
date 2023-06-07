<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title_uz','title_ru','body_uz','body_ru','category_id','img','slug','view','is_spicial','meta_title','meat_description','meta_keywords'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public static function boot(){
        parent::boot();
        static::saving(function($post){
            $post->slug=Str::slug($post->title_uz);
        });
    }
}
