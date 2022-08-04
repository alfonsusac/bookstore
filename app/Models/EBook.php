<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class EBook extends Model
    {
        use HasFactory;
        public function orders()
        {
            return $this->hasMany(Order::class);
        }
        public function orderhistories()
        {
            return $this->hasMany(OrderHistory::class,'ebook_id');
        }
    }

