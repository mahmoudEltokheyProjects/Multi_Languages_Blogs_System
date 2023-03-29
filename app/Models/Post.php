<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;
    use HasEagerLimit;

    // +++++++++++++++++++++++ Transatable Columns in "posts" table +++++++++++++++++++++++++++++++++
    public $translatedAttributes = ['title', 'content', 'smallDesc', 'tags'];
    // ++++++++++++++++++ Fillable Columns in "posts" table +++++++++++++++++++++++++++++++++
    protected $fillable = ['id','image','category_id','created_at','updated_at','deleted_at', 'user_id'];
    // ++++++++++++++++++++++++++++++++ Relationships +++++++++++++++++++++++++++++++++++

    // Relationship between "posts" and "categories" : "1 post" belongs to "1 category"
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Relationship between "posts" and "users" : "1 post" belongs to "1 user"
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
