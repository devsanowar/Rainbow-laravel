<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointSale extends Model
{
    protected $guarded = ['id'];

     // যাকে পয়েন্ট দেয়া হয়েছে
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // যিনি দিয়েছেন (admin)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    
}
