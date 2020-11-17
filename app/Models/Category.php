<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';

    use HasFactory;
    protected $fillable = ['parent_id', 'name'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Category','p_id');
    }
}
