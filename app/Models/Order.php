<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Order extends Model
    {
        use HasFactory;
        public function user()
        {
            return $this->belongsTo(User::class,'account_id');
        }
        public function book()
        {
            return $this->belongsTo(EBook::class,'ebook_id');
        }
    }

