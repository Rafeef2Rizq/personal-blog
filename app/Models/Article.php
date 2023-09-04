<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','content','image','views','category_id','status'
,'excerpt'];
public function category(){
    return $this->belongsTo(Category::class,'category_id','id');
}


public function tags(){
    return $this->belongsToMany(Tag::class,'article_tag');
}
}
