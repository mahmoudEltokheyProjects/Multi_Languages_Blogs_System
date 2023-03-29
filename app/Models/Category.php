<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;
    use HasEagerLimit;
    // +++++++++++++++++++++++ Transatable Columns in "categories" table +++++++++++++++++++++++++++++++++
    public $translatedAttributes = ['title', 'content'];
    // ++++++++++++++++++ Fillable Columns in "categories" table +++++++++++++++++++++++++++++++++
    protected $fillable = ['id', 'image', 'parent', 'created_at', 'updated_at', 'deleted_at'];
    // ++++++++++++++++++++++++++++++++ Relationships +++++++++++++++++++++++++++++++++++

    // Relationship between "sub-categories" and "categories" : "1 sub-category" belongs to "1 category"
    public function parents()
    {
        return $this->belongsTo(Category::class, 'parent');
    }
    // Relationship between "categories" and "sub-categories" : "1 category" has "many category"
    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }
    // Relationship between "categories" and "posts" : "1 category" has "many posts"
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
