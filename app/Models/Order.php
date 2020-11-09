<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','account_name','position_department','city_tine_state','personal_number',
        'national_number','current_office','discount','discount_code','ordercode','subtotal',
        'total','colour','error',
    ];

    public function basicuser()
    {
        return $this->belongsTo('App\Models\BasicUser');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }
}
