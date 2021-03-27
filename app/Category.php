<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function sub()
    {
        return $this->hasMany(SubCategory::class, 'cat_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(SubCategory::class, 'sub_id', 'id');
    }
}
